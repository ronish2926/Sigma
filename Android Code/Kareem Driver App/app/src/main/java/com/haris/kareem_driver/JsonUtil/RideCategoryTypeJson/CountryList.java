
package com.haris.kareem_driver.JsonUtil.RideCategoryTypeJson;

import android.os.Parcel;
import android.os.Parcelable;
import android.os.Parcelable.Creator;
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
    @SerializedName("tagline")
    @Expose
    private String tagline;
    @SerializedName("picture")
    @Expose
    private String picture;
    public final static Parcelable.Creator<CountryList> CREATOR = new Creator<CountryList>() {


        @SuppressWarnings({
            "unchecked"
        })
        public CountryList createFromParcel(Parcel in) {
            return new CountryList(in);
        }

        public CountryList[] newArray(int size) {
            return (new CountryList[size]);
        }

    }
    ;

    protected CountryList(Parcel in) {
        this.id = ((String) in.readValue((String.class.getClassLoader())));
        this.name = ((String) in.readValue((String.class.getClassLoader())));
        this.tagline = ((String) in.readValue((String.class.getClassLoader())));
        this.picture = ((String) in.readValue((String.class.getClassLoader())));
    }

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

    public String getTagline() {
        return tagline;
    }

    public void setTagline(String tagline) {
        this.tagline = tagline;
    }

    public String getPicture() {
        return picture;
    }

    public void setPicture(String picture) {
        this.picture = picture;
    }

    public void writeToParcel(Parcel dest, int flags) {
        dest.writeValue(id);
        dest.writeValue(name);
        dest.writeValue(tagline);
        dest.writeValue(picture);
    }

    public int describeContents() {
        return  0;
    }

}
