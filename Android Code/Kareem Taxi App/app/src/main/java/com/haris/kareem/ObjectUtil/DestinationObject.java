package com.haris.kareem.ObjectUtil;

import android.os.Parcel;
import android.os.Parcelable;

public class DestinationObject implements Parcelable {
    public String from;
    public String from_address;

    public String to;
    public String to_address;

    public String payment_type_image;
    public String payment_type_name;

    public String ride_type_image;
    public String ride_type_name;

    public double latitude;
    public double longitude;




    public DestinationObject() {
    }

    public DestinationObject(double latitude, double longitude) {
        this.latitude = latitude;
        this.longitude = longitude;
    }


    public String getFrom() {
        return from;
    }

    public DestinationObject setFrom(String from) {
        this.from = from;
        return this;
    }

    public String getFrom_address() {
        return from_address;
    }

    public DestinationObject setFrom_address(String from_address) {
        this.from_address = from_address;
        return this;
    }

    public String getTo() {
        return to;
    }

    public DestinationObject setTo(String to) {
        this.to = to;
        return this;
    }

    public String getTo_address() {
        return to_address;
    }

    public DestinationObject setTo_address(String to_address) {
        this.to_address = to_address;
        return this;
    }

    public String getPayment_type_image() {
        return payment_type_image;
    }

    public DestinationObject setPayment_type_image(String payment_type_image) {
        this.payment_type_image = payment_type_image;
        return this;
    }

    public String getPayment_type_name() {
        return payment_type_name;
    }

    public DestinationObject setPayment_type_name(String payment_type_name) {
        this.payment_type_name = payment_type_name;
        return this;
    }

    public String getRide_type_image() {
        return ride_type_image;
    }

    public DestinationObject setRide_type_image(String ride_type_image) {
        this.ride_type_image = ride_type_image;
        return this;
    }

    public String getRide_type_name() {
        return ride_type_name;
    }

    public DestinationObject setRide_type_name(String ride_type_name) {
        this.ride_type_name = ride_type_name;
        return this;
    }

    public double getLatitude() {
        return latitude;
    }

    public DestinationObject setLatitude(double latitude) {
        this.latitude = latitude;
        return this;
    }

    public double getLongitude() {
        return longitude;
    }

    public DestinationObject setLongitude(double longitude) {
        this.longitude = longitude;
        return this;
    }




    @Override
    public String toString() {
        return "TrackingObject{" +
                "latitude=" + latitude +
                ", longitude=" + longitude +

                '}';
    }


    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(this.from);
        dest.writeString(this.from_address);
        dest.writeString(this.to);
        dest.writeString(this.to_address);
        dest.writeString(this.payment_type_image);
        dest.writeString(this.payment_type_name);
        dest.writeString(this.ride_type_image);
        dest.writeString(this.ride_type_name);
        dest.writeDouble(this.latitude);
        dest.writeDouble(this.longitude);
    }

    protected DestinationObject(Parcel in) {
        this.from = in.readString();
        this.from_address = in.readString();
        this.to = in.readString();
        this.to_address = in.readString();
        this.payment_type_image = in.readString();
        this.payment_type_name = in.readString();
        this.ride_type_image = in.readString();
        this.ride_type_name = in.readString();
        this.latitude = in.readDouble();
        this.longitude = in.readDouble();
    }

    public static final Creator<DestinationObject> CREATOR = new Creator<DestinationObject>() {
        @Override
        public DestinationObject createFromParcel(Parcel source) {
            return new DestinationObject(source);
        }

        @Override
        public DestinationObject[] newArray(int size) {
            return new DestinationObject[size];
        }
    };
}
