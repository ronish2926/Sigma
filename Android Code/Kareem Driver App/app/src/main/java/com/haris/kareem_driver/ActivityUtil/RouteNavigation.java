package com.haris.kareem_driver.ActivityUtil;

import android.annotation.SuppressLint;
import androidx.lifecycle.Lifecycle;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.content.res.Configuration;
import android.location.Location;
import android.os.Bundle;
import android.os.Handler;
import android.os.PowerManager;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.google.firebase.database.ChildEventListener;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.CustomUtil.StopWatch;
import com.haris.kareem_driver.InterfaceUtil.ConnectionCallback;
import com.haris.kareem_driver.ManagementUtil.Management;
import com.haris.kareem_driver.ObjectUtil.ChattingObject;
import com.haris.kareem_driver.ObjectUtil.DataObject;
import com.haris.kareem_driver.ObjectUtil.DestinationObject;
import com.haris.kareem_driver.ObjectUtil.PrefObject;
import com.haris.kareem_driver.ObjectUtil.RequestObject;
import com.haris.kareem_driver.ObjectUtil.RiderObject;
import com.haris.kareem_driver.ObjectUtil.TimeParameter;
import com.haris.kareem_driver.ObjectUtil.TrackingObject;
import com.haris.kareem_driver.ObjectUtil.UserObject;
import com.haris.kareem_driver.R;
import com.haris.kareem_driver.Utility.Utility;
import com.mapbox.api.directions.v5.DirectionsCriteria;
import com.mapbox.api.directions.v5.models.DirectionsResponse;
import com.mapbox.api.directions.v5.models.DirectionsRoute;
import com.mapbox.geojson.Point;
import com.mapbox.mapboxsdk.Mapbox;
import com.mapbox.mapboxsdk.camera.CameraPosition;
import com.mapbox.mapboxsdk.geometry.LatLng;
import com.mapbox.navigation.base.trip.model.RouteProgress;
import com.mapbox.navigation.base.trip.model.RouteProgressState;
import com.mapbox.navigation.core.MapboxNavigation;
import com.mapbox.navigation.core.trip.session.LocationObserver;
import com.mapbox.navigation.core.trip.session.RouteProgressObserver;
import com.mapbox.navigation.ui.NavigationView;
import com.mapbox.navigation.ui.NavigationViewOptions;
import com.mapbox.navigation.ui.OnNavigationReadyCallback;
import com.mapbox.navigation.ui.listeners.NavigationListener;
import com.mapbox.services.android.navigation.v5.navigation.NavigationRoute;


import org.jetbrains.annotations.NotNull;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.List;
import java.util.Locale;
import java.util.concurrent.TimeUnit;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class RouteNavigation extends AppCompatActivity implements View.OnClickListener, RouteProgressObserver,
        OnNavigationReadyCallback, NavigationListener , LocationObserver {

    private String TAG = RouteNavigation.class.getSimpleName();
    private Management management;
    private PrefObject userData;
    private MapboxNavigation mapboxNavigation;
    private NavigationView navigationView;
    protected PowerManager.WakeLock mWakeLock;
    private DatabaseReference rootReference;
    private DatabaseReference userRef;
    private DatabaseReference riderRef;
    private DatabaseReference destinationRef;
    private DatabaseReference trackingRef;
    private DatabaseReference chatRef;
    private ValueEventListener userEventListener;
    private ChildEventListener chatChildEventListener;
    private ValueEventListener trackingEventListener;
    private ValueEventListener riderEventListener;
    private ValueEventListener destinationEventListener;
    private DataObject dataObject;
    private double user_latitude;
    private double user_longitude;
    private Point sourcePoint;
    private Point endPoint;
    private boolean isNavigationCancelledExplicitly = false;
    private TextView txtCounter;
    private int messageCounter = 0;
    private LinearLayout layoutCounter;
    private LinearLayout layoutCall;
    private LinearLayout layoutCalls;
    private LinearLayout layoutDone;
    private LinearLayout layoutInformation;
    private RiderObject riderObject;
    private UserObject userObject;
    private int user_id;
    private boolean isTriggerNotification = true;
    private String companyPercentage;
    private String tripPrice;
    private String fee_including_waiting_charges;
    private boolean isActivityRunning;
    private DestinationObject destinationObject;
    private boolean dropOffDialogShown = false;
    private StopWatch stopWatch;
    private Handler handler;
    private String freeWaitingTime;
    private Runnable r;

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        Utility.changeAppTheme(this);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_route_navigation);

        awakeScreen();  //Activate WakeLock
        getIntentData(); //Retrieve Intent Data
        initUI(savedInstanceState); //Initialize UI

    }

    /**
     * <p>It is used to retrieve Intent Data</p>
     */
    private void getIntentData() {
        dataObject = getIntent().getParcelableExtra(Constant.IntentKey.ORDER_DETAIL);
    }


    /**
     * <p>It initialize the UI</p>
     */
    private void initUI(Bundle savedInstanceState) {

        management = new Management(this);
        userData = management.getPreferences(new PrefObject()
                .setRetrieveUserCredential(true));

        ////mapboxNavigation = new MapboxNavigation(this, Mapbox.getAccessToken());
        navigationView = findViewById(R.id.navigationView);
        navigationView.onCreate(savedInstanceState);

        txtCounter = findViewById(R.id.txt_counter);
        layoutCounter = findViewById(R.id.layout_counter);
        layoutCall = findViewById(R.id.layout_call);
        layoutCalls = findViewById(R.id.layout_calls);
        layoutDone = findViewById(R.id.layout_done);
        layoutInformation = findViewById(R.id.layout_information);

        rootReference = FirebaseDatabase.getInstance().getReference();

        userRef = rootReference.child("order").child(dataObject.getOrder_id()).child("userObject");
        userEventListener = new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                Utility.Logger(TAG, "UserEventListener");
                // This method is called once with the initial value and again
                // whenever data at this location is updated.
                UserObject value = dataSnapshot.getValue(UserObject.class);
                userObject = value;
                user_latitude = value.getUser_latitude();
                user_longitude = value.getUser_longitude();
                Utility.Logger(TAG, "Value is: " + value.toString());


                user_id = value.getUser_id();
                endPoint = Point.fromLngLat(user_longitude, user_latitude);




            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

                // Failed to read value
                Utility.Logger(TAG, "Failed to read value in RiderEvent = " + databaseError.toException());

            }
        };
        userRef.addListenerForSingleValueEvent(userEventListener);

        riderRef = rootReference.child("order").child(dataObject.getOrder_id()).child("riderObject");
        riderEventListener = new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                Utility.Logger(TAG, "UserEventListener");
                // This method is called once with the initial value and again
                // whenever data at this location is updated.
                RiderObject value = dataSnapshot.getValue(RiderObject.class);
                riderObject = value;

                sourcePoint = Point.fromLngLat(value.getRider_longitude(), value.getRider_latitude());
                CameraPosition initialPosition = new CameraPosition.Builder()
                        .target(new LatLng(sourcePoint.latitude(), sourcePoint.longitude()))
                        .zoom(16)
                        .build();

                navigationView.initialize(RouteNavigation.this, initialPosition);

            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

                // Failed to read value
                Utility.Logger(TAG, "Failed to read value in RiderEvent = " + databaseError.toException());

            }
        };
        riderRef.addListenerForSingleValueEvent(riderEventListener);

        destinationRef = rootReference.child("order").child(dataObject.getOrder_id()).child("destinationObject");
        destinationEventListener = new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                Utility.Logger(TAG, "destinationEventListener");
                // This method is called once with the initial value and again
                // whenever data at this location is updated.
                DestinationObject value = dataSnapshot.getValue(DestinationObject.class);
                destinationObject = value;



            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

                // Failed to read value
                Utility.Logger(TAG, "Failed to read value in RiderEvent = " + databaseError.toException());

            }
        };
        destinationRef.addListenerForSingleValueEvent(destinationEventListener);

        trackingRef = rootReference.child("order").child(dataObject.getOrder_id()).child("trackingObject");
        trackingEventListener = new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                Utility.Logger(TAG, "trackingEventListener");
                // This method is called once with the initial value and again
                // whenever data at this location is updated.
                TrackingObject value = dataSnapshot.getValue(TrackingObject.class);
                companyPercentage = value.getCompany_percentage();
                tripPrice = value.getTrip_price();
                ////freeWaitingTime = value.getFree_waiting_time();

                if (value.getStatus().equalsIgnoreCase("cancel")) {

                    isNavigationCancelledExplicitly = true;
                    onNavigationFinished();

                }


            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {
                // Failed to read value
                Utility.Logger(TAG, "Failed to read value in LocationEvent = " + databaseError.toException());
            }
        };
        trackingRef.addValueEventListener(trackingEventListener);

        chatRef = rootReference.child("order").child(dataObject.getOrder_id()).child("userChattingObject");
        chatChildEventListener = new ChildEventListener() {
            @Override
            public void onChildAdded(@NonNull DataSnapshot dataSnapshot, @Nullable String s) {

                ChattingObject chattingObject = dataSnapshot.getValue(ChattingObject.class);
                if (!chattingObject.read)
                    return;

                if (!chattingObject.from)
                    return;

                messageCounter++;
                txtCounter.setText(String.valueOf(messageCounter));
                layoutCounter.setVisibility(View.VISIBLE);

                Utility.Logger(TAG, "Counter = " + messageCounter);

            }

            @Override
            public void onChildChanged(@NonNull DataSnapshot dataSnapshot, @Nullable String s) {

            }

            @Override
            public void onChildRemoved(@NonNull DataSnapshot dataSnapshot) {

            }

            @Override
            public void onChildMoved(@NonNull DataSnapshot dataSnapshot, @Nullable String s) {

            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        };

        layoutCall.setOnClickListener(this);
        layoutCalls.setOnClickListener(this);
        layoutDone.setOnClickListener(this);
        layoutInformation.setOnClickListener(this);

    }


    /**
     * <p>It will make the screen be always on until this Activity gets destroyed</p>
     */
    @SuppressLint("InvalidWakeLockTag")
    private void awakeScreen() {
        final PowerManager pm = (PowerManager) getSystemService(Context.POWER_SERVICE);
        this.mWakeLock = pm.newWakeLock(PowerManager.SCREEN_DIM_WAKE_LOCK, "My Tag");
        this.mWakeLock.acquire();
    }

    @Override
    public void onStart() {
        super.onStart();
        navigationView.onStart();
    }

    @Override
    public void onResume() {
        super.onResume();
        navigationView.onResume();
        isActivityRunning = true;

        if (chatRef != null && chatChildEventListener != null) {
            chatRef.addChildEventListener(chatChildEventListener);
            messageCounter = 0;
        }

    }

    @Override
    public void onLowMemory() {
        super.onLowMemory();
        navigationView.onLowMemory();
    }

    @Override
    public void onBackPressed() {
        // If the navigation view didn't need to do anything, call super
        //super.onBackPressed();
       /* if (!navigationView.onBackPressed()) {
            super.onBackPressed();
        }*/
    }

    @Override
    protected void onSaveInstanceState(Bundle outState) {
        navigationView.onSaveInstanceState(outState);
        super.onSaveInstanceState(outState);
    }

    @Override
    protected void onRestoreInstanceState(Bundle savedInstanceState) {
        super.onRestoreInstanceState(savedInstanceState);
        navigationView.onRestoreInstanceState(savedInstanceState);
    }

    @Override
    public void onPause() {
        super.onPause();
        navigationView.onPause();

        if (chatRef != null && chatChildEventListener != null)
            chatRef.removeEventListener(chatChildEventListener);

    }

    @Override
    public void onStop() {
        super.onStop();
        isActivityRunning = false;
        navigationView.onStop();
    }

    @Override
    protected void onDestroy() {
        this.mWakeLock.release();
        super.onDestroy();
        navigationView.onDestroy();

        if (userRef != null)
            userRef.removeEventListener(userEventListener);

        if (r!=null && handler!=null){
            handler.removeCallbacks(r);
        }


    }

    @Override
    public void onConfigurationChanged(Configuration newConfig) {
        super.onConfigurationChanged(newConfig);

        if (newConfig.orientation == ActivityInfo.SCREEN_ORIENTATION_LANDSCAPE) {

        }

    }

    @Override
    public void onNavigationReady(boolean isRunning) {

        Utility.Logger(TAG, "Navigation Status = " + isRunning);
        if (isActivityRunning)
            fetchRoute(sourcePoint,endPoint); //Fetch Route When Navigation Ready

    }

    @Override
    public void onCancelNavigation() {
        showAlertSheet(this);
    }

    @Override
    public void onNavigationFinished() {
        Utility.Logger(TAG, "onNavigationFinished");

        if (isNavigationCancelledExplicitly) {

            trackingRef.child("status").setValue("cancel");
            management.sendRequestToServer(new RequestObject()
                    .setContext(this)
                    .setJson(getRideCancelJson(dataObject.getOrder_id(), "3"))
                    .setConnection(Constant.CONNECTION.ACCEPT_REJECT_RIDE)
                    .setConnectionType(Constant.CONNECTION_TYPE.BACKGROUND)
                    .setConnectionCallback(null));

            management.savePreferences(new PrefObject()
                    .setSaveOrderId(true)
                    .setOrderId("0"));

            startActivity(new Intent(this,Base.class));
            finish();

            return;
        }

        management.sendRequestToServer(new RequestObject()
                .setContext(this)
                .setJson(getRideStatusJson(dataObject.getOrder_id(), "4"))
                .setConnection(Constant.CONNECTION.ACCEPT_REJECT_RIDE)
                .setConnectionType(Constant.CONNECTION_TYPE.BACKGROUND)
                .setConnectionCallback(null));

        trackingRef.child("status").setValue("completed");

        management.savePreferences(new PrefObject()
                .setSaveOrderId(true)
                .setOrderId("0"));

        Intent intent = new Intent(this,Base.class);
        intent.putExtra(Constant.IntentKey.TRIP_PRICE,tripPrice);
        intent.putExtra(Constant.IntentKey.COMPANY_PERCENTAGE,companyPercentage);
        intent.putExtra(Constant.IntentKey.WAITING_CHARGES,fee_including_waiting_charges);
        intent.putExtra(Constant.IntentKey.USER,user_id);
        startActivity(intent);
        finish();


    }

    @Override
    public void onNavigationRunning() {
        Utility.Logger(TAG, "onNavigationRunning");

        management.sendRequestToServer(new RequestObject()
                .setContext(this)
                .setJson(getJson(dataObject.getOrder_id(), true))
                .setConnection(Constant.CONNECTION.ORDER_STATUS)
                .setConnectionType(Constant.CONNECTION_TYPE.BACKGROUND)
                .setConnectionCallback(null));


    }

    /**
     * <p>It is used to fetch Route from
     * Server</p>
     */
    private void fetchRoute(Point sourcePoint , Point endPoint) {

        NavigationRoute.builder(RouteNavigation.this)
                .accessToken(Mapbox.getAccessToken())
                .origin(sourcePoint)
                .destination(endPoint)
                .alternatives(true)
                .profile(DirectionsCriteria.PROFILE_DRIVING)
                .language(Locale.ENGLISH)
                .voiceUnits(DirectionsCriteria.METRIC)
                .build().getRoute(new Callback<DirectionsResponse>() {
            @Override
            public void onResponse(Call<DirectionsResponse> call, Response<DirectionsResponse> response) {

                if (response.isSuccessful()) {
                    DirectionsRoute currentRoute = response.body().routes().get(0);

                    Utility.Logger(this.getClass().getSimpleName(),"Size = "+response.body().routes().size());

                    startNavigation(currentRoute);

                } else {
                    Utility.Logger(TAG, "Response = " + response.message());
                }

            }

            @Override
            public void onFailure(Call<DirectionsResponse> call, Throwable t) {
                Utility.Logger(TAG, t.getMessage());
                t.printStackTrace();
            }
        });

    }

    /**
     * <p>It is used to start Navigation</p>
     *
     * @param directionsRoute
     */
    private void startNavigation(DirectionsRoute directionsRoute) {

        riderRef.child("direction_route").setValue(directionsRoute.geometry());
        NavigationViewOptions options = NavigationViewOptions.builder(this)
                .directionsRoute(directionsRoute)
                .shouldSimulateRoute(true)
                .navigationListener(this)
                .routeProgressObserver(this)
                .locationObserver(this)
                .build();


        if (navigationView.getLifecycle().getCurrentState() != Lifecycle.State.DESTROYED)
            navigationView.startNavigation(options);

    }

    /**
     * <p>Used to show bottom sheet dialog for Cart Alert</p>
     */
    private void showAlertSheet(final Context context) {

        View view = getLayoutInflater().inflate(R.layout.cart_alert_sheet_layout, null);

        final BottomSheetDialog bottomSheetDialog = new BottomSheetDialog(context);
        bottomSheetDialog.setContentView(view);
        bottomSheetDialog.show();

        final TextView txtDone = (TextView) view.findViewById(R.id.txt_done);
        TextView txtCancel = (TextView) view.findViewById(R.id.txt_cancel);

        txtDone.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (bottomSheetDialog.isShowing())
                    bottomSheetDialog.dismiss();

                isNavigationCancelledExplicitly = true;
                navigationView.stopNavigation();
                onNavigationFinished();

            }
        });

        txtCancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (bottomSheetDialog.isShowing())
                    bottomSheetDialog.dismiss();

            }
        });

    }

    /**
     * <p>Used to show bottom sheet dialog for Cart Alert</p>
     */
    private void showOrderCompletionAlertSheet(final Context context) {

        View view = getLayoutInflater().inflate(R.layout.order_alert_sheet_layout, null);

        final BottomSheetDialog bottomSheetDialog = new BottomSheetDialog(context);
        bottomSheetDialog.setContentView(view);
        bottomSheetDialog.show();

        final TextView txtDone = (TextView) view.findViewById(R.id.txt_done);
        TextView txtCancel = (TextView) view.findViewById(R.id.txt_cancel);

        txtDone.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (bottomSheetDialog.isShowing())
                    bottomSheetDialog.dismiss();

                isNavigationCancelledExplicitly = false;
                navigationView.stopNavigation();
                onNavigationFinished();

            }
        });

        txtCancel.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                if (bottomSheetDialog.isShowing())
                    bottomSheetDialog.dismiss();

            }
        });

    }

    /**
     * <p>Used to show bottom sheet dialog for Order Address Information</p>
     */
    private void showOrderBillingSheet(final Context context) {

        View view = getLayoutInflater().inflate(R.layout.billing_information_sheet_layout, null);

        final BottomSheetDialog bottomSheetDialog = new BottomSheetDialog(context);
        bottomSheetDialog.setContentView(view);
        bottomSheetDialog.show();

        EditText editCustomerName = (EditText) view.findViewById(R.id.edit_customer_name);
        EditText editBuilding = (EditText) view.findViewById(R.id.edit_building);
        EditText editStreetAddress = (EditText) view.findViewById(R.id.edit_street_address);
        EditText editArea = (EditText) view.findViewById(R.id.edit_area);
        EditText editUnit = (EditText) view.findViewById(R.id.edit_unit);
        EditText editComment = (EditText) view.findViewById(R.id.edit_comment);
        EditText editPayment = (EditText) view.findViewById(R.id.edit_payment);
        EditText editType = (EditText) view.findViewById(R.id.edit_type);

        editCustomerName.setText(dataObject.getCustomer_name());
        editStreetAddress.setText(dataObject.getStreetAddressName());
        editBuilding.setText(dataObject.getBuildingName());
        editArea.setText(dataObject.getAreaName());
        editUnit.setText(dataObject.getUnitName());
        editComment.setText(dataObject.getRiderNote());
        editPayment.setText(dataObject.getOrder_price());
        editType.setText(dataObject.getPaymentType());

        editCustomerName.setEnabled(false);
        editBuilding.setEnabled(false);
        editStreetAddress.setEnabled(false);
        editArea.setEnabled(false);
        editUnit.setEnabled(false);
        editComment.setEnabled(false);
        editPayment.setEnabled(false);
        editType.setEnabled(false);


    }

    /**
     * <p> It is used to convert Object
     * into Json</p>
     *
     * @param
     * @return
     */
    private String getJson(String order_id, boolean isNavigationStarted) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            if (isNavigationStarted)
                jsonObject.accumulate("functionality", "push_order_completed_status");
            else
                jsonObject.accumulate("functionality", "push_order_delivered_status");

            jsonObject.accumulate("order_id", order_id);


        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger(TAG, "JSON " + json);

        return json;
    }

    /**
     * <p> It is used to convert Object
     * into Json</p>
     *
     * @param
     * @return
     */
    private String getRideStatusJson(String order_id, String status) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", "complete_ride");
            jsonObject.accumulate("order_id", order_id);
            jsonObject.accumulate("status", status);


        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger(TAG, "JSON " + json);

        return json;
    }

    /**
     * <p> It is used to convert Object
     * into Json</p>
     *
     * @param
     * @return
     */
    private String getRideCancelJson(String order_id, String status) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", "complete_ride");
            jsonObject.accumulate("order_id", order_id);
            jsonObject.accumulate("status", status);


        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger(TAG, "JSON " + json);

        return json;
    }

    /**
     * <p> It is used to convert Object
     * into Json</p>
     *
     * @param
     * @return
     */
    private String getWaitingChargesJson(String order_id, String user_id ,String captain_id , String waiting_time) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", "add_waiting_charges");
            jsonObject.accumulate("order_id", order_id);
            jsonObject.accumulate("user_id", user_id);
            jsonObject.accumulate("captain_id", captain_id);
            jsonObject.accumulate("waiting_time", waiting_time);


        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger(TAG, "JSON " + json);

        return json;
    }

    /**
     * <p> It is used to convert Object
     * into Json</p>
     *
     * @param
     * @return
     */
    private String getWaitingChargesNotificationJson(String order_id, String user_id ) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", "sendNotificationForWaitingCharges");
            jsonObject.accumulate("order_id", order_id);
            jsonObject.accumulate("user_id", user_id);



        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger(TAG, "JSON " + json);

        return json;
    }

    @Override
    public void onClick(View v) {
        if (v == layoutCall) {

            messageCounter = 0;
            layoutCounter.setVisibility(View.GONE);

            Intent intent = new Intent(getApplicationContext(), Chatting.class);
            intent.putExtra(Constant.IntentKey.RESTAURANT_DETAIL, dataObject.getOrder_id());
            intent.putExtra(Constant.IntentKey.USER, userObject);
            intent.putExtra(Constant.IntentKey.RIDER, riderObject);
            startActivity(intent);

        }
        if (v == layoutCalls) {

            if (userObject!=null &&
                    !Utility.isEmptyString(userObject.getUser_phone())){

                Utility.openDialer(this,userObject.getUser_phone());

            }

        }
        if (v == layoutDone) {
            showOrderCompletionAlertSheet(this);
        }
        if (v == layoutInformation) {
            showOrderBillingSheet(this);
        }
    }

    private void showDropOffDialog(final String min , final BottomSheetDialog bottomSheetDialog) {

        AlertDialog alertDialog = new AlertDialog.Builder(this).create();
        alertDialog.setMessage(getString(R.string.dropoff_dialog_text));
        alertDialog.setButton(AlertDialog.BUTTON_POSITIVE, getString(R.string.dropoff_dialog_positive_text),
                new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {

                        stopWatch.stop();
                        management.sendRequestToServer(new RequestObject()
                                .setContext(RouteNavigation.this)
                                .setJson(getWaitingChargesJson(dataObject.getOrder_id(), String.valueOf(userObject.getUser_id()),
                                        String.valueOf(riderObject.getUser_id()),min))
                                .setConnection(Constant.CONNECTION.CALCULATE_WAITING_CHARGES)
                                .setConnectionType(Constant.CONNECTION_TYPE.UI)
                                .setConnectionCallback(new ConnectionCallback() {
                                    @Override
                                    public void onSuccess(Object data, RequestObject requestObject) {

                                        DataObject dataObject = (DataObject) data;
                                        fee_including_waiting_charges = dataObject.getWaiting_charges();
                                        if (Integer.parseInt(
                                                Utility.extractNumericDataFromString(fee_including_waiting_charges))>0){
                                            tripPrice = fee_including_waiting_charges;
                                        }

                                        if (bottomSheetDialog.isShowing()){
                                            bottomSheetDialog.dismiss();
                                        }

                                        fetchRoute(endPoint
                                                , Point.fromLngLat(destinationObject.getLongitude(),destinationObject.getLatitude()));

                                    }

                                    @Override
                                    public void onError(String data, RequestObject requestObject) {
                                        Utility.Logger(TAG,data);
                                    }
                                }));

                    }
                });

        alertDialog.setButton(DialogInterface.BUTTON_NEGATIVE, getString(R.string.dropoff_dialog_negative_text),
                new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {

                    }
                });

        alertDialog.show();

    }

    /**
     * <p>Used to show bottom sheet dialog for Cart Alert</p>
     */
    private void showTimerBottomSheet(final Context context) {

        View view = getLayoutInflater().inflate(R.layout.timer_bttom_sheet_layout, null);

        final BottomSheetDialog bottomSheetDialog = new BottomSheetDialog(context);
        bottomSheetDialog.setContentView(view,new ViewGroup.LayoutParams(ViewGroup.LayoutParams.MATCH_PARENT, ViewGroup.LayoutParams.WRAP_CONTENT));
        bottomSheetDialog.setCancelable(false);
        bottomSheetDialog.show();

        final TextView txtDuration = view.findViewById(R.id.txt_duration);
        LinearLayout layoutStartRide = view.findViewById(R.id.layout_start_ride);

        stopWatch = new StopWatch();
        stopWatch.setListener(new StopWatch.StopWatchListener() {
            @Override
            public void onTick(String time) {
                txtDuration.setText(time+" min");
            }
        });


        handler = new Handler();
        r = new Runnable() {
            public void run() {
                stopWatch.start();
            }
        };
        handler.postDelayed(r, TimeUnit.MINUTES.toMillis(Long.parseLong(freeWaitingTime)));

        management.sendRequestToServer(new RequestObject()
                .setContext(RouteNavigation.this)
                .setJson(getWaitingChargesNotificationJson(dataObject.getOrder_id(), String.valueOf(userObject.getUser_id())))
                .setConnection(Constant.CONNECTION.WAITING_CHARGES_NOTIFICATION)
                .setConnectionType(Constant.CONNECTION_TYPE.BACKGROUND)
                .setConnectionCallback(null));

        layoutStartRide.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Utility.Logger(TAG,"Ride Started "+stopWatch.getElapsedTimeMin());
                showDropOffDialog(String.valueOf(stopWatch.getElapsedTimeMin()),bottomSheetDialog);

            }
        });




    }

    @Override
    public void onRouteProgressChanged(@NotNull RouteProgress routeProgress) {

        String remainingDistance = Utility.getRoundedValue(Utility.convertMeterIntoKm(String.valueOf(routeProgress.getDistanceRemaining()))) + " km";
        String remainingDuration = Utility.secondIntoTime(new TimeParameter((int) routeProgress.getDurationRemaining(), true));

        Utility.Logger(TAG, "Remaining Distance = " + remainingDistance + " Remaining Duration = " + remainingDuration);

        trackingRef.child("remaining_duration").setValue(remainingDuration);
        trackingRef.child("remaining_distance").setValue(remainingDistance);

        if (routeProgress.getCurrentState() == RouteProgressState.ROUTE_COMPLETE && !dropOffDialogShown){
            showTimerBottomSheet(this);
        }

        ///routeProgress.

        if (routeProgress.getDistanceRemaining() < 30) {

            Utility.Logger(TAG, "Distance is Lower than 10 meter");

            /*if (isTriggerNotification) {

                management.sendRequestToServer(new RequestObject()
                        .setContext(this)
                        .setJson(getNotificationJson(String.valueOf(user_id)))
                        .setConnection(Constant.CONNECTION.USER_NOTIFICATION)
                        .setConnectionType(Constant.CONNECTION_TYPE.BACKGROUND));

                isTriggerNotification = false;
            }*/


        }

    }

    @Override
    public void onEnhancedLocationChanged(@NotNull Location location, @NotNull List<? extends Location> list) {

        trackingRef.child("latitude").setValue(location.getLatitude());
        trackingRef.child("longitude").setValue(location.getLongitude());


    }

    @Override
    public void onRawLocationChanged(@NotNull Location location) {

    }


}



