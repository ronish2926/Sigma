package com.haris.kareem.EditTextUtil;

import android.content.Context;
import android.util.AttributeSet;

import com.haris.kareem.FontUtil.Font;

public class UbuntuRegularEditText extends androidx.appcompat.widget.AppCompatEditText {
    public UbuntuRegularEditText(Context context) {
        super(context);
        setFont(context);
    }

    public UbuntuRegularEditText(Context context, AttributeSet attrs) {
        super(context, attrs);
        setFont(context);
    }

    public UbuntuRegularEditText(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        setFont(context);
    }

    private void setFont(Context context) {
        setTypeface(Font.ubuntu_regular_font(context));
    }
}

