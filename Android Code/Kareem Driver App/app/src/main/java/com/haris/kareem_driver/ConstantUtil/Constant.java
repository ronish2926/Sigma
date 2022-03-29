package com.haris.kareem_driver.ConstantUtil;


import com.google.android.gms.maps.model.LatLng;
import com.haris.kareem_driver.BuildConfig;


public class Constant {

    public static LatLng baseLatLng;

    public static enum DB {RETRIEVE, INSERT, DELETE, UPDATE, SPECIFIC_ID, SPECIFIC_TYPE, DELETE_SPECIFIC_TYPE, INSERTION_ID}

    public static enum CONNECTION {
       CURRENT_RIDES,ACCEPT_REJECT_RIDE,CAPTAIN_STATISTICS,UPDATE, RIDER_DOCUMENT, RIDER_ADD_DOCUMENT,
        ENABLE_DISABLE_RIDER,DELETE_DOCUMENT,RIDER_BANK_DETAIL,RIDER_CURRENT_ORDER,LIST_OF_CITY,LIST_OF_RIDE_CATEGORY,
        CAPTAIN_TRACKING,LOGIN, SIGN_UP, FORGOT,ORDER_STATUS,PRIVACY_POLICY,LIST_OF_RIDE_CATEGORY_TYPE,
        CALCULATE_WAITING_CHARGES , WAITING_CHARGES_NOTIFICATION
    }

    public static enum CONNECTION_TYPE {BACKGROUND, UI, DOWNLOAD, STATUS}

    public static enum DATA_TYPE {
        ARTIST, COMMON, POPULAR, PRODUCT, CATEGORIES, FEED, FEATURED, TOP_BRANDS, NEAREST, HEADING_BAR, REVIEW, HISTORY, CATEGORY_BY_COLOR, CATEGORY_BY_NAME, ARTIST_HEADER, COURSE_SELECTOR, DURATION, SERVING,
        FROM_CHAT, TO_CHAT, CURRENT_ORDER, HISTORY_ORDER

        ,CITY_VIEW,LABEL_VIEW,RIDE_TYPE,RIDE_CATEGORY_TYPE
    }

    public static enum TYPE {FAVOURITES, CART, INSERTION_ID}

    public static enum DATETIME {DATE, TIME, HOUR24, HOUR12, BOTH12, BOTH24, DATE_DD_MM_YYYY_hh_mm_ss, LONG}

    public static enum REQUEST {
        GET, POST
    }


    /**
     * <p>It contain all Server Url</p>
     */
    public static class ServerInformation {
        public static String GOOGLE_DRIVE_LINK = "https://docs.google.com/uc?id=";
        public static String PRIVACY_URL = "https://docs.google.com/document/d/";

        static String BASE_URL = BuildConfig.BASE_URL;
        static String FOLDER = "/kareem_taxi_app/";
        public static String REST_API_URL = BASE_URL + FOLDER + "kareem_taxi_home.php";
        public static String PICTURE_URL = BASE_URL + FOLDER + "admin/uploads/image/";


    }


    /**
     * <p>It contain all of the Credentials </p>
     */
    public static class Credentials {

        public static String MAP_BOX_API_KEY = BuildConfig.MAPBOX_ACCESS_KEY;
        public static boolean isFacebookHashKeyRequired = true;
        public static String DEVICE_TOKEN;

    }


    /**
     * <p>It contain all of the Important Messages</p>
     */
    public static class ImportantMessages {
        public static final String CONNECTION_ERROR = "Connection Error";

    }


    /**
     * <p>It contain all of the App Configuration</p>
     */
    public static class AppConfiguration {
        public static String DEFAULT_RADIUS = "25";
    }


    /**
     * <p>It contain all of the Key of Share Preferences</p>
     */
    public static class SharedPref {
        public static String PREF_TAGS = "TAGS";
        public static String NEXT_URL = "NEXT_URL";
        public static String POSITION = "POSITION";
        public static String FIRST_LAUNCH = "FIRST_LAUNCH";
        public static String LOGIN = "LOGIN";
        public static String USER_ID = "USER_ID";
        public static String USER_REMEMBER = "USER_REMEMBER";
        public static String USER_EMAIL = "USER_EMAIL";
        public static String USER_PASSWORD = "USER_PASSWORD";
        public static String USER_FIRST_NAME = "USER_FIRST_NAME";
        public static String USER_LAST_NAME = "USER_LAST_NAME";
        public static String USER_PICTURE = "USER_PICTURE";
        public static String NEWS_FEED = "NEWS_FEED";
        public static String NIGHT_MODE = "NIGHT_MODE";
        public static String DOWNLOAD_WIFI = "DOWNLOAD_WIFI";
        public static String PUSH_NOTIFICATION = "PUSH_NOTIFICATION";
        public static String LOGIN_TYPE = "LOGIN_TYPE";
        public static String BIO_TYPE = "BIO_TYPE";
        public static String UID = "UID";
        public static String ARTIST_ID = "ARTIST_ID";

        public final static String DEFAULT_PICTURE = "default_picture";
        public static String USER_PHONE = "USER_PHONE";
        public static String RIDER_STATUS = "RIDER_STATUS";
        public static String ORDER_ID = "ORDER_ID";
    }


    /**
     * <p>It contain all of the Request Code</p>
     */
    public static class RequestCode {
        public static int PERMISSION_REQUEST_CODE = 1;
        public static int REQUEST_CODE_GALLERY = 2;
        public static int REQUEST_CODE_CAMERA = 3;
        public static int GOOGLE_SIGN_IN_CODE = 4;
        public static int REQ_CODE_SPEECH_INPUT = 5;
        public static int PRODUCT_DETAIL_CODE = 6;
        public static int COUPON_CODE = 7;
        public static int REQUEST_CODE_PICTURE = 8;
        public static int REQUEST_LOCATION = 9;
        public static int SEARCH_SPECIFIC_PLACE = 10;
        public static int REQUEST_CODE_SELECT_LOCATION = 11;
        public static int REQUEST_CODE_SELECT_CITY = 12;
        public static int REQUEST_CODE_SELECT_CAR_TYPE = 13;
        public static int REQUEST_CODE_SELECT_CAR_CATEGORY = 14;
    }


    /**
     * <p>It contain all of the Key of Intent Sharing</p>
     */
    public static class IntentKey {
        public static String REQUEST_OBJECT = "REQUEST_OBJECT";
        public static String CATEGORY = "CATEGORY";
        public static String CATEGORY_ID = "CATEGORY_ID";
        public static String FUNCTIONALITY = "FUNCTIONALITY";
        public static String POST_TYPE = "POST_TYPE";
        public static String POST_ID = "POST_ID";
        public static String FILE_PATH = "FILE_PATH";
        public static String ARTIST_ID = "ARTIST_ID";
        public static String ARTIST_NAME = "ARTIST_NAME";
        public static String PLAYLIST = "PLAYLIST";
        public static String PLAYLIST_ID = "PLAYLIST_ID";
        public static String PLAYLIST_NAME = "PLAYLIST_NAME";
        public static String CONNECTION = "CONNECTION";
        public static String ARTIST_WORK = "ARTIST_WORK";
        public static String ARTIST_DETAIL = "ARTIST_DETAIL";
        public static String POST_DETAIL = "POST_DETAIL";
        public static String RESTAURANT_DETAIL = "RESTAURANT_DETAIL";
        public static String VIDEO_URL = "VIDEO_URL";
        public static String BOOK_TYPE = "BOOK_TYPE";
        public static String ON_BOARD = "ON_BOARD";
        public static String LOGIN_REQUIRED = "LOGIN_REQUIRED";
        public static String CONTINUE_REQUIRED = "CONTINUE_REQUIRED";
        public static String BACK_ACTION = "BACK_ACTION";
        public static String RECIPE_FRAGMENT_DETAIL = "RECIPE_FRAGMENT_DETAIL";
        public static String RECIPE_DETAIL = "RECIPE_DETAIL";
        public static String SEARCH_KEYWORD = "SEARCH_KEYWORD";
        public static String FEATURED_ID = "FEATURED_ID";
        public static String FEATURED_PLACE = "FEATURED_PLACE";
        public static String FILTER = "FILTER";
        public static String COUPON_DETAIL = "COUPON_DETAIL";
        public static String ORDER_DETAIL = "ORDER_DETAIL";
        public static String CHATTING = "CHATTING";
        public static String USER = "USER";
        public static String RIDER = "RIDER";
        public static String TRIP_PRICE="TRIP_PRICE";
        public static String COMPANY_PERCENTAGE = "COMPANY_PERCENTAGE";
        public static String LOCATION_DETAIL = "LOCATION_DETAIL";
        public static String WAITING_CHARGES="WAITING_CHARGES";
    }


    /**
     * <p>It contain al lof the database columns</p>
     */
    public static class DatabaseColumn {
        public static final String TAG = "Database";

        public static String FAVOURITES_TABLE_NAME = "Favourites";
        public static String FAVOURITES_COLUMN_ID = "id";
        public static String FAVOURITES_COLUMN_USER_ID = "user_id";
        public static String FAVOURITES_COLUMN_RESTAURANT_ID = "restaurant_id";

        public static String CART_TABLE_NAME = "Cart";
        public static String CART_COLUMN_ID = "id";
        public static String CART_COLUMN_USER_ID = "user_id";
        public static String CART_COLUMN_RESTAURANT_ID = "restaurant_id";
        public static String CART_COLUMN_RESTAURANT_LATITUDE = "restaurant_latitude";
        public static String CART_COLUMN_RESTAURANT_LONGITUDE = "restaurant_longitude";
        public static String CART_COLUMN_DELIVERY_CHARGES = "delivery_charges";
        public static String CART_COLUMN_DELIVERY_TIME = "delivery_time";
        public static String CART_COLUMN_PAYMENT_TYPE = "payment_type";
        public static String CART_COLUMN_PRODUCT_ID = "product_id";
        public static String CART_COLUMN_PRODUCT_NAME = "product_name";
        public static String CART_COLUMN_PRODUCT_QUANTITY = "product_quantity";
        public static String CART_COLUMN_PRODUCT_BASE_PRICE = "product_base_price";
        public static String CART_COLUMN_PRODUCT_PRICE = "product_price";
        public static String CART_COLUMN_CURRENCY_SYMBOL = "currency_symbol";
        public static String CART_COLUMN_PRODUCT_ATTRIBUTE = "product_attribute";
        public static String CART_COLUMN_SPECIAL_INSTRUCTIONS = "product_special_instructions";

    }


    /**
     * <p>It contain list of Time & Date Formats</p>
     */
    public static class TimeDateFormat {
        public static String timeDateFormat24 = "dd/MM/yyyy hh:mm";
        public static String dateFormat24 = "dd MMM yyyy";
        public static String timeFormat24 = "hh:mm";

        public static String timeDateFormat12 = "yyyy-MM-dd hh:mm:ss";
        public static String dateFormat12 = "dd MMM yyyy";
        public static String timeFormat12 = "hh:mm a";

        public static String hourFormat = "hh a";
        public static String dayFormat = "E , MMMM dd";
        public static String internationalTimeFormat = "hh:mm";
    }


    /**
     * <p>It contain all of error code which may come from Server Request</p>
     */
    public static class ErrorCodes {
        public static String success_code = "202";
        public static String error_code = "206";
    }


    public static class PostType {
        public static String AUTHOR_TYPE = "author";
        public static String CATEGORY_TYPE = "category";
        public static String POST_TYPE = "restaurant";
        public static String REFER_USER = "refer";
        public static String STANDARD_POST = "standard";
        public static String SERVER_VIDEO = "file";
        public static String URL_VIDEO = "youtube";
    }


    public static LatLng getBaseLatLng() {
        return baseLatLng;
    }

    public static void setBaseLatLng(LatLng baseLatLng) {
        Constant.baseLatLng = baseLatLng;
    }
}
