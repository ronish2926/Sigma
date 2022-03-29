package com.haris.kareem_driver.ActivityUtil;

import android.content.Context;
import android.content.Intent;
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

import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.FontUtil.Font;
import com.haris.kareem_driver.InterfaceUtil.ConnectionCallback;
import com.haris.kareem_driver.ManagementUtil.Management;
import com.haris.kareem_driver.ObjectUtil.DataObject;
import com.haris.kareem_driver.ObjectUtil.PrefObject;
import com.haris.kareem_driver.ObjectUtil.RequestObject;
import com.haris.kareem_driver.R;
import com.haris.kareem_driver.Utility.Utility;
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

        txtMenu = (TextView) findViewById(R.id.txt_menu);
        txtMenu.setText(Utility.getStringFromRes(this, R.string.login));

        imageBack = (ImageView) findViewById(R.id.image_back);
        imageBack.setVisibility(View.VISIBLE);
        imageBack.setImageResource(R.drawable.ic_back);

        editEmail = (EditText) findViewById(R.id.edit_email);
        editPassword = (EditText) findViewById(R.id.edit_password);

        checkboxRemember = (AppCompatCheckBox) findViewById(R.id.checkbox_remember);
        checkboxRemember.setTypeface(Font.ubuntu_regular_font(this));  //Setting Font

        txtForgot = (TextView) findViewById(R.id.txt_forgot);
        txtLogin = (TextView) findViewById(R.id.txt_login);
        txtSignUp = (TextView) findViewById(R.id.txt_sign_up);


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
     * <p>It is used to send request to server for userObject authentication</p>
     */
    private void sendServerRequest() {

        showProgressSheet(this);
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

            jsonObject.accumulate("functionality", "rider_login");
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


    /**
     * <p>Used to show bottom sheet dialog for Cart Alert</p>
     */
    private void showProgressSheet(final Context context) {

        View view = getLayoutInflater().inflate(R.layout.progress_sheet_layout, null);

        final BottomSheetDialog bottomSheetDialog = new BottomSheetDialog(context);
        bottomSheetDialog.setContentView(view);
        bottomSheetDialog.show();

        TextView txtProgress = view.findViewById(R.id.txt_progress);
        txtProgress.setText(Utility.getStringFromRes(context,R.string.loging_user));

        management.sendRequestToServer(new RequestObject()
                .setContext(getApplicationContext())
                .setJson(getJson())
                .setConnection(Constant.CONNECTION.LOGIN)
                .setConnectionType(Constant.CONNECTION_TYPE.UI)
                .setConnectionCallback(new ConnectionCallback() {
                    @Override
                    public void onSuccess(Object data, RequestObject requestObject) {

                        if (bottomSheetDialog != null && bottomSheetDialog.isShowing()) {
                            bottomSheetDialog.dismiss();

                            if (data != null && requestObject != null) {

                                DataObject dataObject = (DataObject) data;

                                if (checkboxRemember.isChecked()) {

                                    management.savePreferences(new PrefObject()
                                            .setSaveUserRemember(true)
                                            .setUserRemember(true));

                                }

                                if (dataObject.getStatus_id().equalsIgnoreCase("1")){

                                    Utility.Toaster(getApplicationContext(),Utility.getStringFromRes(getApplicationContext(),R.string.upload_necessary_documents),Toast.LENGTH_SHORT);
                                    startActivity(new Intent(getApplicationContext(),Setting.class));
                                    finish();

                                    return;
                                }

                                management.savePreferences(new PrefObject()
                                        .setSaveLogin(true)
                                        .setLogin(true));

                                management.savePreferences(new PrefObject()
                                        .setSaveUserCredential(true)
                                        .setUserId(dataObject.getUser_id())
                                        .setFirstName(dataObject.getUser_fName())
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

                                startActivity(new Intent(context,Base.class));
                                finish();

                            }

                        }
                    }

                    @Override
                    public void onError(String data, RequestObject requestObject) {
                        if (bottomSheetDialog != null && bottomSheetDialog.isShowing())
                            bottomSheetDialog.dismiss();

                        Utility.Toaster(context, data, Toast.LENGTH_SHORT);
                    }
                }));

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

            sendServerRequest();

        }
        if (v == txtSignUp) {
            startActivity(new Intent(this, SignUp.class));
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



}
