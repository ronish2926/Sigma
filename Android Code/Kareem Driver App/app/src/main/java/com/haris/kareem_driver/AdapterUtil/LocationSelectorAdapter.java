package com.haris.kareem_driver.AdapterUtil;

import android.content.Context;
import androidx.recyclerview.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.CustomUtil.GlideApp;
import com.haris.kareem_driver.InterfaceUtil.LocationCallback;
import com.haris.kareem_driver.ObjectUtil.DataObject;
import com.haris.kareem_driver.ObjectUtil.EmptyObject;
import com.haris.kareem_driver.ObjectUtil.ProgressObject;
import com.haris.kareem_driver.R;

import net.bohush.geometricprogressview.GeometricProgressView;

import java.util.ArrayList;


/**
 * Created by hp on 5/5/2018.
 */

public class LocationSelectorAdapter extends RecyclerView.Adapter {
    private int NO_DATA_VIEW = 1;
    private int RIDE_TYPE_VIEW = 2;
    private int LABEL_VIEW = 3;
    private int PROGRESS_VIEW = 4;
    private int CITY_VIEW = 5;
    private int RIDE_CATEGORY_VIEW = 6;
    private Context context;
    private ArrayList<Object> dataArray = new ArrayList<>();
    private LocationCallback locationCallback;


    public LocationSelectorAdapter(Context context, ArrayList<Object> dataArray) {
        this.context = context;
        this.dataArray = dataArray;
    }

    public LocationSelectorAdapter(Context context, ArrayList<Object> dataArray, LocationCallback locationCallback) {
        this.context = context;
        this.dataArray = dataArray;
        this.locationCallback = locationCallback;
    }


    @Override
    public int getItemViewType(int position) {

        if (dataArray.get(position) instanceof EmptyObject) {
            return NO_DATA_VIEW;
        }
        else if (dataArray.get(position) instanceof DataObject) {

            DataObject dataObject = (DataObject) dataArray.get(position);

            if (dataObject.getDataType() == Constant.DATA_TYPE.LABEL_VIEW)
                return LABEL_VIEW;
            else if (dataObject.getDataType() == Constant.DATA_TYPE.RIDE_TYPE)
                return RIDE_TYPE_VIEW;
            else if (dataObject.getDataType() == Constant.DATA_TYPE.CITY_VIEW)
                return CITY_VIEW;
            else if (dataObject.getDataType() == Constant.DATA_TYPE.RIDE_CATEGORY_TYPE)
                return RIDE_CATEGORY_VIEW;

        }
        else if (dataArray.get(position) instanceof ProgressObject) {
            return PROGRESS_VIEW;
        }

        return NO_DATA_VIEW;
    }

    @Override
    public RecyclerView.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        RecyclerView.ViewHolder viewHolder = null;

        if (viewType == NO_DATA_VIEW) {

            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.empty_item_layout, parent, false);
            viewHolder = new EmptyHolder(view);

        }
        else if (viewType == RIDE_TYPE_VIEW) {

            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.ride_category_item_layout, parent, false);
            viewHolder = new LocationHolder(view);

        }
        else if (viewType == LABEL_VIEW) {

            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.label_item_layout, parent, false);
            viewHolder = new LabelHolder(view);

        }
        else if (viewType == PROGRESS_VIEW) {

            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.progress_item_layout, parent, false);
            viewHolder = new ProgressHolder(view);

        }
        else if (viewType == CITY_VIEW) {

            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.city_item_layout, parent, false);
            viewHolder = new CityHolder(view);

        }
        else if (viewType == RIDE_CATEGORY_VIEW) {

            View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.ride_category_type_item_layout, parent, false);
            viewHolder = new RideTypeHolder(view);

        }

        return viewHolder;
    }

    @Override
    public void onBindViewHolder(RecyclerView.ViewHolder holder, final int position) {

        if (holder instanceof ProgressHolder) {

            //LookUpObject lookUpObject = (LookUpObject) dataArray.get(position);
            ProgressHolder lookUpHolder = (ProgressHolder) holder;


        }
        else if (holder instanceof EmptyHolder) {

            EmptyHolder emptyHolder = (EmptyHolder) holder;
            EmptyObject emptyObject = (EmptyObject) dataArray.get(position);

            emptyHolder.imageIcon.setImageResource(emptyObject.getPlaceHolderIcon());
            emptyHolder.txtTitle.setText(emptyObject.getTitle());
            emptyHolder.txtDescription.setText(emptyObject.getDescription());


        }
        else if (holder instanceof LocationHolder) {


            final LocationHolder locationHolder = (LocationHolder) holder;
            DataObject dataObject = (DataObject) dataArray.get(position);

            locationHolder.txtCity.setText(dataObject.getCar_category_name());
            locationHolder.txtCity.setTag(position);

            if (dataObject.isLocationSelected()){
                locationHolder.imageDone.setVisibility(View.VISIBLE);
            }else {
                locationHolder.imageDone.setVisibility(View.GONE);
            }

            locationHolder.layoutLocation.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    int pos = (int) locationHolder.txtCity.getTag();
                    if (locationCallback != null) {
                        locationCallback.onLocationSelectedListener(pos);
                    }
                }
            });


        }
        else if (holder instanceof LabelHolder) {

            LabelHolder labelHolder = (LabelHolder) holder;
            DataObject dataObject = (DataObject) dataArray.get(position);

            labelHolder.txtLabel.setText(dataObject.getLocation_label());

        }
        else if (holder instanceof CityHolder) {

            final CityHolder cityHolder = (CityHolder) holder;
            DataObject dataObject = (DataObject) dataArray.get(position);

            cityHolder.txtCity.setText(dataObject.getCity_name());
            cityHolder.txtCity.setTag(position);

            if (dataObject.isLocationSelected()){
                cityHolder.imageDone.setVisibility(View.VISIBLE);
            }else {
                cityHolder.imageDone.setVisibility(View.GONE);
            }

            cityHolder.layoutLocation.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    int pos = (int) cityHolder.txtCity.getTag();
                    if (locationCallback != null) {
                        locationCallback.onLocationSelectedListener(pos);
                    }
                }
            });


        }
        else if (holder instanceof RideTypeHolder) {

            final RideTypeHolder rideTypeHolder = (RideTypeHolder) holder;
            DataObject dataObject = (DataObject) dataArray.get(position);

            rideTypeHolder.txtRide.setText(dataObject.getCar_category_name());
            rideTypeHolder.txtRideTagline.setText(dataObject.getRide_type_tagline());
            rideTypeHolder.txtRide.setTag(position);

            GlideApp.with(context).load(Constant.ServerInformation.PICTURE_URL + dataObject.getPicture())
                    .into(rideTypeHolder.imageRideType);

            if (dataObject.isLocationSelected()){
                rideTypeHolder.imageDone.setVisibility(View.VISIBLE);
            }else {
                rideTypeHolder.imageDone.setVisibility(View.GONE);
            }

            rideTypeHolder.layoutLocation.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    int pos = (int) rideTypeHolder.txtRide.getTag();
                    if (locationCallback != null) {
                        locationCallback.onLocationSelectedListener(pos);
                    }
                }
            });


        }


    }

    @Override
    public int getItemCount() {
        return dataArray.size();

    }

    protected class EmptyHolder extends RecyclerView.ViewHolder {
        private ImageView imageIcon;
        private TextView txtTitle;
        private TextView txtDescription;
        private LinearLayout layoutContainer;

        public EmptyHolder(View view) {
            super(view);

            imageIcon = (ImageView) view.findViewById(R.id.image_icon);
            txtTitle = (TextView) view.findViewById(R.id.txt_title);
            txtDescription = (TextView) view.findViewById(R.id.txt_description);
            ///layoutContainer = view.findViewById(R.id.layout_container);
        }
    }

    protected class LocationHolder extends RecyclerView.ViewHolder {
        private RelativeLayout layoutLocation;
        private RelativeLayout layoutFrom;
        private TextView txtCity;
        private ImageView imageDone;

        public LocationHolder(View view) {
            super(view);

            layoutLocation = (RelativeLayout) view.findViewById(R.id.layout_location);
            layoutFrom = (RelativeLayout) view.findViewById(R.id.layout_from);
            txtCity = (TextView) view.findViewById(R.id.txt_city);
            imageDone = (ImageView) view.findViewById(R.id.image_done);

        }
    }

    protected class ProgressHolder extends RecyclerView.ViewHolder {
        private GeometricProgressView progressView;

        public ProgressHolder(View view) {
            super(view);
            progressView = (GeometricProgressView) view.findViewById(R.id.progressView);
        }

    }

    protected class CityHolder extends RecyclerView.ViewHolder {
        private RelativeLayout layoutLocation;
        private RelativeLayout layoutFrom;
        private TextView txtCity;
        private ImageView imageDone;

        public CityHolder(View view) {
            super(view);

            layoutLocation = (RelativeLayout) view.findViewById(R.id.layout_location);
            layoutFrom = (RelativeLayout) view.findViewById(R.id.layout_from);
            txtCity = (TextView) view.findViewById(R.id.txt_city);
            imageDone = (ImageView) view.findViewById(R.id.image_done);

        }

    }

    protected class LabelHolder extends RecyclerView.ViewHolder {
        private TextView txtLabel;

        public LabelHolder(View view) {
            super(view);
            txtLabel = (TextView) view.findViewById(R.id.txt_label);
        }
    }

    protected class RideTypeHolder extends RecyclerView.ViewHolder{
        private RelativeLayout layoutLocation;
        private ImageView imageRideType;
        private TextView txtRide;
        private TextView txtRideTagline;
        private ImageView imageDone;

        public RideTypeHolder(View view) {
            super(view);
            layoutLocation = (RelativeLayout) view.findViewById(R.id.layout_location);
            imageRideType = (ImageView) view.findViewById(R.id.image_ride_type);
            txtRide = (TextView) view.findViewById(R.id.txt_ride);
            txtRideTagline = (TextView) view.findViewById(R.id.txt_ride_tagline);
            imageDone = (ImageView) view.findViewById(R.id.image_done);
        }
    }

}
