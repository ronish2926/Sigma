package com.haris.kareem_driver.JsonUtil.ListOfCountryUtil;

import java.util.List;
import android.os.Parcel;
import android.os.Parcelable;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class CountryList implements Parcelable
{

    @SerializedName("id")
    @Expose
    private String id;
    @SerializedName("name")
    @Expose
    private String name;
    @SerializedName("city_list")
    @Expose
    private List<CityList> cityList = null;

    public CountryList() {
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public List<CityList> getCityList() {
        return cityList;
    }

    public void setCityList(List<CityList> cityList) {
        this.cityList = cityList;
    }


    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(this.id);
        dest.writeString(this.name);
        dest.writeTypedList(this.cityList);
    }

    protected CountryList(Parcel in) {
        this.id = in.readString();
        this.name = in.readString();
        this.cityList = in.createTypedArrayList(CityList.CREATOR);
    }

    public static final Creator<CountryList> CREATOR = new Creator<CountryList>() {
        @Override
        public CountryList createFromParcel(Parcel source) {
            return new CountryList(source);
        }

        @Override
        public CountryList[] newArray(int size) {
            return new CountryList[size];
        }
    };
}
