package com.haris.kareem_driver.ObjectUtil;

import android.os.Parcel;
import android.os.Parcelable;

import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.JsonUtil.CaptainStatisticsUtil.CaptainStatisticsJson;
import com.haris.kareem_driver.JsonUtil.CaptainStatisticsUtil.Statistic;
import com.haris.kareem_driver.JsonUtil.GeneralResponseUtil.GeneralResponse;
import com.haris.kareem_driver.JsonUtil.ListOfCountryUtil.CityList;
import com.haris.kareem_driver.JsonUtil.ListOfCountryUtil.CountryList;
import com.haris.kareem_driver.JsonUtil.ListOfCountryUtil.ListOfCountryJson;
import com.haris.kareem_driver.JsonUtil.RideCategoryTypeJson.RideCategoryTypeJson;
import com.haris.kareem_driver.JsonUtil.RideHistoryUtil.RideHistoryJson;
import com.haris.kareem_driver.JsonUtil.RiderBankDetailUtil.RiderBankDetailJson;
import com.haris.kareem_driver.JsonUtil.RiderDetailUtil.RiderDetail;
import com.haris.kareem_driver.JsonUtil.RiderDetailUtil.RiderDetailJson;
import com.haris.kareem_driver.JsonUtil.RiderOrderUtil.RiderOrderHistory;
import com.haris.kareem_driver.JsonUtil.RiderOrderUtil.RiderOrderHistoryJson;
import com.haris.kareem_driver.JsonUtil.UserUtil.FavouriteList;
import com.haris.kareem_driver.JsonUtil.UserUtil.UserJson;
import com.haris.kareem_driver.JsonUtil.WaitingChargesUtil.WaitingChargesJson;
import com.haris.kareem_driver.Utility.Utility;

import java.util.ArrayList;

public class DataObject implements Parcelable {

    /* Variable for Connection Builder */

    private String code;
    private String message;

    private String waiting_charges;
    private String payment_type;

    /* Variable for Debugging */

    private static String TAG = DataObject.class.getName();

    /* Variable for UserObject */

    private String user_id;
    private String user_fName;
    private String user_lName;
    private String user_password;
    private String login_type;
    private String user_picture;
    private String user_phone;
    private String device_token;
    private String user_email;
    private String user_sign_in;
    private String user_remember;
    private ArrayList<FavouriteList> userFavourite = new ArrayList<>();
    private String user_payment_type;
    private String status_id;

    /* Variable for Order */

    private String order_id;
    private String ride_fare;
    private String ride_type;
    private String ride_type_tagline;
    private String ride_payment;
    private String ride_duration;

    /* Variable for Trip History */

    private String total_trip;
    private String total_duration;
    private String total_distance;
    private String total_earning;
    private String trip_earning;
    private String trip_your_earning;
    private String trip_taxes;
    private String trip_day_name;
    private String trip_date_no;

    /*Variable for Location Selector*/

    private String location_label;
    private String city_name;
    private String location_name;
    private String location_Tagline;
    private double location_latitude;
    private double location_longitude;
    private boolean locationSelected;

    private String country_id;
    private String country_name;
    private String city_id;
    private String city_latitude;
    private String city_longitude;


    /*Variable for Car Type Selector*/

    private String car_category_id;
    private String car_category_name;


    /* Variable for Restaurant Detail */

    private String object_id;
    private String object_name;
    private String object_Description;
    private String object_category_name;
    private String object_min_delivery_time;
    private String object_min_order_price;
    private String object_delivery_charges;
    private String object_expense;
    private String object_rating;
    private String object_no_of_rating;
    private String object_currency;
    private String object_currency_symbol;
    private String object_status;
    private String object_latitude;
    private String object_longitude;
    private String object_address;
    private String object_picture;
    private String object_logo;
    private String object_distance;
    private String object_tags;
    private String object_date_created;
    private String paymentType;
    private boolean is_layout_01 = true;


    /* Variable for Data Type */

    private Constant.DATA_TYPE dataType;
    private ArrayList<DataObject> objectArrayList = new ArrayList<>();
    private ArrayList<Object> homeList = new ArrayList<>();

    /* Variable for Favourites */

    private String favourite_id;
    private boolean isFavourite = false;
    private String cart_id;


    /* Variable for Chatting */

    private String chatting;
    private String picture;
    private String date;
    private String time;
    private boolean isFrom;

    /* General Variable  */

    private boolean isLongTap;
    private boolean isFirstItem;
    private boolean isAlreadyAddedIntoCart;
    private boolean isPaymentCardSelected;
    private String noOfItemInCart;
    private String basePrice;

    /* Variable for Rider */

    private String rider_id;
    private String customer_name;
    private String customer_picture;

    private String document_id;
    private String rider_document_id;
    private String rider_document;
    private String document_status;

    private String account_holder_id;
    private String account_holder_name;
    private String account_no_id;
    private String account_no;
    private String bank_no_id;
    private String bank_no;
    private String bank_transist_id;
    private String bank_transist_no;


    /* Variable for Order History */


    private String order_restaurant_name;
    private String order_delivery_date;
    private String order_delivery_time;
    private String order_price;
    private String delivery_time;
    private String order_status;
    private double rider_latitude;
    private double rider_longitude;


    private String buildingName;
    private String streetAddressName;
    private String areaName;
    private String unitName;
    private String riderNote;


    public String getCode() {
        return code;
    }

    public DataObject setCode(String code) {
        this.code = code;
        return this;
    }

    public String getMessage() {
        return message;
    }

    public DataObject setMessage(String message) {
        this.message = message;
        return this;
    }

    public String getWaiting_charges() {
        return waiting_charges;
    }

    public DataObject setWaiting_charges(String waiting_charges) {
        this.waiting_charges = waiting_charges;
        return this;
    }



    public String getRider_id() {
        return rider_id;
    }

    public DataObject setRider_id(String rider_id) {
        this.rider_id = rider_id;
        return this;
    }

    public String getOrder_id() {
        return order_id;
    }

    public DataObject setOrder_id(String order_id) {
        this.order_id = order_id;
        return this;
    }

    public String getCustomer_name() {
        return customer_name;
    }

    public DataObject setCustomer_name(String customer_name) {
        this.customer_name = customer_name;
        return this;
    }

    public String getCustomer_picture() {
        return customer_picture;
    }

    public DataObject setCustomer_picture(String customer_picture) {
        this.customer_picture = customer_picture;
        return this;
    }

    public String getDocument_id() {
        return document_id;
    }

    public DataObject setDocument_id(String document_id) {
        this.document_id = document_id;
        return this;
    }

    public String getRider_document_id() {
        return rider_document_id;
    }

    public DataObject setRider_document_id(String rider_document_id) {
        this.rider_document_id = rider_document_id;
        return this;
    }

    public String getRider_document() {
        return rider_document;
    }

    public DataObject setRider_document(String rider_document) {
        this.rider_document = rider_document;
        return this;
    }

    public String getDocument_status() {
        return document_status;
    }

    public DataObject setDocument_status(String document_status) {
        this.document_status = document_status;
        return this;
    }

    public String getAccount_holder_id() {
        return account_holder_id;
    }

    public DataObject setAccount_holder_id(String account_holder_id) {
        this.account_holder_id = account_holder_id;
        return this;
    }

    public String getAccount_holder_name() {
        return account_holder_name;
    }

    public DataObject setAccount_holder_name(String account_holder_name) {
        this.account_holder_name = account_holder_name;
        return this;
    }

    public String getAccount_no_id() {
        return account_no_id;
    }

    public DataObject setAccount_no_id(String account_no_id) {
        this.account_no_id = account_no_id;
        return this;
    }

    public String getAccount_no() {
        return account_no;
    }

    public DataObject setAccount_no(String account_no) {
        this.account_no = account_no;
        return this;
    }

    public String getBank_no_id() {
        return bank_no_id;
    }

    public DataObject setBank_no_id(String bank_no_id) {
        this.bank_no_id = bank_no_id;
        return this;
    }

    public String getBank_no() {
        return bank_no;
    }

    public DataObject setBank_no(String bank_no) {
        this.bank_no = bank_no;
        return this;
    }

    public String getBank_transist_id() {
        return bank_transist_id;
    }

    public DataObject setBank_transist_id(String bank_transist_id) {
        this.bank_transist_id = bank_transist_id;
        return this;
    }

    public String getBank_transist_no() {
        return bank_transist_no;
    }

    public DataObject setBank_transist_no(String bank_transist_no) {
        this.bank_transist_no = bank_transist_no;
        return this;
    }

    public String getOrder_restaurant_name() {
        return order_restaurant_name;
    }

    public DataObject setOrder_restaurant_name(String order_restaurant_name) {
        this.order_restaurant_name = order_restaurant_name;
        return this;
    }

    public String getOrder_delivery_date() {
        return order_delivery_date;
    }

    public DataObject setOrder_delivery_date(String order_delivery_date) {
        this.order_delivery_date = order_delivery_date;
        return this;
    }

    public String getOrder_delivery_time() {
        return order_delivery_time;
    }

    public DataObject setOrder_delivery_time(String order_delivery_time) {
        this.order_delivery_time = order_delivery_time;
        return this;
    }

    public String getOrder_price() {
        return order_price;
    }

    public DataObject setOrder_price(String order_price) {
        this.order_price = order_price;
        return this;
    }

    public String getDelivery_time() {
        return delivery_time;
    }

    public DataObject setDelivery_time(String delivery_time) {
        this.delivery_time = delivery_time;
        return this;
    }

    public String getPayment_type() {
        return payment_type;
    }

    public DataObject setPayment_type(String payment_type) {
        this.payment_type = payment_type;
        return this;
    }

    public String getOrder_status() {
        return order_status;
    }

    public DataObject setOrder_status(String order_status) {
        this.order_status = order_status;
        return this;
    }

    public double getRider_latitude() {
        return rider_latitude;
    }

    public DataObject setRider_latitude(double rider_latitude) {
        this.rider_latitude = rider_latitude;
        return this;
    }

    public double getRider_longitude() {
        return rider_longitude;
    }

    public DataObject setRider_longitude(double rider_longitude) {
        this.rider_longitude = rider_longitude;
        return this;
    }

    public String getUser_id() {
        return user_id;
    }

    public DataObject setUser_id(String user_id) {
        this.user_id = user_id;
        return this;
    }

    public String getUser_fName() {
        return user_fName;
    }

    public DataObject setUser_fName(String user_fName) {
        this.user_fName = user_fName;
        return this;
    }

    public String getUser_lName() {
        return user_lName;
    }

    public DataObject setUser_lName(String user_lName) {
        this.user_lName = user_lName;
        return this;
    }

    public String getUser_password() {
        return user_password;
    }

    public DataObject setUser_password(String user_password) {
        this.user_password = user_password;
        return this;
    }

    public String getLogin_type() {
        return login_type;
    }

    public DataObject setLogin_type(String login_type) {
        this.login_type = login_type;
        return this;
    }

    public String getUser_picture() {
        return user_picture;
    }

    public DataObject setUser_picture(String user_picture) {
        this.user_picture = user_picture;
        return this;
    }

    public String getPhone() {
        return user_phone;
    }

    public DataObject setPhone(String phone) {
        this.user_phone = phone;
        return this;
    }

    public String getDevice_token() {
        return device_token;
    }

    public DataObject setDevice_token(String device_token) {
        this.device_token = device_token;
        return this;
    }

    public String getUser_email() {
        return user_email;
    }

    public DataObject setUser_email(String user_email) {
        this.user_email = user_email;
        return this;
    }

    public String getUser_sign_in() {
        return user_sign_in;
    }

    public DataObject setUser_sign_in(String user_sign_in) {
        this.user_sign_in = user_sign_in;
        return this;
    }

    public String getUser_remember() {
        return user_remember;
    }

    public DataObject setUser_remember(String user_remember) {
        this.user_remember = user_remember;
        return this;
    }

    public ArrayList<FavouriteList> getUserFavourite() {
        return userFavourite;
    }

    public DataObject setUserFavourite(ArrayList<FavouriteList> userFavourite) {
        this.userFavourite = userFavourite;
        return this;
    }

    public String getUser_payment_type() {
        return user_payment_type;
    }

    public DataObject setUser_payment_type(String user_payment_type) {
        this.user_payment_type = user_payment_type;
        return this;
    }

    public String getStatus_id() {
        return status_id;
    }

    public DataObject setStatus_id(String status_id) {
        this.status_id = status_id;
        return this;
    }

    public String getObject_id() {
        return object_id;
    }

    public DataObject setObject_id(String object_id) {
        this.object_id = object_id;
        return this;
    }


    public String getRide_fare() {
        return ride_fare;
    }

    public DataObject setRide_fare(String ride_fare) {
        this.ride_fare = ride_fare;
        return this;
    }

    public String getRide_type() {
        return ride_type;
    }

    public DataObject setRide_type(String ride_type) {
        this.ride_type = ride_type;
        return this;
    }

    public String getRide_type_tagline() {
        return ride_type_tagline;
    }

    public DataObject setRide_type_tagline(String ride_type_tagline) {
        this.ride_type_tagline = ride_type_tagline;
        return this;
    }

    public String getRide_payment() {
        return ride_payment;
    }

    public DataObject setRide_payment(String ride_payment) {
        this.ride_payment = ride_payment;
        return this;
    }

    public String getRide_duration() {
        return ride_duration;
    }

    public DataObject setRide_duration(String ride_duration) {
        this.ride_duration = ride_duration;
        return this;
    }


    public String getTotal_trip() {
        return total_trip;
    }

    public DataObject setTotal_trip(String total_trip) {
        this.total_trip = total_trip;
        return this;
    }

    public String getTotal_duration() {
        return total_duration;
    }

    public DataObject setTotal_duration(String total_duration) {
        this.total_duration = total_duration;
        return this;
    }

    public String getTotal_distance() {
        return total_distance;
    }

    public DataObject setTotal_distance(String total_distance) {
        this.total_distance = total_distance;
        return this;
    }

    public String getTotal_earning() {
        return total_earning;
    }

    public DataObject setTotal_earning(String total_earning) {
        this.total_earning = total_earning;
        return this;
    }

    public String getTrip_earning() {
        return trip_earning;
    }

    public DataObject setTrip_earning(String trip_earning) {
        this.trip_earning = trip_earning;
        return this;
    }

    public String getTrip_your_earning() {
        return trip_your_earning;
    }

    public DataObject setTrip_your_earning(String trip_your_earning) {
        this.trip_your_earning = trip_your_earning;
        return this;
    }

    public String getTrip_taxes() {
        return trip_taxes;
    }

    public DataObject setTrip_taxes(String trip_taxes) {
        this.trip_taxes = trip_taxes;
        return this;
    }

    public String getTrip_day_name() {
        return trip_day_name;
    }

    public DataObject setTrip_day_name(String trip_day_name) {
        this.trip_day_name = trip_day_name;
        return this;
    }

    public String getTrip_date_no() {
        return trip_date_no;
    }

    public DataObject setTrip_date_no(String trip_date_no) {
        this.trip_date_no = trip_date_no;
        return this;
    }

    public String getLocation_label() {
        return location_label;
    }

    public DataObject setLocation_label(String location_label) {
        this.location_label = location_label;
        return this;
    }

    public String getCity_name() {
        return city_name;
    }

    public DataObject setCity_name(String city_name) {
        this.city_name = city_name;
        return this;
    }

    public String getLocation_name() {
        return location_name;
    }

    public DataObject setLocation_name(String location_name) {
        this.location_name = location_name;
        return this;
    }

    public String getLocation_Tagline() {
        return location_Tagline;
    }

    public DataObject setLocation_Tagline(String location_Tagline) {
        this.location_Tagline = location_Tagline;
        return this;
    }

    public double getLocation_latitude() {
        return location_latitude;
    }

    public DataObject setLocation_latitude(double location_latitude) {
        this.location_latitude = location_latitude;
        return this;
    }

    public double getLocation_longitude() {
        return location_longitude;
    }

    public DataObject setLocation_longitude(double location_longitude) {
        this.location_longitude = location_longitude;
        return this;
    }

    public boolean isLocationSelected() {
        return locationSelected;
    }

    public DataObject setLocationSelected(boolean locationSelected) {
        this.locationSelected = locationSelected;
        return this;
    }

    public String getCountry_id() {
        return country_id;
    }

    public DataObject setCountry_id(String country_id) {
        this.country_id = country_id;
        return this;
    }

    public String getCountry_name() {
        return country_name;
    }

    public DataObject setCountry_name(String country_name) {
        this.country_name = country_name;
        return this;
    }

    public String getCity_id() {
        return city_id;
    }

    public DataObject setCity_id(String city_id) {
        this.city_id = city_id;
        return this;
    }

    public String getCity_latitude() {
        return city_latitude;
    }

    public DataObject setCity_latitude(String city_latitude) {
        this.city_latitude = city_latitude;
        return this;
    }

    public String getCity_longitude() {
        return city_longitude;
    }

    public DataObject setCity_longitude(String city_longitude) {
        this.city_longitude = city_longitude;
        return this;
    }

    public String getCar_category_id() {
        return car_category_id;
    }

    public DataObject setCar_category_id(String car_category_id) {
        this.car_category_id = car_category_id;
        return this;
    }

    public String getCar_category_name() {
        return car_category_name;
    }

    public DataObject setCar_category_name(String car_category_name) {
        this.car_category_name = car_category_name;
        return this;
    }

    public String getObject_name() {
        return object_name;
    }

    public DataObject setObject_name(String object_name) {
        this.object_name = object_name;
        return this;
    }

    public String getObject_Description() {
        return object_Description;
    }

    public DataObject setObject_Description(String object_Description) {
        this.object_Description = object_Description;
        return this;
    }

    public String getObject_category_name() {
        return object_category_name;
    }

    public DataObject setObject_category_name(String object_category_name) {
        this.object_category_name = object_category_name;
        return this;
    }

    public String getObject_min_delivery_time() {
        return object_min_delivery_time;
    }

    public DataObject setObject_min_delivery_time(String object_min_delivery_time) {
        this.object_min_delivery_time = object_min_delivery_time;
        return this;
    }

    public String getObject_min_order_price() {
        return object_min_order_price;
    }

    public DataObject setObject_min_order_price(String object_min_order_price) {
        this.object_min_order_price = object_min_order_price;
        return this;
    }

    public String getObject_delivery_charges() {
        return object_delivery_charges;
    }

    public DataObject setObject_delivery_charges(String object_delivery_charges) {
        this.object_delivery_charges = object_delivery_charges;
        return this;
    }

    public String getObject_expense() {
        return object_expense;
    }

    public DataObject setObject_expense(String object_expense) {
        this.object_expense = object_expense;
        return this;
    }

    public String getObject_rating() {
        return object_rating;
    }

    public DataObject setObject_rating(String object_rating) {
        this.object_rating = object_rating;
        return this;
    }

    public String getObject_no_of_rating() {
        return object_no_of_rating;
    }

    public DataObject setObject_no_of_rating(String object_no_of_rating) {
        this.object_no_of_rating = object_no_of_rating;
        return this;
    }

    public String getObject_currency() {
        return object_currency;
    }

    public DataObject setObject_currency(String object_currency) {
        this.object_currency = object_currency;
        return this;
    }

    public String getObject_currency_symbol() {
        return object_currency_symbol;
    }

    public DataObject setObject_currency_symbol(String object_currency_symbol) {
        this.object_currency_symbol = object_currency_symbol;
        return this;
    }

    public String getObject_status() {
        return object_status;
    }

    public DataObject setObject_status(String object_status) {
        this.object_status = object_status;
        return this;
    }

    public String getObject_latitude() {
        return object_latitude;
    }

    public DataObject setObject_latitude(String object_latitude) {
        this.object_latitude = object_latitude;
        return this;
    }

    public String getObject_longitude() {
        return object_longitude;
    }

    public DataObject setObject_longitude(String object_longitude) {
        this.object_longitude = object_longitude;
        return this;
    }

    public String getObject_address() {
        return object_address;
    }

    public DataObject setObject_address(String object_address) {
        this.object_address = object_address;
        return this;
    }

    public String getObject_picture() {
        return object_picture;
    }

    public DataObject setObject_picture(String object_picture) {
        this.object_picture = object_picture;
        return this;
    }

    public String getObject_logo() {
        return object_logo;
    }

    public DataObject setObject_logo(String object_logo) {
        this.object_logo = object_logo;
        return this;
    }

    public String getObject_distance() {
        return object_distance;
    }

    public DataObject setObject_distance(String object_distance) {
        this.object_distance = object_distance;
        return this;
    }

    public String getObject_tags() {
        return object_tags;
    }

    public DataObject setObject_tags(String object_tags) {
        this.object_tags = object_tags;
        return this;
    }

    public String getObject_date_created() {
        return object_date_created;
    }

    public DataObject setObject_date_created(String object_date_created) {
        this.object_date_created = object_date_created;
        return this;
    }

    public String getPaymentType() {
        return paymentType;
    }

    public DataObject setPaymentType(String paymentType) {
        this.paymentType = paymentType;
        return this;
    }


    public Constant.DATA_TYPE getDataType() {
        return dataType;
    }

    public DataObject setDataType(Constant.DATA_TYPE dataType) {
        this.dataType = dataType;
        return this;
    }

    public boolean isLongTap() {
        return isLongTap;
    }

    public DataObject setLongTap(boolean longTap) {
        isLongTap = longTap;
        return this;
    }

    public boolean isFirstItem() {
        return isFirstItem;
    }

    public DataObject setFirstItem(boolean firstItem) {
        isFirstItem = firstItem;
        return this;
    }

    public boolean isAlreadyAddedIntoCart() {
        return isAlreadyAddedIntoCart;
    }

    public DataObject setAlreadyAddedIntoCart(boolean alreadyAddedIntoCart) {
        isAlreadyAddedIntoCart = alreadyAddedIntoCart;
        return this;
    }

    public boolean isPaymentCardSelected() {
        return isPaymentCardSelected;
    }

    public DataObject setPaymentCardSelected(boolean paymentCardSelected) {
        isPaymentCardSelected = paymentCardSelected;
        return this;
    }

    public String getNoOfItemInCart() {
        return noOfItemInCart;
    }

    public DataObject setNoOfItemInCart(String noOfItemInCart) {
        this.noOfItemInCart = noOfItemInCart;
        return this;
    }

    public String getBasePrice() {
        return basePrice;
    }

    public DataObject setBasePrice(String basePrice) {
        this.basePrice = basePrice;
        return this;
    }

    public ArrayList<DataObject> getObjectArrayList() {
        return objectArrayList;
    }

    public DataObject setObjectArrayList(ArrayList<DataObject> objectArrayList) {
        this.objectArrayList = objectArrayList;
        return this;
    }

    public ArrayList<Object> getHomeList() {
        return homeList;
    }

    public DataObject setHomeList(ArrayList<Object> homeList) {
        this.homeList = homeList;
        return this;
    }

    public String getFavourite_id() {
        return favourite_id;
    }

    public DataObject setFavourite_id(String favourite_id) {
        this.favourite_id = favourite_id;
        return this;
    }

    public boolean isFavourite() {
        return isFavourite;
    }

    public DataObject setFavourite(boolean favourite) {
        isFavourite = favourite;
        return this;
    }

    public String getCart_id() {
        return cart_id;
    }

    public DataObject setCart_id(String cart_id) {
        this.cart_id = cart_id;
        return this;
    }

    public String getChatting() {
        return chatting;
    }

    public DataObject setChatting(String chatting) {
        this.chatting = chatting;
        return this;
    }

    public String getPicture() {
        return picture;
    }

    public DataObject setPicture(String picture) {
        this.picture = picture;
        return this;
    }

    public String getDate() {
        return date;
    }

    public DataObject setDate(String date) {
        this.date = date;
        return this;
    }

    public String getTime() {
        return time;
    }

    public DataObject setTime(String time) {
        this.time = time;
        return this;
    }

    public boolean isFrom() {
        return isFrom;
    }

    public DataObject setFrom(boolean from) {
        isFrom = from;
        return this;
    }

    public String getBuildingName() {
        return buildingName;
    }

    public DataObject setBuildingName(String buildingName) {
        this.buildingName = buildingName;
        return this;
    }

    public String getStreetAddressName() {
        return streetAddressName;
    }

    public DataObject setStreetAddressName(String streetAddressName) {
        this.streetAddressName = streetAddressName;
        return this;
    }

    public String getAreaName() {
        return areaName;
    }

    public DataObject setAreaName(String areaName) {
        this.areaName = areaName;
        return this;
    }

    public String getUnitName() {
        return unitName;
    }

    public DataObject setUnitName(String unitName) {
        this.unitName = unitName;
        return this;
    }

    public String getRiderNote() {
        return riderNote;
    }

    public DataObject setRiderNote(String riderNote) {
        this.riderNote = riderNote;
        return this;
    }


    public static DataObject getDataObject(RequestObject requestObject, Object data) {

        DataObject dataObject = null;
        String nextPage = null;

        if (requestObject.getConnection() == Constant.CONNECTION.SIGN_UP) {

            UserJson userJson = (UserJson) data;
            dataObject = new DataObject()
                    .setCode(userJson.getCode())
                    .setMessage(userJson.getMessage());

        }
        else if (requestObject.getConnection() == Constant.CONNECTION.LOGIN) {

            UserJson userJson = (UserJson) data;
            dataObject = new DataObject()
                    .setCode(userJson.getCode())
                    .setMessage(userJson.getMessage())
                    .setUser_id(userJson.getId())
                    .setUser_fName(userJson.getFName())
                    .setUser_email(userJson.getEmail())
                    .setUser_password(userJson.getPass())
                    .setDevice_token(userJson.getDeviceToken())
                    .setPhone(userJson.getPhone())
                    .setUser_picture(userJson.getAvatar())
                    .setStatus_id(userJson.getStatus_id());

        }
        else if (requestObject.getConnection() == Constant.CONNECTION.FORGOT) {

            UserJson userJson = (UserJson) data;
            dataObject = new DataObject()
                    .setCode(userJson.getCode())
                    .setMessage(userJson.getMessage());

        }
        else if (requestObject.getConnection() == Constant.CONNECTION.RIDER_CURRENT_ORDER) {

            //region Rider Current & History Order
            ArrayList<DataObject> restaurantList = new ArrayList<>();
            RiderOrderHistoryJson riderOrderHistoryJson = (RiderOrderHistoryJson) data;


            /*List of Order History*/

            for (int i = 0; i < riderOrderHistoryJson.getOrderList().size(); i++) {

                RiderOrderHistory featured = riderOrderHistoryJson.getOrderList().get(i);

                DateTimeObject dateTimeObject = Utility.parseTimeDate(new DateTimeObject()
                        .setDatetimeType(Constant.DATETIME.BOTH12)
                        .setDatetime(featured.getDeliveryDate()));

                restaurantList.add(new DataObject()
                        .setOrder_id(featured.getId())
                        .setRider_id(featured.getRider_order_id())
                        .setCustomer_name(featured.getUser_name())
                        .setCustomer_picture(featured.getUser_picture())
                        .setObject_name(featured.getRestaurantName())
                        .setObject_logo(featured.getRestaurantLogo())
                        .setObject_latitude(featured.getLatitude())
                        .setObject_longitude(featured.getLongitude())
                        .setOrder_delivery_time(featured.getDeliveryTime())
                        .setOrder_price(featured.getOrderPrice())
                        .setPaymentType(featured.getPaymentType())
                        .setDate(dateTimeObject.getDate())
                        .setTime(dateTimeObject.getTime())
                        .setStreetAddressName(featured.getBilling_address())
                        .setBuildingName(featured.getBuilding_no())
                        .setAreaName(featured.getArea_name())
                        .setUnitName(featured.getFloor_name())
                        .setRiderNote(featured.getRider_note())
                        .setDataType(requestObject.getConnection() == Constant.CONNECTION.RIDER_CURRENT_ORDER
                                ? Constant.DATA_TYPE.CURRENT_ORDER : Constant.DATA_TYPE.HISTORY_ORDER));

            }


            //endregion

            dataObject = new DataObject()
                    .setCode(riderOrderHistoryJson.getCode())
                    .setMessage(riderOrderHistoryJson.getMessage())
                    .setObjectArrayList(restaurantList);

        }
        else if (requestObject.getConnection() == Constant.CONNECTION.RIDER_DOCUMENT
                || requestObject.getConnection() == Constant.CONNECTION.RIDER_ADD_DOCUMENT) {


            //region Rider Documents
            ArrayList<DataObject> restaurantList = new ArrayList<>();
            RiderDetailJson riderDetailJson = (RiderDetailJson) data;
            String document_id = null;

            /*List of Rider Documents*/

            for (int i = 0; i < riderDetailJson.getRiderDetail().size(); i++) {

                RiderDetail riderDetail = riderDetailJson.getRiderDetail().get(i);
                restaurantList.add(new DataObject()
                        .setRider_document_id(riderDetail.getId())
                        .setDocument_id(riderDetail.getDocument_id())
                        .setRider_document(riderDetail.getPictureUrl())
                        .setDocument_status(riderDetail.getDocumentStatus()));
                document_id = riderDetail.getDocument_id();

            }

            //endregion

            dataObject = new DataObject()
                    .setCode(riderDetailJson.getCode())
                    .setMessage(riderDetailJson.getMessage())
                    .setDocument_id(document_id)
                    .setObjectArrayList(restaurantList);

        }
        else if (requestObject.getConnection() == Constant.CONNECTION.RIDER_BANK_DETAIL) {


            //region Rider Documents
            ArrayList<DataObject> restaurantList = new ArrayList<>();
            RiderBankDetailJson riderDetailJson = (RiderBankDetailJson) data;


            /*List of Rider Bank Detail*/

            for (int i = 0; i < riderDetailJson.getRiderDetail().size(); i++) {

                com.haris.kareem_driver.JsonUtil.RiderBankDetailUtil.RiderDetail riderDetail = riderDetailJson.getRiderDetail().get(i);
                restaurantList.add(new DataObject()
                        .setAccount_no_id(riderDetail.getAccountNumberId())
                        .setAccount_holder_name(riderDetail.getHolderName())
                        .setAccount_no(riderDetail.getAccountNo())
                        .setBank_transist_no(riderDetail.getBankTransitNo())
                        .setBank_no(riderDetail.getBankNo()));

            }


            //endregion

            dataObject = new DataObject()
                    .setCode(riderDetailJson.getCode())
                    .setMessage(riderDetailJson.getMessage())
                    .setObjectArrayList(restaurantList);

        }
        else if (requestObject.getConnection() == Constant.CONNECTION.CURRENT_RIDES) {

            RideHistoryJson rideHistoryJson = (RideHistoryJson) data;
            String order_id = null;
            String ride_fare = null;
            String payment_method = null;
            String ride_type = null;
            String ride_duration = null;

            if (rideHistoryJson.getOrderList().size() > 0) {
                order_id = rideHistoryJson.getOrderList().get(0).getId();
                ride_fare = rideHistoryJson.getOrderList().get(0).getPrice();
                payment_method = rideHistoryJson.getOrderList().get(0).getPaymentMethod();
                ride_type = rideHistoryJson.getOrderList().get(0).getRideEconomy();
                ride_duration = rideHistoryJson.getOrderList().get(0).getDuration();
            }


            dataObject = new DataObject()
                    .setCode(rideHistoryJson.getCode())
                    .setMessage(rideHistoryJson.getMessage())
                    .setOrder_id(order_id)
                    .setRide_fare(ride_fare)
                    .setRide_payment(payment_method)
                    .setRide_type(ride_type)
                    .setRide_duration(ride_duration);

        }
        else if (requestObject.getConnection() == Constant.CONNECTION.CAPTAIN_STATISTICS) {

            ArrayList<DataObject> statisticsList = new ArrayList<>();
            CaptainStatisticsJson captainStatisticsJson = (CaptainStatisticsJson) data;
            int total_earning = 0;
            String currency_symbol = null;

            double total_distance = 0.0;
            String distance_symbol = null;

            int total_minutes = 0;
            double captain_earning = 0;
            double company_taxes = 0;
            double company_percentage = 0;


            for (int i = 0; i < captainStatisticsJson.getStatistics().size(); i++) {

                Statistic statistic = captainStatisticsJson.getStatistics().get(i);
                statisticsList.add(new DataObject()
                        .setTrip_day_name(statistic.getDayName())
                        .setTrip_date_no(statistic.getDateNo())
                        .setTrip_earning(statistic.getCurrencySymbol() + " " + statistic.getTotalEarning())
                );

                total_earning += Integer.parseInt(statistic.getTotalEarning());
                currency_symbol = statistic.getCurrencySymbol();

                total_distance += Double.parseDouble(statistic.getTotalDistance());
                distance_symbol = statistic.getDistanceSymbol();

                total_minutes += Integer.parseInt(statistic.getTotalDuration());
                company_percentage = Double.parseDouble(statistic.getCompanyPercentage());

            }

            company_taxes = (total_earning * company_percentage) / 100;
            captain_earning = total_earning - company_taxes;

            Utility.Logger(TAG, "Captain Earning = " + captain_earning + " Comapny Taxes = " + company_taxes);


            dataObject = new DataObject()
                    .setCode(captainStatisticsJson.getCode())
                    .setMessage(captainStatisticsJson.getMessage())
                    .setTotal_earning(currency_symbol + " " + total_earning)
                    .setTotal_distance(total_distance + " " + distance_symbol)
                    .setTotal_duration(Utility.convertMinutesIntoDateFormat(total_minutes))
                    .setTotal_trip(captainStatisticsJson.getStatistics().size() + " Trips")
                    .setTrip_your_earning(currency_symbol + " " + captain_earning)
                    .setTrip_taxes(currency_symbol + " " + company_taxes)
                    .setObjectArrayList(statisticsList);

        }
        else if (requestObject.getConnection() == Constant.CONNECTION.UPDATE) {

            GeneralResponse userJson = (GeneralResponse) data;
            dataObject = new DataObject()
                    .setCode(userJson.getCode())
                    .setMessage(userJson.getMessage());


        }
        else if (requestObject.getConnection() == Constant.CONNECTION.LIST_OF_CITY) {

            //region Country List

            ArrayList<DataObject> listOfCountryArraylist = new ArrayList<>();
            ListOfCountryJson listOfCountryJson = (ListOfCountryJson) data;

            /*List of City */

            for (int i = 0; i < listOfCountryJson.getCountryList().size(); i++) {

                CountryList countryList = listOfCountryJson.getCountryList().get(i);
                listOfCountryArraylist.add(new DataObject()
                        .setCountry_id(countryList.getId())
                        .setCountry_name(countryList.getName())
                        .setLocation_label(countryList.getName())
                        .setDataType(Constant.DATA_TYPE.LABEL_VIEW));

                for (int j = 0; j < countryList.getCityList().size(); j++) {

                    CityList cityList = countryList.getCityList().get(j);
                    listOfCountryArraylist.add(new DataObject()
                            .setCity_id(cityList.getId())
                            .setCountry_name(countryList.getName())
                            .setCity_name(cityList.getName())
                            .setCity_latitude(cityList.getLatitude())
                            .setCity_longitude(cityList.getLongitude())
                            .setDataType(Constant.DATA_TYPE.CITY_VIEW));

                }

            }


            //endregion

            dataObject = new DataObject()
                    .setCode(listOfCountryJson.getCode())
                    .setMessage(listOfCountryJson.getMessage())
                    .setObjectArrayList(listOfCountryArraylist);


        }
        else if (requestObject.getConnection() == Constant.CONNECTION.LIST_OF_RIDE_CATEGORY) {

            //region Country List

            ArrayList<DataObject> listOfCountryArraylist = new ArrayList<>();
            ListOfCountryJson listOfCountryJson = (ListOfCountryJson) data;

            /*List of City */

            for (int i = 0; i < listOfCountryJson.getCountryList().size(); i++) {

                CountryList countryList = listOfCountryJson.getCountryList().get(i);
                listOfCountryArraylist.add(new DataObject()
                        .setCar_category_id(countryList.getId())
                        .setCar_category_name(countryList.getName())
                        .setDataType(Constant.DATA_TYPE.RIDE_TYPE));


            }


            //endregion

            dataObject = new DataObject()
                    .setCode(listOfCountryJson.getCode())
                    .setMessage(listOfCountryJson.getMessage())
                    .setObjectArrayList(listOfCountryArraylist);


        }
        else if (requestObject.getConnection() == Constant.CONNECTION.LIST_OF_RIDE_CATEGORY_TYPE) {

            //region Ride Category Type

            ArrayList<DataObject> listOfCountryArraylist = new ArrayList<>();
            RideCategoryTypeJson rideCategoryTypeJson = (RideCategoryTypeJson) data;

            /*List of Ride Category Type */

            for (int i = 0; i < rideCategoryTypeJson.getCountryList().size(); i++) {

                com.haris.kareem_driver.JsonUtil.RideCategoryTypeJson.CountryList
                        countryList = rideCategoryTypeJson.getCountryList().get(i);

                listOfCountryArraylist.add(new DataObject()
                        .setCar_category_id(countryList.getId())
                        .setCar_category_name(countryList.getName())
                        .setRide_type_tagline(countryList.getTagline())
                        .setPicture(countryList.getPicture())
                        .setDataType(Constant.DATA_TYPE.RIDE_CATEGORY_TYPE));


            }


            //endregion

            dataObject = new DataObject()
                    .setCode(rideCategoryTypeJson.getCode())
                    .setMessage(rideCategoryTypeJson.getMessage())
                    .setObjectArrayList(listOfCountryArraylist);


        }
        else if (requestObject.getConnection() == Constant.CONNECTION.CALCULATE_WAITING_CHARGES) {

            //region Ride Category Type

            ArrayList<DataObject> listOfCountryArraylist = new ArrayList<>();
            WaitingChargesJson waitingChargesJson = (WaitingChargesJson) data;

            //endregion

            dataObject = new DataObject()
                    .setCode(waitingChargesJson.getCode())
                    .setMessage(waitingChargesJson.getMessage())
                    .setWaiting_charges(waitingChargesJson.getWaiting_fee())
                    .setPayment_type(waitingChargesJson.getPayment_type());


        }

        return dataObject;

    }


    @Override
    public String toString() {
        return "DataObject{" +
                "code='" + code + '\'' +
                ", message='" + message + '\'' +
                ", user_id='" + user_id + '\'' +
                ", user_fName='" + user_fName + '\'' +
                ", user_lName='" + user_lName + '\'' +
                ", user_password='" + user_password + '\'' +
                ", login_type='" + login_type + '\'' +
                ", user_picture='" + user_picture + '\'' +
                ", user_phone='" + user_phone + '\'' +
                ", user_email='" + user_email + '\'' +
                ", user_sign_in='" + user_sign_in + '\'' +
                ", user_remember='" + user_remember + '\'' +
                ", userFavourite=" + userFavourite +
                ", user_payment_type='" + user_payment_type + '\'' +
                ", object_id='" + object_id + '\'' +
                ", object_name='" + object_name + '\'' +
                ", object_Description='" + object_Description + '\'' +
                ", object_category_name='" + object_category_name + '\'' +
                ", object_min_delivery_time='" + object_min_delivery_time + '\'' +
                ", object_min_order_price='" + object_min_order_price + '\'' +
                ", object_delivery_charges='" + object_delivery_charges + '\'' +
                ", object_expense='" + object_expense + '\'' +
                ", object_rating='" + object_rating + '\'' +
                ", object_no_of_rating='" + object_no_of_rating + '\'' +
                ", object_currency='" + object_currency + '\'' +
                ", object_currency_symbol='" + object_currency_symbol + '\'' +
                ", object_status='" + object_status + '\'' +
                ", object_latitude='" + object_latitude + '\'' +
                ", object_longitude='" + object_longitude + '\'' +
                ", object_address='" + object_address + '\'' +
                ", object_picture='" + object_picture + '\'' +
                ", object_logo='" + object_logo + '\'' +
                ", object_distance='" + object_distance + '\'' +
                ", object_tags='" + object_tags + '\'' +
                ", object_date_created='" + object_date_created + '\'' +
                ", paymentType='" + paymentType + '\'' +
                ", is_layout_01=" + is_layout_01 +
                ", dataType=" + dataType +
                ", objectArrayList=" + objectArrayList +
                ", homeList=" + homeList +
                ", favourite_id='" + favourite_id + '\'' +
                ", isFavourite=" + isFavourite +
                ", cart_id='" + cart_id + '\'' +
                ", chatting='" + chatting + '\'' +
                ", picture='" + picture + '\'' +
                ", date='" + date + '\'' +
                ", time='" + time + '\'' +
                ", isFrom=" + isFrom +
                ", isLongTap=" + isLongTap +
                ", isFirstItem=" + isFirstItem +
                ", isAlreadyAddedIntoCart=" + isAlreadyAddedIntoCart +
                ", isPaymentCardSelected=" + isPaymentCardSelected +
                ", noOfItemInCart='" + noOfItemInCart + '\'' +
                ", basePrice='" + basePrice + '\'' +
                '}';
    }

    public DataObject() {
    }


    @Override
    public int describeContents() {
        return 0;
    }

    @Override
    public void writeToParcel(Parcel dest, int flags) {
        dest.writeString(this.code);
        dest.writeString(this.message);
        dest.writeString(this.waiting_charges);
        dest.writeString(this.payment_type);
        dest.writeString(this.user_id);
        dest.writeString(this.user_fName);
        dest.writeString(this.user_lName);
        dest.writeString(this.user_password);
        dest.writeString(this.login_type);
        dest.writeString(this.user_picture);
        dest.writeString(this.user_phone);
        dest.writeString(this.device_token);
        dest.writeString(this.user_email);
        dest.writeString(this.user_sign_in);
        dest.writeString(this.user_remember);
        dest.writeTypedList(this.userFavourite);
        dest.writeString(this.user_payment_type);
        dest.writeString(this.status_id);
        dest.writeString(this.order_id);
        dest.writeString(this.ride_fare);
        dest.writeString(this.ride_type);
        dest.writeString(this.ride_type_tagline);
        dest.writeString(this.ride_payment);
        dest.writeString(this.ride_duration);
        dest.writeString(this.total_trip);
        dest.writeString(this.total_duration);
        dest.writeString(this.total_distance);
        dest.writeString(this.total_earning);
        dest.writeString(this.trip_earning);
        dest.writeString(this.trip_your_earning);
        dest.writeString(this.trip_taxes);
        dest.writeString(this.trip_day_name);
        dest.writeString(this.trip_date_no);
        dest.writeString(this.location_label);
        dest.writeString(this.city_name);
        dest.writeString(this.location_name);
        dest.writeString(this.location_Tagline);
        dest.writeDouble(this.location_latitude);
        dest.writeDouble(this.location_longitude);
        dest.writeByte(this.locationSelected ? (byte) 1 : (byte) 0);
        dest.writeString(this.country_id);
        dest.writeString(this.country_name);
        dest.writeString(this.city_id);
        dest.writeString(this.city_latitude);
        dest.writeString(this.city_longitude);
        dest.writeString(this.car_category_id);
        dest.writeString(this.car_category_name);
        dest.writeString(this.object_id);
        dest.writeString(this.object_name);
        dest.writeString(this.object_Description);
        dest.writeString(this.object_category_name);
        dest.writeString(this.object_min_delivery_time);
        dest.writeString(this.object_min_order_price);
        dest.writeString(this.object_delivery_charges);
        dest.writeString(this.object_expense);
        dest.writeString(this.object_rating);
        dest.writeString(this.object_no_of_rating);
        dest.writeString(this.object_currency);
        dest.writeString(this.object_currency_symbol);
        dest.writeString(this.object_status);
        dest.writeString(this.object_latitude);
        dest.writeString(this.object_longitude);
        dest.writeString(this.object_address);
        dest.writeString(this.object_picture);
        dest.writeString(this.object_logo);
        dest.writeString(this.object_distance);
        dest.writeString(this.object_tags);
        dest.writeString(this.object_date_created);
        dest.writeString(this.paymentType);
        dest.writeByte(this.is_layout_01 ? (byte) 1 : (byte) 0);
        dest.writeInt(this.dataType == null ? -1 : this.dataType.ordinal());
        dest.writeTypedList(this.objectArrayList);
        dest.writeList(this.homeList);
        dest.writeString(this.favourite_id);
        dest.writeByte(this.isFavourite ? (byte) 1 : (byte) 0);
        dest.writeString(this.cart_id);
        dest.writeString(this.chatting);
        dest.writeString(this.picture);
        dest.writeString(this.date);
        dest.writeString(this.time);
        dest.writeByte(this.isFrom ? (byte) 1 : (byte) 0);
        dest.writeByte(this.isLongTap ? (byte) 1 : (byte) 0);
        dest.writeByte(this.isFirstItem ? (byte) 1 : (byte) 0);
        dest.writeByte(this.isAlreadyAddedIntoCart ? (byte) 1 : (byte) 0);
        dest.writeByte(this.isPaymentCardSelected ? (byte) 1 : (byte) 0);
        dest.writeString(this.noOfItemInCart);
        dest.writeString(this.basePrice);
        dest.writeString(this.rider_id);
        dest.writeString(this.customer_name);
        dest.writeString(this.customer_picture);
        dest.writeString(this.document_id);
        dest.writeString(this.rider_document_id);
        dest.writeString(this.rider_document);
        dest.writeString(this.document_status);
        dest.writeString(this.account_holder_id);
        dest.writeString(this.account_holder_name);
        dest.writeString(this.account_no_id);
        dest.writeString(this.account_no);
        dest.writeString(this.bank_no_id);
        dest.writeString(this.bank_no);
        dest.writeString(this.bank_transist_id);
        dest.writeString(this.bank_transist_no);
        dest.writeString(this.order_restaurant_name);
        dest.writeString(this.order_delivery_date);
        dest.writeString(this.order_delivery_time);
        dest.writeString(this.order_price);
        dest.writeString(this.delivery_time);
        dest.writeString(this.order_status);
        dest.writeDouble(this.rider_latitude);
        dest.writeDouble(this.rider_longitude);
        dest.writeString(this.buildingName);
        dest.writeString(this.streetAddressName);
        dest.writeString(this.areaName);
        dest.writeString(this.unitName);
        dest.writeString(this.riderNote);
    }

    protected DataObject(Parcel in) {
        this.code = in.readString();
        this.message = in.readString();
        this.waiting_charges = in.readString();
        this.payment_type = in.readString();
        this.user_id = in.readString();
        this.user_fName = in.readString();
        this.user_lName = in.readString();
        this.user_password = in.readString();
        this.login_type = in.readString();
        this.user_picture = in.readString();
        this.user_phone = in.readString();
        this.device_token = in.readString();
        this.user_email = in.readString();
        this.user_sign_in = in.readString();
        this.user_remember = in.readString();
        this.userFavourite = in.createTypedArrayList(FavouriteList.CREATOR);
        this.user_payment_type = in.readString();
        this.status_id = in.readString();
        this.order_id = in.readString();
        this.ride_fare = in.readString();
        this.ride_type = in.readString();
        this.ride_type_tagline = in.readString();
        this.ride_payment = in.readString();
        this.ride_duration = in.readString();
        this.total_trip = in.readString();
        this.total_duration = in.readString();
        this.total_distance = in.readString();
        this.total_earning = in.readString();
        this.trip_earning = in.readString();
        this.trip_your_earning = in.readString();
        this.trip_taxes = in.readString();
        this.trip_day_name = in.readString();
        this.trip_date_no = in.readString();
        this.location_label = in.readString();
        this.city_name = in.readString();
        this.location_name = in.readString();
        this.location_Tagline = in.readString();
        this.location_latitude = in.readDouble();
        this.location_longitude = in.readDouble();
        this.locationSelected = in.readByte() != 0;
        this.country_id = in.readString();
        this.country_name = in.readString();
        this.city_id = in.readString();
        this.city_latitude = in.readString();
        this.city_longitude = in.readString();
        this.car_category_id = in.readString();
        this.car_category_name = in.readString();
        this.object_id = in.readString();
        this.object_name = in.readString();
        this.object_Description = in.readString();
        this.object_category_name = in.readString();
        this.object_min_delivery_time = in.readString();
        this.object_min_order_price = in.readString();
        this.object_delivery_charges = in.readString();
        this.object_expense = in.readString();
        this.object_rating = in.readString();
        this.object_no_of_rating = in.readString();
        this.object_currency = in.readString();
        this.object_currency_symbol = in.readString();
        this.object_status = in.readString();
        this.object_latitude = in.readString();
        this.object_longitude = in.readString();
        this.object_address = in.readString();
        this.object_picture = in.readString();
        this.object_logo = in.readString();
        this.object_distance = in.readString();
        this.object_tags = in.readString();
        this.object_date_created = in.readString();
        this.paymentType = in.readString();
        this.is_layout_01 = in.readByte() != 0;
        int tmpDataType = in.readInt();
        this.dataType = tmpDataType == -1 ? null : Constant.DATA_TYPE.values()[tmpDataType];
        this.objectArrayList = in.createTypedArrayList(DataObject.CREATOR);
        this.homeList = new ArrayList<Object>();
        in.readList(this.homeList, Object.class.getClassLoader());
        this.favourite_id = in.readString();
        this.isFavourite = in.readByte() != 0;
        this.cart_id = in.readString();
        this.chatting = in.readString();
        this.picture = in.readString();
        this.date = in.readString();
        this.time = in.readString();
        this.isFrom = in.readByte() != 0;
        this.isLongTap = in.readByte() != 0;
        this.isFirstItem = in.readByte() != 0;
        this.isAlreadyAddedIntoCart = in.readByte() != 0;
        this.isPaymentCardSelected = in.readByte() != 0;
        this.noOfItemInCart = in.readString();
        this.basePrice = in.readString();
        this.rider_id = in.readString();
        this.customer_name = in.readString();
        this.customer_picture = in.readString();
        this.document_id = in.readString();
        this.rider_document_id = in.readString();
        this.rider_document = in.readString();
        this.document_status = in.readString();
        this.account_holder_id = in.readString();
        this.account_holder_name = in.readString();
        this.account_no_id = in.readString();
        this.account_no = in.readString();
        this.bank_no_id = in.readString();
        this.bank_no = in.readString();
        this.bank_transist_id = in.readString();
        this.bank_transist_no = in.readString();
        this.order_restaurant_name = in.readString();
        this.order_delivery_date = in.readString();
        this.order_delivery_time = in.readString();
        this.order_price = in.readString();
        this.delivery_time = in.readString();
        this.order_status = in.readString();
        this.rider_latitude = in.readDouble();
        this.rider_longitude = in.readDouble();
        this.buildingName = in.readString();
        this.streetAddressName = in.readString();
        this.areaName = in.readString();
        this.unitName = in.readString();
        this.riderNote = in.readString();
    }

    public static final Creator<DataObject> CREATOR = new Creator<DataObject>() {
        @Override
        public DataObject createFromParcel(Parcel source) {
            return new DataObject(source);
        }

        @Override
        public DataObject[] newArray(int size) {
            return new DataObject[size];
        }
    };
}
