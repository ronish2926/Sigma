package com.haris.kareem.InterfaceUtil;

import android.net.Uri;

import com.haris.kareem.ObjectUtil.RequestObject;

public interface DatabaseCallback {

    void onSuccess(Uri data, RequestObject requestObject);

    void onError(String data, RequestObject requestObject);

}
