
package com.haris.kareem_driver.JsonUtil.CaptainStatisticsUtil;

import java.util.List;
import android.os.Parcel;
import android.os.Parcelable;
import android.os.Parcelable.Creator;
import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class CaptainStatisticsJson implements Parcelable
{

    @SerializedName("code")
    @Expose
    private String code;
    @SerializedName("message")
    @Expose
    private String message;
    @SerializedName("statistics")
    @Expose
    private List<Statistic> statistics = null;
    public final static Parcelable.Creator<CaptainStatisticsJson> CREATOR = new Creator<CaptainStatisticsJson>() {


        @SuppressWarnings({
            "unchecked"
        })
        public CaptainStatisticsJson createFromParcel(Parcel in) {
            return new CaptainStatisticsJson(in);
        }

        public CaptainStatisticsJson[] newArray(int size) {
            return (new CaptainStatisticsJson[size]);
        }

    }
    ;

    protected CaptainStatisticsJson(Parcel in) {
        this.code = ((String) in.readValue((String.class.getClassLoader())));
        this.message = ((String) in.readValue((String.class.getClassLoader())));
        in.readList(this.statistics, (com.haris.kareem_driver.JsonUtil.CaptainStatisticsUtil.Statistic.class.getClassLoader()));
    }

    public CaptainStatisticsJson() {
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

    public List<Statistic> getStatistics() {
        return statistics;
    }

    public void setStatistics(List<Statistic> statistics) {
        this.statistics = statistics;
    }

    public void writeToParcel(Parcel dest, int flags) {
        dest.writeValue(code);
        dest.writeValue(message);
        dest.writeList(statistics);
    }

    public int describeContents() {
        return  0;
    }

}
