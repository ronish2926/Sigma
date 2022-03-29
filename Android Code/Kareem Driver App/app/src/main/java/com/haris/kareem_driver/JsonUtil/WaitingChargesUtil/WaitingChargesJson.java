package com.haris.kareem_driver.JsonUtil.WaitingChargesUtil;

import android.os.Parcel;
import android.os.Parcelable;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class WaitingChargesJson implements Parcelable
{

    @SerializedName("code")
    @Expose
    private String code;
    @SerializedName("message")
    @Expose
    private String message;

    @SerializedName("order_id")
    @Expose
    private String order_id;
    @SerializedName("waiting_fee")
    @Expose
    private String waiting_fee;

    @SerializedName("payment_type")
    @Expose
    private String payment_type;


    public WaitingChargesJson() {
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

    public String getOrder_id() {
        return order_id;
    }

    public WaitingChargesJson setOrder_id(String order_id) {
        this.order_id = order_id;
        return this;
    }

    public String getWaiting_fee() {
        return waiting_fee;
    }

    public WaitingChargesJson setWaiting_fee(String waiting_fee) {
        this.waiting_fee = waiting_fee;
        return this;
    }

    public String getPayment_type() {
        return payment_type;
    }

    public WaitingChargesJson setPayment_type(String payment_type) {
        this.payment_type = payment_type;
        return this;
    }


    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(this.code);
        dest.writeString(this.message);
        dest.writeString(this.order_id);
        dest.writeString(this.waiting_fee);
        dest.writeString(this.payment_type);
    }

    protected WaitingChargesJson(Parcel in) {
        this.code = in.readString();
        this.message = in.readString();
        this.order_id = in.readString();
        this.waiting_fee = in.readString();
        this.payment_type = in.readString();
    }

    public static final Creator<WaitingChargesJson> CREATOR = new Creator<WaitingChargesJson>() {
        @Override
        public WaitingChargesJson createFromParcel(Parcel source) {
            return new WaitingChargesJson(source);
        }

        @Override
        public WaitingChargesJson[] newArray(int size) {
            return new WaitingChargesJson[size];
        }
    };
}
