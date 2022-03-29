package com.haris.kareem_driver.TextviewUtil;

import android.content.Context;
import androidx.appcompat.widget.AppCompatTextView;
import android.util.AttributeSet;

import com.haris.kareem_driver.FontUtil.Font;

/**
 * Created by hp on 5/20/2018.
 */

public class TaglineTextview extends AppCompatTextView {
    public TaglineTextview(Context context) {
        super(context);
        setFont(context);
    }

    public TaglineTextview(Context context, AttributeSet attrs) {
        super(context, attrs);
        setFont(context);
    }

    public TaglineTextview(Context context, AttributeSet attrs, int defStyleAttr) {
        super(context, attrs, defStyleAttr);
        setFont(context);
    }

    private void setFont(Context context) {
        setTypeface(Font.ubuntu_light_font(context));
    }
}
