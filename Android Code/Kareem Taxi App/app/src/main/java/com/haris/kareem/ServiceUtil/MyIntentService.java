package com.haris.kareem.ServiceUtil;

import android.app.IntentService;
import android.content.Intent;

import com.google.gson.Gson;
import com.haris.kareem.ConnectionUtil.Connection;
import com.haris.kareem.ConstantUtil.Constant;
import com.haris.kareem.ObjectUtil.DataObject;
import com.haris.kareem.ObjectUtil.GlobalDataObject;
import com.haris.kareem.ObjectUtil.RequestObject;
import com.haris.kareem.Utility.Utility;

import java.util.ArrayList;


/**
 * An {@link IntentService} subclass for handling asynchronous task requests in
 * a service on a separate handler thread.
 * <p>
 * TODO: Customize class - update intent actions and extra parameters.
 */
public class MyIntentService extends IntentService {
    private String TAG = MyIntentService.class.getName();

    public MyIntentService() {
        super("MyIntentService");
    }

    @Override
    protected void onHandleIntent(Intent intent) {

        Utility.Logger(TAG, "Setting : Working");

        if (intent != null) {


            //It load specific tags wallpaper at background
            //After loading it would add them into Wallpaper db

            RequestObject requestObject = GlobalDataObject.getRequestObject() != null ? GlobalDataObject.getRequestObject()
                    : (RequestObject) intent.getParcelableExtra(Constant.IntentKey.REQUEST_OBJECT);

            String result = Connection.makeRequest(requestObject.getServerUrl(), requestObject.getJson(), requestObject.getRequestType());


            Utility.Logger(TAG, "JSON = " + requestObject.getJson());

            GlobalDataObject.requestObject = null;

            if (Utility.isEmptyString(result))
                return;

            if (result.equalsIgnoreCase(Constant.ImportantMessages.CONNECTION_ERROR))
                return;

            Gson gson = new Gson();
            Object object = null;
            DataObject dataObject = null;
            ArrayList<Object> objectList = new ArrayList<>();



            if (dataObject == null)
                return;


        }
    }


}
