
package com.haris.kareem_driver.JsonUtil.RideHistoryUtil;

import android.os.Parcel;
import android.os.Parcelable;
import android.os.Parcelable.Creator;
import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class OrderList implements Parcelable
{

    @SerializedName("id")
    @Expose
    private String id;
    @SerializedName("price")
    @Expose
    private String price;
    @SerializedName("ride_economy")
    @Expose
    private String rideEconomy;
    @SerializedName("payment_method")
    @Expose
    private String paymentMethod;
    @SerializedName("duration")
    @Expose
    private String duration;
    public final static Parcelable.Creator<OrderList> CREATOR = new Creator<OrderList>() {


        @SuppressWarnings({
            "unchecked"
        })
        public OrderList createFromParcel(Parcel in) {
            return new OrderList(in);
        }

        public OrderList[] newArray(int size) {
            return (new OrderList[size]);
        }

    }
    ;

    protected OrderList(Parcel in) {
        this.id = ((String) in.readValue((String.class.getClassLoader())));
        this.price = ((String) in.readValue((String.class.getClassLoader())));
        this.rideEconomy = ((String) in.readValue((String.class.getClassLoader())));
        this.paymentMethod = ((String) in.readValue((String.class.getClassLoader())));
        this.duration = ((String) in.readValue((String.class.getClassLoader())));
    }

    public OrderList() {
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getPrice() {
        return price;
    }

    public void setPrice(String price) {
        this.price = price;
    }

    public String getRideEconomy() {
        return rideEconomy;
    }

    public void setRideEconomy(String rideEconomy) {
        this.rideEconomy = rideEconomy;
    }

    public String getPaymentMethod() {
        return paymentMethod;
    }

    public void setPaymentMethod(String paymentMethod) {
        this.paymentMethod = paymentMethod;
    }

    public String getDuration() {
        return duration;
    }

    public void setDuration(String duration) {
        this.duration = duration;
    }

    public void writeToParcel(Parcel dest, int flags) {
        dest.writeValue(id);
        dest.writeValue(price);
        dest.writeValue(rideEconomy);
        dest.writeValue(paymentMethod);
        dest.writeValue(duration);
    }

    public int describeContents() {
        return  0;
    }

}
