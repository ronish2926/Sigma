package com.haris.kareem_driver.ActivityUtil;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.graphics.drawable.ColorDrawable;
import android.os.Bundle;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import androidx.appcompat.app.AppCompatActivity;
import android.view.View;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.Switch;
import android.widget.TextView;
import android.widget.Toast;

import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.InterfaceUtil.ConnectionCallback;
import com.haris.kareem_driver.ManagementUtil.Management;
import com.haris.kareem_driver.ObjectUtil.DataObject;
import com.haris.kareem_driver.ObjectUtil.PrefObject;
import com.haris.kareem_driver.ObjectUtil.RequestObject;
import com.haris.kareem_driver.R;
import com.haris.kareem_driver.Utility.Utility;
import com.makeramen.roundedimageview.RoundedImageView;

import net.bohush.geometricprogressview.GeometricProgressView;

import org.json.JSONException;
import org.json.JSONObject;

public class Setting extends AppCompatActivity implements View.OnClickListener, CompoundButton.OnCheckedChangeListener {
    private String TAG = Setting.class.getSimpleName();
    private RoundedImageView imageUser;
    private TextView txtName;
    private TextView txtEmail;
    private TextView txtPhone;
    private LinearLayout layoutDocuments;
    private LinearLayout layoutBankDetail;
    private LinearLayout layoutLogout;
    private Switch switchPush;
    private Management management;
    private PrefObject prefObject;
    private String pictureUrl;
    private TextView txtMenu;
    private ImageView imageBack;
    private LinearLayout layoutCarPicture;
    private LinearLayout layoutCarDocuments;
    private LinearLayout layoutIdentity;
    private LinearLayout layoutProfile;
    private LinearLayout layoutEmail;
    private LinearLayout layoutPassword;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_setting);

        initUI(); //Initialize UI


    }


    /**
     * <p>It initialize the UI</p>
     */
    private void initUI() {

        txtMenu = findViewById(R.id.txt_menu);
        txtMenu.setText(Utility.getStringFromRes(this, R.string.setting));

        imageBack = findViewById(R.id.image_back);
        imageBack.setVisibility(View.VISIBLE);
        imageBack.setImageResource(R.drawable.ic_back);

        management = new Management(this);
        prefObject = management.getPreferences(new PrefObject()
                .setRetrieveUserCredential(true)
                .setRetrieveRiderStatus(true)
                .setRetrieveLogin(true));


        txtName = (TextView) findViewById(R.id.txt_name);
        layoutProfile = findViewById(R.id.layout_profile);

        txtEmail = (TextView) findViewById(R.id.txt_email);
        layoutEmail = findViewById(R.id.layout_email);

        layoutPassword = findViewById(R.id.layout_password);
        txtPhone = (TextView) findViewById(R.id.txt_phone);


        layoutDocuments = (LinearLayout) findViewById(R.id.layout_documents);
        layoutIdentity = findViewById(R.id.layout_identity);
        layoutCarDocuments = findViewById(R.id.layout_car_documents);
        layoutCarPicture = findViewById(R.id.layout_car_picture);

        layoutBankDetail = (LinearLayout) findViewById(R.id.layout_bank);
        layoutLogout = (LinearLayout) findViewById(R.id.layout_logout);
        switchPush = (Switch) findViewById(R.id.switch_push);


        if (prefObject.isRiderStatus()) {
            switchPush.setChecked(true);
        }
        else
            switchPush.setChecked(false);


        layoutProfile.setOnClickListener(this);
        layoutEmail.setOnClickListener(this);
        layoutPassword.setOnClickListener(this);
        layoutDocuments.setOnClickListener(this);
        layoutBankDetail.setOnClickListener(this);
        layoutLogout.setOnClickListener(this);
        layoutIdentity.setOnClickListener(this);
        layoutCarDocuments.setOnClickListener(this);
        layoutCarPicture.setOnClickListener(this);
        imageBack.setOnClickListener(this);
        switchPush.setOnCheckedChangeListener(this);


    }

    @Override
    public void onClick(View v) {
        if (v==layoutProfile){
            showProfileBottomSheet(this,true,false,false);
        }
        if (v==layoutEmail){
            showProfileBottomSheet(this,false,true,false);
        }
        if (v==layoutPassword){
            showProfileBottomSheet(this,false,false,true);
        }
        if (v == layoutDocuments) {
            startActivity(new Intent(this, MyDrivingLicense.class));
        }
        if (v == layoutBankDetail) {
            startActivity(new Intent(this, MyBankDetail.class));
        }
        if (v == layoutLogout) {

            management.savePreferences(new PrefObject()
                    .setSaveLogin(true)
                    .setLogin(false));

            startActivity(new Intent(this, Login.class));
            finish();

        }
        if (v == layoutIdentity) {
            startActivity(new Intent(this, MyIdentityCard.class));
        }
        if (v == layoutCarDocuments) {
            startActivity(new Intent(this, MyCarDocuments.class));
        }
        if (v == layoutCarPicture) {
            startActivity(new Intent(this, MyCarPictures.class));
        }
        if (v==imageBack){
            finish();
        }


    }

    /**
     * <p>It is used to send Request to Server</p>
     */
    private void sendServerRequest(boolean enableRider) {

        management.sendRequestToServer(new RequestObject()
                .setContext(this)
                .setJson(getJson(prefObject.getUserId(), enableRider))
                .setConnection(Constant.CONNECTION.ENABLE_DISABLE_RIDER)
                .setConnectionType(Constant.CONNECTION_TYPE.BACKGROUND));

    }


    /**
     * <p> It is used to convert Object
     * into Json</p>
     *
     * @param
     * @return
     */
    private String getJson(String rider_id, boolean enableRider) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            if (enableRider) {
                jsonObject.accumulate("functionality", "activate_rider");
            } else {
                jsonObject.accumulate("functionality", "deactivate_rider");
            }
            jsonObject.accumulate("captain_id", rider_id);


        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger(TAG, "JSON " + json);

        return json;
    }

    @Override
    public void onCheckedChanged(CompoundButton buttonView, boolean isChecked) {
        if (buttonView.getId() == switchPush.getId()) {

            if (isChecked) {

                sendServerRequest(true);
                management.savePreferences(new PrefObject()
                        .setSaveRiderStatus(true)
                        .setRiderStatus(true));

            } else {

                sendServerRequest(false);
                management.savePreferences(new PrefObject()
                        .setSaveRiderStatus(true)
                        .setRiderStatus(false));
            }

        }
    }

    @Override
    protected void onResume() {
        super.onResume();

        txtName.setText(prefObject.getFirstName());
        txtEmail.setText(prefObject.getUserEmail());
        txtPhone.setText(prefObject.getUserPhone());

        ///pictureUrl = Constant.ServerInformation.PICTURE_URL + prefObject.getPictureUrl();
        ///Utility.Logger(TAG, "Picture = " + pictureUrl);

      /*  try {

            Glide.with(this).load(pictureUrl).apply(new RequestOptions()
                    .diskCacheStrategy(DiskCacheStrategy.RESOURCE)
                    .placeholder(R.drawable.app_icon)
                    .error(R.drawable.app_icon))
                    .into(imageUser);

        } catch (IllegalArgumentException ex) {
            Utility.Logger("Glide-tag", String.valueOf(imageUser.getTag()));
        }*/

    }


    /**
     * <p>It is used to show Payment Selection</p>
     *
     * @param context
     */
    private void showProfileBottomSheet(final Context context, boolean isName, boolean isEmail, boolean isPassword) {

        int layout = 0;

        if (isName) {
            layout = R.layout.update_name_bottom_sheet;
        }
        else if (isEmail) {
            layout = R.layout.update_email_bottom_sheet;
        }
        else if (isPassword) {
            layout = R.layout.update_password_bottom_sheet;
        }

        final View view = getLayoutInflater().inflate(layout, null);

        final BottomSheetDialog bottomSheetDialog = new BottomSheetDialog(context);
        bottomSheetDialog.setContentView(view);
        bottomSheetDialog.getWindow().setBackgroundDrawable(new ColorDrawable(Color.TRANSPARENT));
        bottomSheetDialog.show();

        if (isName) {

            final EditText editFirstName = view.findViewById(R.id.edit_first_name);
            final ImageView imageDone = view.findViewById(R.id.image_done);
            final GeometricProgressView progressCoupon = view.findViewById(R.id.progress_coupon);
            editFirstName.setText(txtName.getText().toString());

            imageDone.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    imageDone.setVisibility(View.GONE);
                    progressCoupon.setVisibility(View.VISIBLE);

                    management.sendRequestToServer(new RequestObject()
                            .setContext(context)
                            .setJson(getJson("update_captain_name", editFirstName.getText().toString(), null, null))
                            .setConnection(Constant.CONNECTION.UPDATE)
                            .setConnectionType(Constant.CONNECTION_TYPE.UI)
                            .setConnectionCallback(new ConnectionCallback() {
                                @Override
                                public void onSuccess(Object data, RequestObject requestObject) {

                                    progressCoupon.setVisibility(View.GONE);
                                    imageDone.setVisibility(View.VISIBLE);

                                    DataObject couponObject = (DataObject) data;
                                    Utility.Toaster(context, Utility.getStringFromRes(context, R.string.updated_successfully), Toast.LENGTH_SHORT);
                                    txtName.setText(editFirstName.getText().toString());
                                    management.savePreferences(new PrefObject()
                                            .setSaveUserCredential(true)
                                            .setFirstName(editFirstName.getText().toString()));

                                    if (bottomSheetDialog.isShowing())
                                        bottomSheetDialog.dismiss();

                                }

                                @Override
                                public void onError(String data, RequestObject requestObject) {
                                    progressCoupon.setVisibility(View.GONE);
                                    imageDone.setVisibility(View.VISIBLE);
                                    Utility.Toaster(context, data, Toast.LENGTH_SHORT);
                                }
                            }));

                }
            });

        }
        else if (isEmail) {

            final EditText editEmail = view.findViewById(R.id.edit_email);
            final ImageView imageDone = view.findViewById(R.id.image_done);
            final GeometricProgressView progressCoupon = view.findViewById(R.id.progress_coupon);

            editEmail.setText(prefObject.getUserEmail());

            imageDone.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    imageDone.setVisibility(View.GONE);
                    progressCoupon.setVisibility(View.VISIBLE);

                    management.sendRequestToServer(new RequestObject()
                            .setContext(context)
                            .setJson(getJson("update_captain_email", null, editEmail.getText().toString(), null))
                            .setConnection(Constant.CONNECTION.UPDATE)
                            .setConnectionType(Constant.CONNECTION_TYPE.UI)
                            .setConnectionCallback(new ConnectionCallback() {
                                @Override
                                public void onSuccess(Object data, RequestObject requestObject) {

                                    progressCoupon.setVisibility(View.GONE);
                                    imageDone.setVisibility(View.VISIBLE);

                                    DataObject couponObject = (DataObject) data;
                                    Utility.Toaster(context, Utility.getStringFromRes(context, R.string.updated_successfully), Toast.LENGTH_SHORT);
                                    txtEmail.setText(editEmail.getText().toString());

                                    management.savePreferences(new PrefObject()
                                            .setSaveUserCredential(true)
                                            .setUserEmail(editEmail.getText().toString()));

                                    if (bottomSheetDialog.isShowing())
                                        bottomSheetDialog.dismiss();

                                }

                                @Override
                                public void onError(String data, RequestObject requestObject) {
                                    progressCoupon.setVisibility(View.GONE);
                                    imageDone.setVisibility(View.VISIBLE);
                                    Utility.Toaster(context, data, Toast.LENGTH_SHORT);
                                }
                            }));

                }
            });


        }
        else if (isPassword) {

            final EditText editPassword = view.findViewById(R.id.edit_password);
            final EditText editNewPassword = view.findViewById(R.id.edit_new_password);
            final EditText editConfirmPassword = view.findViewById(R.id.edit_confirm_password);
            final TextView txtDone = view.findViewById(R.id.txt_done);
            final LinearLayout layoutDone = view.findViewById(R.id.layout_done);
            final GeometricProgressView progressCoupon = view.findViewById(R.id.progress_coupon);

            layoutDone.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    if (!prefObject.getUserPassword().equalsIgnoreCase(editPassword.getText().toString())) {
                        Utility.Toaster(context, Utility.getStringFromRes(context, R.string.incorrect_current_password), Toast.LENGTH_SHORT);
                        return;
                    }

                    if (!editNewPassword.getText().toString().equals(editConfirmPassword.getText().toString())) {
                        Utility.Toaster(context, Utility.getStringFromRes(context, R.string.incorrect_both_password), Toast.LENGTH_SHORT);
                        return;
                    }

                    txtDone.setVisibility(View.GONE);
                    progressCoupon.setVisibility(View.VISIBLE);

                    management.sendRequestToServer(new RequestObject()
                            .setContext(context)
                            .setJson(getJson("update_captain_password", null, null, editNewPassword.getText().toString()))
                            .setConnection(Constant.CONNECTION.UPDATE)
                            .setConnectionType(Constant.CONNECTION_TYPE.UI)
                            .setConnectionCallback(new ConnectionCallback() {
                                @Override
                                public void onSuccess(Object data, RequestObject requestObject) {

                                    progressCoupon.setVisibility(View.GONE);
                                    txtDone.setVisibility(View.VISIBLE);

                                    DataObject couponObject = (DataObject) data;
                                    Utility.Toaster(context, Utility.getStringFromRes(context, R.string.updated_successfully), Toast.LENGTH_SHORT);

                                    management.savePreferences(new PrefObject()
                                            .setSaveUserCredential(true)
                                            .setUserPassword(editNewPassword.getText().toString()));


                                    if (bottomSheetDialog.isShowing())
                                        bottomSheetDialog.dismiss();

                                }

                                @Override
                                public void onError(String data, RequestObject requestObject) {
                                    progressCoupon.setVisibility(View.GONE);
                                    txtDone.setVisibility(View.VISIBLE);
                                    Utility.Toaster(context, data, Toast.LENGTH_SHORT);
                                }
                            }));

                }
            });


        }


    }


    /**
     * <p>It is used to convert Object into Json</p>
     *
     * @param
     * @return
     */

    private String getJson(String functionality, String first_name,  String email, String password) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", functionality);
            jsonObject.accumulate("captain_id", prefObject.getUserId());

            if (!Utility.isEmptyString(first_name)) {

                jsonObject.accumulate("first_name", first_name);

            }

            if (!Utility.isEmptyString(email)) {

                jsonObject.accumulate("email", email);

            }

            if (!Utility.isEmptyString(password)) {

                jsonObject.accumulate("password", password);

            }

        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger(TAG, "JSON " + json);

        return json;
    }

}
