package com.haris.kareem;

import android.app.Application;
import android.content.Context;
import android.content.pm.PackageInfo;
import android.content.pm.PackageManager;
import android.content.pm.Signature;
import androidx.multidex.MultiDex;
import android.util.Base64;

import com.downloader.PRDownloader;
import com.downloader.PRDownloaderConfig;
import com.facebook.FacebookSdk;
import com.facebook.appevents.AppEventsLogger;
import com.haris.kareem.ConstantUtil.Constant;
import com.haris.kareem.Utility.Utility;
import com.mapbox.mapboxsdk.Mapbox;
import com.onesignal.OneSignal;
import com.stripe.android.Stripe;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;


public class MyApplication extends Application {

    private static MyApplication mInstance;
    Context context;
    public static Stripe stripe;


    public MyApplication() {
        mInstance = this;
    }

    public MyApplication(Context context) {
        this.context = context;
    }

    @Override
    public void onCreate() {
        super.onCreate();


        Thread.setDefaultUncaughtExceptionHandler(new ThreadHandeling());
        PrintKeyHash();

        FacebookSdk.sdkInitialize(getApplicationContext());
        AppEventsLogger.activateApp(this);
        Mapbox.getInstance(getApplicationContext(), Constant.Credentials.MAPBOX_API_KEY);

        //===========Init. OneSignal

        OneSignal.initWithContext(this);
        OneSignal.setAppId(BuildConfig.ONE_SIGNAL_APP_ID);

        //===========Get User Android Id

        Constant.Credentials.DEVICE_TOKEN = OneSignal.getDeviceState().getUserId();

        PRDownloaderConfig config = PRDownloaderConfig.newBuilder()
                .setDatabaseEnabled(true)
                .setReadTimeout(30000)
                .setConnectTimeout(30000)
                .build();
        PRDownloader.initialize(getApplicationContext(), config);
        //PRDownloader.cleanUp(25);

        mInstance = this;


    }

    @Override
    protected void attachBaseContext(Context base) {
        super.attachBaseContext(base);
        MultiDex.install(this);
    }

    public static synchronized MyApplication getInstance() {
        return mInstance;
    }


    public void PrintKeyHash() {

        if (!Constant.Credentials.isFacebookHashKeyRequired) {
            return;
        }

        Utility.LoggerForImportantMessages("Hash", "Generating for fb.....");

        try {
            PackageInfo info = getPackageManager().getPackageInfo(getPackageName(), PackageManager.GET_SIGNATURES);
            for (Signature signature : info.signatures) {
                MessageDigest md = MessageDigest.getInstance("SHA");
                md.update(signature.toByteArray());
                Utility.LoggerForImportantMessages("Hashkey", Base64.encodeToString(md.digest(), Base64.DEFAULT));

            }
        } catch (PackageManager.NameNotFoundException e) {
            e.printStackTrace();
        } catch (NoSuchAlgorithmException e) {
            e.printStackTrace();
        }
    }

    public static Stripe getStripe() {
        stripe = new Stripe(getInstance(), Constant.Credentials.STRIPE_KEY);
        return stripe;
    }
}

