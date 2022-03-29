package com.haris.kareem.ActivityUtil;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.AppCompatCheckBox;
import android.view.View;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.haris.kareem.ConstantUtil.Constant;
import com.haris.kareem.DatabaseUtil.DatabaseObject;
import com.haris.kareem.FontUtil.Font;
import com.haris.kareem.InterfaceUtil.ConnectionCallback;
import com.haris.kareem.JsonUtil.UserUtil.FavouriteList;
import com.haris.kareem.ManagementUtil.Management;
import com.haris.kareem.ObjectUtil.DataObject;
import com.haris.kareem.ObjectUtil.PrefObject;
import com.haris.kareem.ObjectUtil.RequestObject;
import com.haris.kareem.R;
import com.haris.kareem.Utility.Utility;
import com.onesignal.OneSignal;

import org.json.JSONException;
import org.json.JSONObject;

public class Login extends AppCompatActivity implements View.OnClickListener, CompoundButton.OnCheckedChangeListener {
    private TextView txtMenu;
    private ImageView imageBack;
    private EditText editEmail;
    private EditText editPassword;
    private AppCompatCheckBox checkboxRemember;
    private TextView txtForgot;
    private TextView txtLogin;
    private TextView txtSignUp;
    private Management management;
    private PrefObject userData;
    private String TAG = Login.class.getName();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        //Utility.changeAppTheme(this);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        initUI(); //Initialize UI

    }


    /**
     * <p>It initialize the UI</p>
     */
    private void initUI() {

        txtMenu = findViewById(R.id.txt_menu);
        txtMenu.setText(Utility.getStringFromRes(this, R.string.login));

        imageBack = findViewById(R.id.image_back);
        imageBack.setVisibility(View.VISIBLE);
        imageBack.setImageResource(R.drawable.ic_back);

        editEmail = findViewById(R.id.edit_email);
        editPassword = findViewById(R.id.edit_password);

        checkboxRemember = findViewById(R.id.checkbox_remember);
        checkboxRemember.setTypeface(Font.ubuntu_regular_font(this));  //Setting Font

        txtForgot = findViewById(R.id.txt_forgot);
        txtLogin = findViewById(R.id.txt_login);
        txtSignUp = findViewById(R.id.txt_sign_up);


        management = new Management(this);
        userData = management.getPreferences(new PrefObject()
                .setRetrieveUserRemember(true)
                .setRetrieveUserCredential(true));

        //Check either userObject remember Email or Password

        if (userData.isUserRemember()) {

            checkboxRemember.setChecked(userData.isUserRemember());
            editEmail.setText(userData.getUserEmail());
            editPassword.setText(userData.getUserPassword());

        } else
            checkboxRemember.setChecked(false);

        txtLogin.setOnClickListener(this);
        txtSignUp.setOnClickListener(this);
        txtForgot.setOnClickListener(this);
        imageBack.setOnClickListener(this);
        checkboxRemember.setOnCheckedChangeListener(this);

    }



    /**
     * <p>It is used to convert data into json format for POST type Request</p>
     *
     * @return
     */
    public String getJson() {
        String json = "";

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", "login");
            jsonObject.accumulate("userType", Constant.LoginType.NATIVE_LOGIN);
            jsonObject.accumulate("email", editEmail.getText().toString());
            jsonObject.accumulate("password", editPassword.getText().toString());

        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger("JSON", json);
        return json;

    }


    @Override
    public void onClick(View v) {
        if (v == txtLogin) {

            if (Utility.isEmptyString(editEmail.getText().toString())) {
                Utility.Toaster(this, Utility.getStringFromRes(this, R.string.email_empty), Toast.LENGTH_LONG);
                return;
            }

            if (Utility.isEmptyString(editPassword.getText().toString())) {
                Utility.Toaster(this, Utility.getStringFromRes(this, R.string.password_empty), Toast.LENGTH_LONG);
                return;
            }

            showLoginBottomSheet(this);

        }
        if (v == txtSignUp) {
            startActivity(new Intent(this, SignUp.class));
            finish();
        }
        if (v == txtForgot) {
            startActivity(new Intent(this, ForgotPassword.class));
        }
        if (v == imageBack) {
            finish();
        }
    }

    @Override
    public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
        if (buttonView == checkboxRemember) {

        }
    }



    /**
     * <p>It is used to show Language Selector</p>
     *
     * @param context
     */
    private void showLoginBottomSheet(final Context context) {
        final View view = getLayoutInflater().inflate(R.layout.process_order_sheet_layout, null);

        final BottomSheetDialog bottomSheetDialog = new BottomSheetDialog(context);
        bottomSheetDialog.setContentView(view);
        bottomSheetDialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        bottomSheetDialog.setCancelable(true);
        bottomSheetDialog.show();

        management.sendRequestToServer(new RequestObject()
                .setJson(getJson())
                .setConnectionType(Constant.CONNECTION_TYPE.UI)
                .setConnection(Constant.CONNECTION.LOGIN)
                .setConnectionCallback(new ConnectionCallback() {
                    @Override
                    public void onSuccess(Object data, RequestObject requestObject) {
                        bottomSheetDialog.dismiss();

                        if (data != null && requestObject != null) {

                            DataObject dataObject = (DataObject) data;

                            if (checkboxRemember.isChecked()) {

                                management.savePreferences(new PrefObject()
                                        .setSaveUserRemember(true)
                                        .setUserRemember(true));

                            }

                            management.savePreferences(new PrefObject()
                                    .setSaveLogin(true)
                                    .setLogin(true));

                            management.savePreferences(new PrefObject()
                                    .setSaveUserCredential(true)
                                    .setLoginType(dataObject.getLogin_type())
                                    .setUserId(dataObject.getUser_id())
                                    .setFirstName(dataObject.getUser_fName())
                                    .setLastName(dataObject.getUser_lName())
                                    .setUserPhone(dataObject.getPhone())
                                    .setUserPassword(dataObject.getUser_password())
                                    .setUserEmail(dataObject.getUser_email())
                                    .setPictureUrl(dataObject.getUser_picture()));

                            // Setting External User Id with Callback Available in SDK Version 4.0.0+
                            OneSignal.setExternalUserId(dataObject.getDevice_token(), new OneSignal.OSExternalUserIdUpdateCompletionHandler() {
                                @Override
                                public void onSuccess(JSONObject results) {
                                    // The results will contain push and email success statuses
                                    OneSignal.onesignalLog(OneSignal.LOG_LEVEL.VERBOSE, "Set external user id done with results: " + results.toString());
                                    try {
                                        if (results.has("push") && results.getJSONObject("push").has("success")) {
                                            boolean isPushSuccess = results.getJSONObject("push").getBoolean("success");
                                            OneSignal.onesignalLog(OneSignal.LOG_LEVEL.VERBOSE, "Set external user id for push status: " + isPushSuccess);
                                        }
                                    } catch (JSONException e) {
                                        e.printStackTrace();
                                    }
                                    try {
                                        if (results.has("email") && results.getJSONObject("email").has("success")) {
                                            boolean isEmailSuccess = results.getJSONObject("email").getBoolean("success");
                                            OneSignal.onesignalLog(OneSignal.LOG_LEVEL.VERBOSE, "Sets external user id for email status: " + isEmailSuccess);
                                        }
                                    } catch (JSONException e) {
                                        e.printStackTrace();
                                    }
                                }
                                @Override
                                public void onFailure(OneSignal.ExternalIdError error) {
                                    // The results will contain push and email failure statuses
                                    // Use this to detect if external_user_id was not set and retry when a better network connection is made
                                    OneSignal.onesignalLog(OneSignal.LOG_LEVEL.VERBOSE, "Set external user id done with error: " + error.toString());
                                }
                            });

                            if (dataObject.getUserFavourite().size() > 0) {
                                for (int i = 0; i < dataObject.getUserFavourite().size(); i++) {
                                    FavouriteList favouriteList = dataObject.getUserFavourite().get(i);
                                    management.getDataFromDatabase(new DatabaseObject()
                                            .setTypeOperation(Constant.TYPE.FAVOURITES)
                                            .setDbOperation(Constant.DB.INSERT)
                                            .setDataObject(new DataObject()
                                                    .setUser_id(favouriteList.getUserId())
                                                    .setObject_id(favouriteList.getRestaurantId())));
                                }

                            }

                            startActivity(new Intent(getApplicationContext(),Base.class));
                            finish();


                        }

                    }

                    @Override
                    public void onError(String data, RequestObject requestObject) {

                        bottomSheetDialog.dismiss();
                        Utility.Toaster(context, data, Toast.LENGTH_SHORT);

                    }
                }));



    }

}
