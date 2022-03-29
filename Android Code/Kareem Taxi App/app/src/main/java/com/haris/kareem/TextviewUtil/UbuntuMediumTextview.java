package com.haris.kareem.TextviewUtil;

import android.content.Context;
import androidx.appcompat.widget.AppCompatTextView;
import android.util.AttributeSet;

import com.haris.kareem.FontUtil.Font;

/**
 * Created by hp on 5/20/2018.
 */

public class UbuntuMediumTextview extends AppCompatTextView {
    public UbuntuMediumTextview(Context context) {
        super(context);
        setFont(context);
    }

    public UbuntuMediumTextview(Context context, AttributeSet attrs) {
        super(context, attrs);
        setFont(context);
    }

    public UbuntuMediumTextview(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        setFont(context);
    }

    private void setFont(Context context) {
        setTypeface(Font.ubuntu_medium_font(context));
    }
}

