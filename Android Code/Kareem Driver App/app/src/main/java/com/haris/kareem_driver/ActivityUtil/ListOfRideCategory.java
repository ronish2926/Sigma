package com.haris.kareem_driver.ActivityUtil;

import android.content.Intent;
import android.os.Bundle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.KeyEvent;
import android.view.View;
import android.view.inputmethod.EditorInfo;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;

import com.haris.kareem_driver.AdapterUtil.LocationSelectorAdapter;
import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.InterfaceUtil.ConnectionCallback;
import com.haris.kareem_driver.InterfaceUtil.LocationCallback;
import com.haris.kareem_driver.ManagementUtil.Management;
import com.haris.kareem_driver.ObjectUtil.DataObject;
import com.haris.kareem_driver.ObjectUtil.EmptyObject;
import com.haris.kareem_driver.ObjectUtil.InternetObject;
import com.haris.kareem_driver.ObjectUtil.ProgressObject;
import com.haris.kareem_driver.ObjectUtil.RequestObject;
import com.haris.kareem_driver.R;
import com.haris.kareem_driver.Utility.Utility;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class ListOfRideCategory extends AppCompatActivity implements View.OnClickListener,
        ConnectionCallback, LocationCallback, TextView.OnEditorActionListener, TextWatcher {

    private String TAG = ListOfRideCategory.class.getName();
    private TextView txtMenu;
    private ImageView imageBack;
    private ImageView imageClose;
    private Management management;
    private GridLayoutManager gridLayoutManager;
    private RecyclerView recyclerViewOrder;
    private LocationSelectorAdapter locationSelectorAdapter;
    private ArrayList<Object> objectArrayList = new ArrayList<>();
    private ArrayList<Object> backUpArraylist = new ArrayList<>();
    private EditText editSearch;
    private String rideCategoryId,cityId;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        Utility.changeAppTheme(this);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_of_city);

        getIntentData(); //Retrieve Intent Data
        initUI(); //Initialize UI

    }


    /**
     * <p>It is used to retrieve Intent Data</p>
     */
    private void getIntentData(){
        rideCategoryId = getIntent().getStringExtra(Constant.IntentKey.POST_ID);
        cityId = getIntent().getStringExtra(Constant.IntentKey.LOCATION_DETAIL);
    }


    /**
     * <p>It initialize the UI</p>
     */
    private void initUI() {

        txtMenu = findViewById(R.id.txt_menu);
        txtMenu.setText(Utility.getStringFromRes(this, R.string.select_ride_category));

        imageBack = findViewById(R.id.image_back);
        imageBack.setVisibility(View.VISIBLE);
        imageBack.setImageResource(R.drawable.ic_back);

        imageClose = findViewById(R.id.image_close);
        editSearch = findViewById(R.id.edit_search);
        editSearch.setHint(Utility.getStringFromRes(this,R.string.search));

        management = new Management(this);
        objectArrayList.add(new ProgressObject());


        //Initialize & Setup Layout Manager with Recycler View

        gridLayoutManager = new GridLayoutManager(this, 1, LinearLayoutManager.VERTICAL, false);
        gridLayoutManager.setSpanSizeLookup(new GridLayoutManager.SpanSizeLookup() {
            @Override
            public int getSpanSize(int position) {
                if (objectArrayList.get(position) instanceof EmptyObject) {
                    return 1;
                } else if (objectArrayList.get(position) instanceof InternetObject) {
                    return 1;
                } else if (objectArrayList.get(position) instanceof ProgressObject) {
                    return 1;
                } else {
                    return 1;
                }
            }
        });

        recyclerViewOrder = (RecyclerView) findViewById(R.id.recycler_view_categories);
        recyclerViewOrder.setLayoutManager(gridLayoutManager);

        //Initialize & Setup Adapter with Recycler View

        locationSelectorAdapter = new LocationSelectorAdapter(this, objectArrayList, this);
        recyclerViewOrder.setAdapter(locationSelectorAdapter);

        management.sendRequestToServer(new RequestObject()
                .setContext(this)
                .setJson(getJson())
                .setConnection(Constant.CONNECTION.LIST_OF_RIDE_CATEGORY_TYPE)
                .setConnectionType(Constant.CONNECTION_TYPE.UI)
                .setConnectionCallback(this));


        imageBack.setOnClickListener(this);
        imageClose.setOnClickListener(this);
        editSearch.addTextChangedListener(this);
        editSearch.setOnEditorActionListener(this);

    }


    @Override
    public void onClick(View v) {
        if (v == imageBack) {
            finish();
        }

        if (v == imageClose) {

            editSearch.setText(null);
            imageClose.setVisibility(View.GONE);
            objectArrayList.clear();
            objectArrayList.addAll(backUpArraylist);
            locationSelectorAdapter.notifyDataSetChanged();

        }

    }

    @Override
    public void onSuccess(Object data, RequestObject requestObject) {
        DataObject dataObject = (DataObject) data;
        objectArrayList.clear();

        if (requestObject.getConnection() == Constant.CONNECTION.LIST_OF_RIDE_CATEGORY_TYPE){

            for (int i = 0; i < dataObject.getObjectArrayList().size(); i++) {

                DataObject locationObject = dataObject.getObjectArrayList().get(i);
                objectArrayList.add(locationObject);
            }

            backUpArraylist.addAll(objectArrayList);
            locationSelectorAdapter.notifyDataSetChanged();

        }



    }

    @Override
    public void onError(String data, RequestObject requestObject) {
        Utility.Logger(TAG, "Setting = " + data);
        objectArrayList.clear();
     /*   objectArrayList.add(new EmptyObject()
                .setTitle(Utility.getStringFromRes(this, R.string.no_order))
                .setDescription(Utility.getStringFromRes(this, R.string.no_order_tagline))
                .setPlaceHolderIcon(R.drawable.em_no_order));*/
        //orderAdapter.notifyDataSetChanged();
    }

    @Override
    public void onLocationSelectedListener(int position) {
        DataObject dataObject = (DataObject) objectArrayList.get(position);

        Intent intent = new Intent();
        intent.putExtra(Constant.IntentKey.LOCATION_DETAIL, dataObject);
        setResult(RESULT_OK, intent);
        finish();

    }

    @Override
    public boolean onEditorAction(TextView v, int actionId, KeyEvent event) {
        if (actionId == EditorInfo.IME_ACTION_SEARCH) {
            performSearch(v.getText().toString());
            return true;
        }
        return false;
    }

    @Override
    public void beforeTextChanged(CharSequence s, int start, int count, int after) {

    }

    @Override
    public void onTextChanged(CharSequence s, int start, int before, int count) {
        if (!Utility.isEmptyString(s.toString())) {
            imageClose.setVisibility(View.VISIBLE);
        }
    }

    @Override
    public void afterTextChanged(Editable s) {

    }


    /**
     * <p>It trigger by Search & find required search terms</p>
     */

    private void performSearch(String searchText) {

        Utility.Logger(TAG, "Search : " + searchText);

        //For showing Progressing Animation

        Utility.hideKeyboard(this, editSearch);
        objectArrayList.clear();

        for (int i = 0; i < backUpArraylist.size(); i++) {

            DataObject dataObject = (DataObject) backUpArraylist.get(i);
            if ( !Utility.isEmptyString(dataObject.getCar_category_name())
                    && dataObject.getCar_category_name().toLowerCase().equalsIgnoreCase(searchText.toLowerCase())) {

                objectArrayList.add(dataObject);

            }

        }

        locationSelectorAdapter.notifyDataSetChanged();


    }


    /**
     * <p>It is used to convert Object into Json</p>
     *
     * @param
     * @return
     */
    private String getJson() {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", "retrieve_all_ride_category_type");
            jsonObject.accumulate("place_id", cityId);
            jsonObject.accumulate("ride_type_id", rideCategoryId);

        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger(TAG, "JSON " + json);

        return json;
    }


}
