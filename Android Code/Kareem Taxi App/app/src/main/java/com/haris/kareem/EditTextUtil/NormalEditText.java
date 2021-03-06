package com.haris.kareem.EditTextUtil;

import android.content.Context;
import android.util.AttributeSet;

import com.haris.kareem.FontUtil.Font;

public class NormalEditText extends androidx.appcompat.widget.AppCompatEditText {
    public NormalEditText(Context context) {
        super(context);
        setFont(context);
    }

    public NormalEditText(Context context, AttributeSet attrs) {
        super(context, attrs);
        setFont(context);
    }

    public NormalEditText(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        setFont(context);
    }

    private void setFont(Context context) {
        setTypeface(Font.ubuntu_regular_font(context));
    }
}

