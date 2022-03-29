package com.haris.kareem_driver.EditTextUtil;

import android.content.Context;
import android.util.AttributeSet;

import com.haris.kareem_driver.FontUtil.Font;

public class RalewayRegularEditText extends androidx.appcompat.widget.AppCompatEditText {
    public RalewayRegularEditText(Context context) {
        super(context);
        setFont(context);
    }

    public RalewayRegularEditText(Context context, AttributeSet attrs) {
        super(context, attrs);
        setFont(context);
    }

    public RalewayRegularEditText(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        setFont(context);
    }

    private void setFont(Context context) {
        setTypeface(Font.raleway_regular_font(context));
    }
}

