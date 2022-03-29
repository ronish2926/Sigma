package com.haris.kareem_driver.ObjectUtil;

import android.os.Parcel;
import android.os.Parcelable;

public class DestinationObject implements Parcelable {
    public double latitude;
    public double longitude;


    public DestinationObject() {
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
        return "DestinationObject{" +
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
        dest.writeDouble(this.latitude);
        dest.writeDouble(this.longitude);
    }

    protected DestinationObject(Parcel in) {
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
