
package com.haris.kareem_driver.JsonUtil.CaptainStatisticsUtil;

import android.os.Parcel;
import android.os.Parcelable;
import android.os.Parcelable.Creator;
import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class Statistic implements Parcelable
{

    @SerializedName("id")
    @Expose
    private String id;
    @SerializedName("date_no")
    @Expose
    private String dateNo;
    @SerializedName("day_name")
    @Expose
    private String dayName;
    @SerializedName("total_sale")
    @Expose
    private String totalSale;
    @SerializedName("total_earning")
    @Expose
    private String totalEarning;
    @SerializedName("currency_symbol")
    @Expose
    private String currencySymbol;
    @SerializedName("total_distance")
    @Expose
    private String totalDistance;
    @SerializedName("distance_symbol")
    @Expose
    private String distanceSymbol;
    @SerializedName("total_duration")
    @Expose
    private String totalDuration;
    @SerializedName("duration_symbol")
    @Expose
    private String durationSymbol;
    @SerializedName("company_percentage")
    @Expose
    private String companyPercentage;
    @SerializedName("date_created")
    @Expose
    private String dateCreated;
    public final static Parcelable.Creator<Statistic> CREATOR = new Creator<Statistic>() {


        @SuppressWarnings({
            "unchecked"
        })
        public Statistic createFromParcel(Parcel in) {
            return new Statistic(in);
        }

        public Statistic[] newArray(int size) {
            return (new Statistic[size]);
        }

    }
    ;

    protected Statistic(Parcel in) {
        this.id = ((String) in.readValue((String.class.getClassLoader())));
        this.dateNo = ((String) in.readValue((String.class.getClassLoader())));
        this.dayName = ((String) in.readValue((String.class.getClassLoader())));
        this.totalSale = ((String) in.readValue((String.class.getClassLoader())));
        this.totalEarning = ((String) in.readValue((String.class.getClassLoader())));
        this.currencySymbol = ((String) in.readValue((String.class.getClassLoader())));
        this.totalDistance = ((String) in.readValue((String.class.getClassLoader())));
        this.distanceSymbol = ((String) in.readValue((String.class.getClassLoader())));
        this.totalDuration = ((String) in.readValue((String.class.getClassLoader())));
        this.durationSymbol = ((String) in.readValue((String.class.getClassLoader())));
        this.companyPercentage = ((String) in.readValue((String.class.getClassLoader())));
        this.dateCreated = ((String) in.readValue((String.class.getClassLoader())));
    }

    public Statistic() {
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getDateNo() {
        return dateNo;
    }

    public void setDateNo(String dateNo) {
        this.dateNo = dateNo;
    }

    public String getDayName() {
        return dayName;
    }

    public void setDayName(String dayName) {
        this.dayName = dayName;
    }

    public String getTotalSale() {
        return totalSale;
    }

    public void setTotalSale(String totalSale) {
        this.totalSale = totalSale;
    }

    public String getTotalEarning() {
        return totalEarning;
    }

    public void setTotalEarning(String totalEarning) {
        this.totalEarning = totalEarning;
    }

    public String getCurrencySymbol() {
        return currencySymbol;
    }

    public void setCurrencySymbol(String currencySymbol) {
        this.currencySymbol = currencySymbol;
    }

    public String getTotalDistance() {
        return totalDistance;
    }

    public void setTotalDistance(String totalDistance) {
        this.totalDistance = totalDistance;
    }

    public String getDistanceSymbol() {
        return distanceSymbol;
    }

    public void setDistanceSymbol(String distanceSymbol) {
        this.distanceSymbol = distanceSymbol;
    }

    public String getTotalDuration() {
        return totalDuration;
    }

    public void setTotalDuration(String totalDuration) {
        this.totalDuration = totalDuration;
    }

    public String getDurationSymbol() {
        return durationSymbol;
    }

    public void setDurationSymbol(String durationSymbol) {
        this.durationSymbol = durationSymbol;
    }

    public String getCompanyPercentage() {
        return companyPercentage;
    }

    public void setCompanyPercentage(String companyPercentage) {
        this.companyPercentage = companyPercentage;
    }

    public String getDateCreated() {
        return dateCreated;
    }

    public void setDateCreated(String dateCreated) {
        this.dateCreated = dateCreated;
    }

    public void writeToParcel(Parcel dest, int flags) {
        dest.writeValue(id);
        dest.writeValue(dateNo);
        dest.writeValue(dayName);
        dest.writeValue(totalSale);
        dest.writeValue(totalEarning);
        dest.writeValue(currencySymbol);
        dest.writeValue(totalDistance);
        dest.writeValue(distanceSymbol);
        dest.writeValue(totalDuration);
        dest.writeValue(durationSymbol);
        dest.writeValue(companyPercentage);
        dest.writeValue(dateCreated);
    }

    public int describeContents() {
        return  0;
    }

}
