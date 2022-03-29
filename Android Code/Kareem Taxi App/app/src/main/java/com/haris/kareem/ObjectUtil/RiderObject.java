package com.haris.kareem.ObjectUtil;

import android.os.Parcel;
import android.os.Parcelable;

public class RiderObject implements Parcelable {
    public int user_id;
    public String user_name;
    public String user_picture;
    public double rider_latitude;
    public double rider_longitude;
    public String rider_phone;
    public String direction_route;
    public String car_brand;
    public String car_name;
    public String car_colour;
    public String car_number_plate;
    public String rating;

    public RiderObject() {
    }

    public RiderObject(int user_id, String user_name, String user_picture) {
        this.user_id = user_id;
        this.user_name = user_name;
        this.user_picture = user_picture;
    }

    public RiderObject(int user_id, String user_name, String user_picture, double rider_latitude, double rider_longitude) {
        this.user_id = user_id;
        this.user_name = user_name;
        this.user_picture = user_picture;
        this.rider_latitude = rider_latitude;
        this.rider_longitude = rider_longitude;
    }

    public RiderObject(int user_id, String user_name, String user_picture, double rider_latitude, double rider_longitude, String direction_route) {
        this.user_id = user_id;
        this.user_name = user_name;
        this.user_picture = user_picture;
        this.rider_latitude = rider_latitude;
        this.rider_longitude = rider_longitude;
        this.direction_route = direction_route;
    }


    public String getRider_phone() {
        return rider_phone;
    }

    public RiderObject setRider_phone(String rider_phone) {
        this.rider_phone = rider_phone;
        return this;
    }

    public String getDirection_route() {
        return direction_route;
    }

    public RiderObject setDirection_route(String direction_route) {
        this.direction_route = direction_route;
        return this;
    }

    public int getUser_id() {
        return user_id;
    }

    public RiderObject setUser_id(int user_id) {
        this.user_id = user_id;
        return this;
    }

    public String getUser_name() {
        return user_name;
    }

    public RiderObject setUser_name(String user_name) {
        this.user_name = user_name;
        return this;
    }

    public String getUser_picture() {
        return user_picture;
    }

    public RiderObject setUser_picture(String user_picture) {
        this.user_picture = user_picture;
        return this;
    }

    public double getRider_latitude() {
        return rider_latitude;
    }

    public RiderObject setRider_latitude(double rider_latitude) {
        this.rider_latitude = rider_latitude;
        return this;
    }

    public double getRider_longitude() {
        return rider_longitude;
    }

    public RiderObject setRider_longitude(double rider_longitude) {
        this.rider_longitude = rider_longitude;
        return this;
    }

    public String getCar_brand() {
        return car_brand;
    }

    public RiderObject setCar_brand(String car_brand) {
        this.car_brand = car_brand;
        return this;
    }

    public String getCar_name() {
        return car_name;
    }

    public RiderObject setCar_name(String car_name) {
        this.car_name = car_name;
        return this;
    }

    public String getCar_colour() {
        return car_colour;
    }

    public RiderObject setCar_colour(String car_colour) {
        this.car_colour = car_colour;
        return this;
    }

    public String getCar_number_plate() {
        return car_number_plate;
    }

    public RiderObject setCar_number_plate(String car_number_plate) {
        this.car_number_plate = car_number_plate;
        return this;
    }

    public String getRating() {
        return rating;
    }

    public RiderObject setRating(String rating) {
        this.rating = rating;
        return this;
    }

    @Override
    public String toString() {
        return "RiderObject{" +
                "user_id=" + user_id +
                ", user_name='" + user_name + '\'' +
                ", user_picture='" + user_picture + '\'' +
                ", rider_latitude=" + rider_latitude +
                ", rider_longitude=" + rider_longitude +
                ", direction_route='" + direction_route + '\'' +
                ", car_brand='" + car_brand + '\'' +
                ", car_name='" + car_name + '\'' +
                ", car_colour='" + car_colour + '\'' +
                ", car_number_plate='" + car_number_plate + '\'' +
                '}';
    }


    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeInt(this.user_id);
        dest.writeString(this.user_name);
        dest.writeString(this.user_picture);
        dest.writeDouble(this.rider_latitude);
        dest.writeDouble(this.rider_longitude);
        dest.writeString(this.rider_phone);
        dest.writeString(this.direction_route);
        dest.writeString(this.car_brand);
        dest.writeString(this.car_name);
        dest.writeString(this.car_colour);
        dest.writeString(this.car_number_plate);
        dest.writeString(this.rating);
    }

    protected RiderObject(Parcel in) {
        this.user_id = in.readInt();
        this.user_name = in.readString();
        this.user_picture = in.readString();
        this.rider_latitude = in.readDouble();
        this.rider_longitude = in.readDouble();
        this.rider_phone = in.readString();
        this.direction_route = in.readString();
        this.car_brand = in.readString();
        this.car_name = in.readString();
        this.car_colour = in.readString();
        this.car_number_plate = in.readString();
        this.rating = in.readString();
    }

    public static final Creator<RiderObject> CREATOR = new Creator<RiderObject>() {
        @Override
        public RiderObject createFromParcel(Parcel source) {
            return new RiderObject(source);
        }

        @Override
        public RiderObject[] newArray(int size) {
            return new RiderObject[size];
        }
    };
}
