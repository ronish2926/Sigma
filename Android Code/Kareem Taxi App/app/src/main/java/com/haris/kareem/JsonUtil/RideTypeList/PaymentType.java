
package com.haris.kareem.JsonUtil.RideTypeList;

import java.util.List;
import android.os.Parcel;
import android.os.Parcelable;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class PaymentType implements Parcelable
{

    @SerializedName("id")
    @Expose
    private String id;
    @SerializedName("name")
    @Expose
    private String name;
    @SerializedName("tag")
    @Expose
    private String tag;
    @SerializedName("picture")
    @Expose
    private String picture;
    @SerializedName("payment_detail")
    @Expose
    private List<PaymentDetail> paymentDetail = null;

    public PaymentType() {
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

    public String getTag() {
        return tag;
    }

    public void setTag(String tag) {
        this.tag = tag;
    }

    public List<PaymentDetail> getPaymentDetail() {
        return paymentDetail;
    }

    public void setPaymentDetail(List<PaymentDetail> paymentDetail) {
        this.paymentDetail = paymentDetail;
    }

    public String getPicture() {
        return picture;
    }

    public PaymentType setPicture(String picture) {
        this.picture = picture;
        return this;
    }


    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(this.id);
        dest.writeString(this.name);
        dest.writeString(this.tag);
        dest.writeString(this.picture);
        dest.writeTypedList(this.paymentDetail);
    }

    protected PaymentType(Parcel in) {
        this.id = in.readString();
        this.name = in.readString();
        this.tag = in.readString();
        this.picture = in.readString();
        this.paymentDetail = in.createTypedArrayList(PaymentDetail.CREATOR);
    }

    public static final Creator<PaymentType> CREATOR = new Creator<PaymentType>() {
        @Override
        public PaymentType createFromParcel(Parcel source) {
            return new PaymentType(source);
        }

        @Override
        public PaymentType[] newArray(int size) {
            return new PaymentType[size];
        }
    };
}
