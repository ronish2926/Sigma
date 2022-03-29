package com.haris.kareem_driver.ActivityUtil;

import android.content.Intent;
import android.location.Location;
import android.os.Bundle;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import android.view.View;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.google.android.gms.maps.CameraUpdate;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.MapView;
import com.google.android.gms.maps.MapsInitializer;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.model.LatLng;
import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.ObjectUtil.DataObject;
import com.haris.kareem_driver.ObjectUtil.GeocodeObject;
import com.haris.kareem_driver.R;
import com.haris.kareem_driver.Utility.Utility;

import io.nlopez.smartlocation.OnLocationUpdatedListener;
import io.nlopez.smartlocation.SmartLocation;
import io.nlopez.smartlocation.location.config.LocationParams;


public class LocationSelectorFromMap extends AppCompatActivity implements GoogleMap.OnCameraIdleListener,
        OnLocationUpdatedListener, OnMapReadyCallback, View.OnClickListener {

    private String TAG = LocationSelectorFromMap.class.getSimpleName();
    private TextView txtMenu;
    private TextView txtCurrentLocation;
    private SmartLocation smartLocation;
    private double rider_longitude;
    private double rider_latitude;
    private GoogleMap googleMap;
    private MapView mapView;
    private ImageView imageBack;
    private ImageView imageDone;
    private LatLng targetCoordinates;
    private LinearLayout layoutCurrentLocation;
    private TextView txtMarker;


    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_location_selector);

        initUI(savedInstanceState);

    }

    /**
     * <p>It initialize the UI</p>
     */
    private void initUI(Bundle savedInstanceState) {

        txtMenu = findViewById(R.id.txt_menu);
        txtMenu.setText(Utility.getStringFromRes(this, R.string.select_location));

        imageBack = findViewById(R.id.image_back);
        imageBack.setImageResource(R.drawable.ic_back);
        imageBack.setVisibility(View.VISIBLE);

        imageDone = findViewById(R.id.image_filter);
        imageDone.setImageResource(R.drawable.ic_tick);
        imageDone.setVisibility(View.VISIBLE);

        layoutCurrentLocation = findViewById(R.id.layout_current_location);
        txtCurrentLocation = findViewById(R.id.txt_current_location);
        txtMarker = findViewById(R.id.txt_marker);

        mapView = (MapView) findViewById(R.id.mapView);
        mapView.onCreate(savedInstanceState);
        mapView.onResume();   // needed to get the map to display immediately

        txtCurrentLocation = findViewById(R.id.txt_current_location);

        try {
            MapsInitializer.initialize(this);
        } catch (Exception e) {
            e.printStackTrace();
        }

        imageBack.setOnClickListener(this);
        imageDone.setOnClickListener(this);
        mapView.getMapAsync(this);

    }


    /**
     * <p>It is used to start location & get userObject current location</p>
     */
    private void startLocation() {

        smartLocation = new SmartLocation.Builder(this).logging(true).build();
        smartLocation.location().config(LocationParams.BEST_EFFORT).oneFix().start(this);

    }


    @Override
    public void onLocationUpdated(Location location) {
        if (location != null) {

            Utility.Logger(TAG, "Location = Latitude (" + location.getLatitude() + "," + location.getLongitude() + ")");
            rider_latitude = location.getLatitude();
            rider_longitude = location.getLongitude();
            setUpMarker(rider_latitude, rider_longitude);

        }
    }

    @Override
    public void onResume() {
        super.onResume();

        startLocation();


    }

    @Override
    public void onMapReady(GoogleMap googleMap) {
        this.googleMap = googleMap;
        this.googleMap.setMyLocationEnabled(true);
        this.googleMap.getUiSettings().setMyLocationButtonEnabled(false);
        this.googleMap.getUiSettings().setCompassEnabled(false);
        this.googleMap.getUiSettings().setZoomGesturesEnabled(false);
        this.googleMap.setOnCameraIdleListener(this);

        this.googleMap.setOnCameraMoveStartedListener(new GoogleMap.OnCameraMoveStartedListener() {
            @Override
            public void onCameraMoveStarted(int i) {

                if (i == GoogleMap.OnCameraMoveStartedListener.REASON_GESTURE) {

                    Utility.Logger(TAG, "The user gestured on the map");
                    txtMarker.setVisibility(View.VISIBLE);
                    layoutCurrentLocation.setVisibility(View.GONE);

                }
                else if (i == GoogleMap.OnCameraMoveStartedListener.REASON_API_ANIMATION) {

                    Utility.Logger(TAG, "The user tapped something on the map.");

                }
                else if (i == GoogleMap.OnCameraMoveStartedListener.REASON_DEVELOPER_ANIMATION) {

                    Utility.Logger(TAG, "The app moved the camera.");
                    txtMarker.setVisibility(View.VISIBLE);
                    layoutCurrentLocation.setVisibility(View.GONE);
                }

            }
        });


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



    }


    @Override
    public void onClick(View v) {
        if (v == imageBack) {
            finish();
        }
        if (v == imageDone) {

            Intent intent = new Intent();
            intent.putExtra(Constant.IntentKey.LOCATION_DETAIL, new DataObject()
                    .setObject_latitude(String.valueOf(targetCoordinates.latitude))
                    .setObject_longitude(String.valueOf(targetCoordinates.longitude)));
            setResult(RESULT_OK, intent);
            finish();
        }
    }

    @Override
    public void onCameraIdle() {

        targetCoordinates = googleMap.getCameraPosition().target;
        GeocodeObject geocodeObject = Utility.getGeoCodeObject(this, targetCoordinates.latitude, targetCoordinates.longitude);

        txtMarker.setVisibility(View.GONE);
        layoutCurrentLocation.setVisibility(View.VISIBLE);
        txtCurrentLocation.setText(geocodeObject.getAddress());

    }
}