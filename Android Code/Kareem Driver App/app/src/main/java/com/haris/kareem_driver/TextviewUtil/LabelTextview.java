package com.haris.kareem_driver.TextviewUtil;

import android.content.Context;
import androidx.appcompat.widget.AppCompatTextView;
import android.util.AttributeSet;

import com.haris.kareem_driver.FontUtil.Font;

/**
 * Created by hp on 5/20/2018.
 */

public class LabelTextview extends AppCompatTextView {
    public LabelTextview(Context context) {
        super(context);
        setFont(context);
    }

    public LabelTextview(Context context, AttributeSet attrs) {
        super(context, attrs);
        setFont(context);
    }

    public LabelTextview(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        setFont(context);
    }

    private void setFont(Context context) {
        setTypeface(Font.ubuntu_medium_font(context));
    }
}

