package com.haris.kareem_driver.InterfaceUtil;

import android.net.Uri;

import com.haris.kareem_driver.ObjectUtil.RequestObject;

public interface DatabaseCallback {

    void onSuccess(Uri data, RequestObject requestObject);

    void onError(String data, RequestObject requestObject);

}
