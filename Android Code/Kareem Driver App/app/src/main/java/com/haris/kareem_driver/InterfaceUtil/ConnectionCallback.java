package com.haris.kareem_driver.InterfaceUtil;

import com.haris.kareem_driver.ObjectUtil.RequestObject;

public interface ConnectionCallback {

    void onSuccess(Object data, RequestObject requestObject);

    void onError(String data, RequestObject requestObject);


}
