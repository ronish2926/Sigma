package com.haris.kareem_driver.JsonUtil.ListOfCountryUtil;

import java.util.List;
import android.os.Parcel;
import android.os.Parcelable;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class ListOfCountryJson implements Parcelable
{

    @SerializedName("code")
    @Expose
    private String code;
    @SerializedName("message")
    @Expose
    private String message;
    @SerializedName("country_list")
    @Expose
    private List<CountryList> countryList = null;

    public ListOfCountryJson() {
    }

    public String getCode() {
        return code;
    }

    public void setCode(String code) {
        this.code = code;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public List<CountryList> getCountryList() {
        return countryList;
    }

    public void setCountryList(List<CountryList> countryList) {
        this.countryList = countryList;
    }


    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(this.code);
        dest.writeString(this.message);
        dest.writeTypedList(this.countryList);
    }

    protected ListOfCountryJson(Parcel in) {
        this.code = in.readString();
        this.message = in.readString();
        this.countryList = in.createTypedArrayList(CountryList.CREATOR);
    }

    public static final Creator<ListOfCountryJson> CREATOR = new Creator<ListOfCountryJson>() {
        @Override
        public ListOfCountryJson createFromParcel(Parcel source) {
            return new ListOfCountryJson(source);
        }

        @Override
        public ListOfCountryJson[] newArray(int size) {
            return new ListOfCountryJson[size];
        }
    };
}
