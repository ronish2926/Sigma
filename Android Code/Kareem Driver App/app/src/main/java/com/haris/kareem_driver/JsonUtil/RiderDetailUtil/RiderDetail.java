
package com.haris.kareem_driver.JsonUtil.RiderDetailUtil;

import android.os.Parcel;
import android.os.Parcelable;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class RiderDetail implements Parcelable
{

    @SerializedName("id")
    @Expose
    private String id;
    @SerializedName("document_id")
    @Expose
    private String document_id;
    @SerializedName("document_type")
    @Expose
    private String documentType;
    @SerializedName("document_status")
    @Expose
    private String documentStatus;
    @SerializedName("picture_url")
    @Expose
    private String pictureUrl;

    public RiderDetail() {
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getDocument_id() {
        return document_id;
    }

    public RiderDetail setDocument_id(String document_id) {
        this.document_id = document_id;
        return this;
    }

    public String getDocumentStatus() {
        return documentStatus;
    }

    public RiderDetail setDocumentStatus(String documentStatus) {
        this.documentStatus = documentStatus;
        return this;
    }

    public String getDocumentType() {
        return documentType;
    }

    public RiderDetail setDocumentType(String documentType) {
        this.documentType = documentType;
        return this;
    }

    public String getPictureUrl() {
        return pictureUrl;
    }

    public RiderDetail setPictureUrl(String pictureUrl) {
        this.pictureUrl = pictureUrl;
        return this;
    }


    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(this.id);
        dest.writeString(this.document_id);
        dest.writeString(this.documentType);
        dest.writeString(this.documentStatus);
        dest.writeString(this.pictureUrl);
    }

    protected RiderDetail(Parcel in) {
        this.id = in.readString();
        this.document_id = in.readString();
        this.documentType = in.readString();
        this.documentStatus = in.readString();
        this.pictureUrl = in.readString();
    }

    public static final Creator<RiderDetail> CREATOR = new Creator<RiderDetail>() {
        @Override
        public RiderDetail createFromParcel(Parcel source) {
            return new RiderDetail(source);
        }

        @Override
        public RiderDetail[] newArray(int size) {
            return new RiderDetail[size];
        }
    };
}
