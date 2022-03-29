package com.haris.kareem_driver.FragmentUtil;

import android.Manifest;
import android.content.Intent;
import android.location.Location;
import android.os.Bundle;

import androidx.annotation.CallSuper;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.google.android.gms.maps.CameraUpdate;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapView;
import com.google.android.gms.maps.MapsInitializer;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.haris.kareem_driver.ActivityUtil.Base;
import com.haris.kareem_driver.ActivityUtil.RouteNavigation;
import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.InterfaceUtil.ConnectionCallback;
import com.haris.kareem_driver.ManagementUtil.Management;
import com.haris.kareem_driver.MyApplication;
import com.haris.kareem_driver.ObjectUtil.DataObject;
import com.haris.kareem_driver.ObjectUtil.PrefObject;
import com.haris.kareem_driver.ObjectUtil.RequestObject;
import com.haris.kareem_driver.R;
import com.haris.kareem_driver.Utility.Utility;

import org.json.JSONException;
import org.json.JSONObject;

import com.mapbox.android.core.location.LocationEngine;
import com.yayandroid.locationmanager.LocationManager;
import com.yayandroid.locationmanager.configuration.DefaultProviderConfiguration;
import com.yayandroid.locationmanager.configuration.GooglePlayServicesConfiguration;
import com.yayandroid.locationmanager.configuration.LocationConfiguration;
import com.yayandroid.locationmanager.configuration.PermissionConfiguration;
import com.yayandroid.locationmanager.constants.ProviderType;
import com.yayandroid.locationmanager.listener.LocationListener;
import com.yayandroid.locationmanager.providers.locationprovider.DispatcherLocationProvider;

import static android.os.Looper.getMainLooper;


public class CurrentOrder extends Fragment implements  ConnectionCallback,
         OnMapReadyCallback, View.OnClickListener , LocationListener {

    private String TAG = CurrentOrder.class.getSimpleName();
    private Management management;
    private PrefObject prefObject;
    private DatabaseReference rootReference;
    private double rider_longitude;
    private double rider_latitude;
    private GoogleMap googleMap;
    private MapView mapView;
    private RelativeLayout layoutRide;
    private TextView txtFare;
    private TextView txtRideType;
    private TextView txtPayment;
    private TextView txtAccept;
    private TextView txtReject;
    private TextView txtDuration;
    private String orderId;

    // Variables needed to add the location engine
    private LocationEngine locationEngine;
    private long DEFAULT_INTERVAL_IN_MILLISECONDS = 10000L;
    private long DEFAULT_MAX_WAIT_TIME = DEFAULT_INTERVAL_IN_MILLISECONDS * 5;
    private boolean isFirstTime = true;

    private LocationManager awesomeLocationManager;
    // Variables needed to listen to location updates



    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        return inflater.inflate(R.layout.activity_current_order, null);
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        initUI(view, savedInstanceState); //Initialize UI
    }


    /**
     * <p>It initialize the UI</p>
     */
    private void initUI(View view, Bundle savedInstanceState) {

        management = new Management(getActivity());
        prefObject = management.getPreferences(new PrefObject()
                .setRetrieveUserCredential(true));

        startLocation();

        mapView = (MapView) view.findViewById(R.id.mapView);
        mapView.onCreate(savedInstanceState);

        mapView.onResume();   // needed to get the map to display immediately

        try {
            MapsInitializer.initialize(getActivity());
        } catch (Exception e) {
            e.printStackTrace();
        }

        layoutRide = (RelativeLayout) view.findViewById(R.id.layout_ride);
        txtFare = (TextView) view.findViewById(R.id.txt_fare);
        txtRideType = (TextView) view.findViewById(R.id.txt_ride_type);
        txtPayment = (TextView) view.findViewById(R.id.txt_payment);
        txtAccept = (TextView) view.findViewById(R.id.txt_accept);
        txtReject = (TextView) view.findViewById(R.id.txt_reject);
        txtDuration = (TextView) view.findViewById(R.id.txt_duration);

        rootReference = FirebaseDatabase.getInstance().getReference();

        txtAccept.setOnClickListener(this);
        txtReject.setOnClickListener(this);
        mapView.getMapAsync(this);

    }


    /**
     * <p>It is used to send request to Server</p>
     */
    private void sendRequestToServer() {

        management.sendRequestToServer(new RequestObject()
                .setContext(getActivity())
                .setLoadingText(Utility.getStringFromRes(getActivity(), R.string.checking))
                .setJson(getJson(prefObject.getUserId()))
                .setConnection(Constant.CONNECTION.CURRENT_RIDES)
                .setConnectionType(Constant.CONNECTION_TYPE.UI)
                .setConnectionCallback(this));


    }


    /**
     * <p> It is used to convert Object
     * into Json</p>
     *
     * @param
     * @return
     */
    private String getJson(String rider_id) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", "rider_current_order");
            jsonObject.accumulate("rider_id", rider_id);


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
    private String getRideStatusJson(String rider_id, String status) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", "accept_reject_captain_ride");
            jsonObject.accumulate("rider_id", rider_id);
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
    private String getCaptainTrackingJson(String rider_id,String latitude,String longitude) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", "update_captain_location");
            jsonObject.accumulate("captain_id", rider_id);
            jsonObject.accumulate("latitude", latitude);
            jsonObject.accumulate("longitude", longitude);


        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger(TAG, "JSON " + json);

        return json;
    }



    @Override
    public void onSuccess(Object data, RequestObject requestObject) {
        if (data != null && requestObject != null) {

            DataObject dtObject = (DataObject) data;
            layoutRide.setVisibility(View.VISIBLE);
            orderId = dtObject.getOrder_id();
            txtDuration.setText(dtObject.getRide_duration());
            txtFare.setText(dtObject.getRide_fare());
            txtPayment.setText(dtObject.getRide_payment());
            txtRideType.setText(dtObject.getRide_type());


        }
    }

    @Override
    public void onError(String data, RequestObject requestObject) {


    }


    /**
     * <p>It is used to start location & get userObject current location</p>
     */
    private void startLocation() {

        LocationConfiguration awesomeConfiguration = new LocationConfiguration.Builder()
                .keepTracking(true)
                .askForPermission(new PermissionConfiguration.Builder()
                        .rationaleMessage("Gimme the permission!")
                        .requiredPermissions(new String[]{Manifest.permission.ACCESS_FINE_LOCATION})
                        .build())
                .useGooglePlayServices(new GooglePlayServicesConfiguration.Builder()
                        .fallbackToDefault(true)
                        .askForGooglePlayServices(false)
                        .askForSettingsApi(true)
                        .failOnSettingsApiSuspended(false)
                        .ignoreLastKnowLocation(false)
                        .setWaitPeriod(20 * 1000)
                        .build())
                .useDefaultProviders(new DefaultProviderConfiguration.Builder()
                        .requiredTimeInterval(5 * 60 * 1000)
                        .requiredDistanceInterval(0)
                        .acceptableAccuracy(5.0f)
                        .acceptableTimePeriod(5 * 60 * 1000)
                        .gpsMessage("Turn on GPS?")
                        .setWaitPeriod(ProviderType.GPS, 20 * 1000)
                        .setWaitPeriod(ProviderType.NETWORK, 20 * 1000)
                        .build())
                .build();

        // LocationManager MUST be initialized with Application context in order to prevent MemoryLeaks
        awesomeLocationManager = new LocationManager.Builder(MyApplication.getInstance())
                .fragment(CurrentOrder.this) // Only required to ask permission and/or GoogleApi - SettingsApi
                .configuration(awesomeConfiguration)
                .locationProvider(new DispatcherLocationProvider())
                .notify(this)
                .build();

        awesomeLocationManager.get();

    }


    @Override
    public void onResume() {
        super.onResume();

        sendRequestToServer();  //Send Request to Server

    }

    @Override
    public void onMapReady(GoogleMap googleMap) {
        this.googleMap = googleMap;


    }


    /**
     * <p>It is used to set up marker</p>
     *
     * @param latitude
     * @param longitude
     */
    private void setUpMarker(double latitude, double longitude) {


        if (latitude == 0.0 || longitude == 0.0)
            return;

        LatLng position = new LatLng(latitude, longitude);
        if (googleMap == null)
            return;

        CameraUpdate location = CameraUpdateFactory.newLatLngZoom(
                position, 18);
        googleMap.animateCamera(location);

        MarkerOptions markerOptions = Utility.createMarkerForMap(null
                , new LatLng(latitude, longitude)
                , null);
        googleMap.addMarker(markerOptions);

        isFirstTime = false;


        //imageMarker.setVisibility(View.VISIBLE);


    }


    @Override
    public void onClick(View v) {
        if (v == txtAccept) {

            management.savePreferences(new PrefObject()
                    .setSaveOrderId(true)
                    .setOrderId(orderId));

            Intent intent = new Intent(getActivity(), RouteNavigation.class);
            intent.putExtra(Constant.IntentKey.ORDER_DETAIL,new DataObject().setOrder_id(orderId));
            startActivity(intent);
            ((Base)getActivity()).finish();

        }
        if (v == txtReject) {

            management.sendRequestToServer(new RequestObject()
                    .setContext(getActivity())
                    .setJson(getRideStatusJson(orderId, "4"))
                    .setConnection(Constant.CONNECTION.ACCEPT_REJECT_RIDE)
                    .setConnectionType(Constant.CONNECTION_TYPE.BACKGROUND)
                    .setConnectionCallback(null));

            rootReference.child("order").child(orderId).child("trackingObject").child("status").setValue("cancel");
            layoutRide.setVisibility(View.GONE);

        }
    }




    @Override
    public void onDestroy() {
        super.onDestroy();



    }

    @Override
    public void onProcessTypeChanged(int processType) {

    }

    @Override
    public void onLocationChanged(Location location) {

        if (location==null)
            return;

        Utility.Logger(TAG, "Location = Latitude (" + location.getLatitude() + "," + location.getLongitude() + ")");
        rider_latitude = location.getLatitude();
        rider_longitude = location.getLongitude();

        management.sendRequestToServer(new RequestObject()
                .setContext(getActivity())
                .setJson(getCaptainTrackingJson(prefObject.getUserId(),String.valueOf(rider_latitude),String.valueOf(rider_longitude)))
                .setConnection(Constant.CONNECTION.CAPTAIN_TRACKING)
                .setConnectionType(Constant.CONNECTION_TYPE.BACKGROUND)
                .setConnectionCallback(null));

        if (isFirstTime) {
            setUpMarker(rider_latitude, rider_longitude);
        }

    }

    @Override
    public void onLocationFailed(int type) {

    }

    @Override
    public void onPermissionGranted(boolean alreadyHadPermission) {

    }

    @Override
    public void onStatusChanged(String provider, int status, Bundle extras) {

    }

    @Override
    public void onProviderEnabled(String provider) {

    }

    @Override
    public void onProviderDisabled(String provider) {

    }


    @CallSuper
    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);
        awesomeLocationManager.onRequestPermissionsResult(requestCode, permissions, grantResults);
    }

    @Override
    public void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {

        for (Fragment fragment : getChildFragmentManager().getFragments()) {
            fragment.onActivityResult(requestCode, resultCode, data);
        }


        Utility.Logger(this.getClass().getSimpleName(),"Working of OnActivity");
        awesomeLocationManager.onActivityResult(requestCode, resultCode, data);
        super.onActivityResult(requestCode, resultCode, data);

    }
}