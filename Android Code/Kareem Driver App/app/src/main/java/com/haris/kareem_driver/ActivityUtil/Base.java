package com.haris.kareem_driver.ActivityUtil;

import android.content.Intent;
import android.os.Bundle;
import com.google.android.material.tabs.TabLayout;
import androidx.viewpager.widget.ViewPager;
import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;

import com.haris.kareem_driver.AdapterUtil.HomeTabPager;
import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.FragmentUtil.CurrentOrder;
import com.haris.kareem_driver.FragmentUtil.OrderHistory;
import com.haris.kareem_driver.ManagementUtil.Management;
import com.haris.kareem_driver.ObjectUtil.PagerTabObject;
import com.haris.kareem_driver.ObjectUtil.PrefObject;
import com.haris.kareem_driver.R;
import com.haris.kareem_driver.Utility.Utility;

import java.util.ArrayList;

public class Base extends AppCompatActivity implements View.OnClickListener {
    private String TAG = Base.class.getName();
    private TextView txtMenu;
    private ImageView imageSetting;
    private Management management;
    private PrefObject prefObject;
    private ArrayList<PagerTabObject> objectArrayList = new ArrayList<>();
    private ViewPager viewPager;
    private TabLayout layoutTab;
    private HomeTabPager homeTabPager;
    private CardView cardEarning;
    private TextView txtDone;
    private TextView txtEarning;
    private String tripPrice;
    private String companyPercentage;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        Utility.changeAppTheme(this);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_base);

        getIntentData();  //Retrieve Intent Data
        initUI(); //Initialize UI

    }


    private void getIntentData(){
       tripPrice = getIntent().getStringExtra(Constant.IntentKey.TRIP_PRICE);
       companyPercentage = getIntent().getStringExtra(Constant.IntentKey.COMPANY_PERCENTAGE);
    }


    /**
     * <p>It initialize the UI</p>
     */
    private void initUI() {

        txtMenu = findViewById(R.id.txt_menu);
        txtMenu.setText(Utility.getStringFromRes(this, R.string.app_name));

        imageSetting = findViewById(R.id.image_filter);
        imageSetting.setImageResource(R.drawable.ic_menu_setting);
        imageSetting.setVisibility(View.VISIBLE);

        cardEarning = findViewById(R.id.card_earning);
        txtEarning = findViewById(R.id.txt_earning);
        txtDone = findViewById(R.id.txt_done);

        if (!Utility.isEmptyString(tripPrice)){
            cardEarning.setVisibility(View.VISIBLE);
            double percentage = Double.parseDouble(companyPercentage);
            int price = Integer.parseInt(Utility.extractNumericDataFromString(tripPrice));
            int result = (int) (price * (percentage/100));
            String symbol = Utility.extractStringDataFromString(tripPrice);
            txtEarning.setText(symbol+" "+result);
        }

        management = new Management(this);

        //Adding Fragment into Pager Adapter

        objectArrayList.add(new PagerTabObject()
                .setTitle(Utility.getStringFromRes(this, R.string.current_rides))
                .setFragment(new CurrentOrder()));

        objectArrayList.add(new PagerTabObject()
                .setTitle(Utility.getStringFromRes(this, R.string.your_earning))
                .setFragment(new OrderHistory()));

        //Initialize Viewpager

        viewPager = findViewById(R.id.view_pager);
        homeTabPager = new HomeTabPager(getSupportFragmentManager(), objectArrayList);
        viewPager.setAdapter(homeTabPager);

        //Setup Tab Layout with Pager Fragment

        layoutTab = findViewById(R.id.layout_tab);
        layoutTab.setupWithViewPager(viewPager);

        for (int i = 0; i < layoutTab.getTabCount(); i++) {

            TextView tv = (TextView) LayoutInflater.from(this).inflate(R.layout.custom_tab_item_layout, null);
            //tv.setTextColor(Utility.getColourFromRes(this, R.color.));
            tv.setText(objectArrayList.get(i).getTitle());
            layoutTab.getTabAt(i).setCustomView(tv);

        }

        imageSetting.setOnClickListener(this);
        txtDone.setOnClickListener(this);


    }


    @Override
    public void onClick(View v) {
        if (v == imageSetting) {
            startActivity(new Intent(this, Setting.class));
        }

        if (v==txtDone){
            cardEarning.setVisibility(View.GONE);
        }
    }


}
