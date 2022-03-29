package com.haris.kareem_driver.AdapterUtil;

import java.util.ArrayList;

import android.content.Context;
import android.graphics.Color;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.haris.kareem_driver.ObjectUtil.ObjectiveItem;
import com.haris.kareem_driver.R;


public class SpinnerTypeAdapter extends BaseAdapter {

    private ArrayList<ObjectiveItem> objects = new ArrayList<>();
    private Context context;
    private LayoutInflater layoutInflater;

    public SpinnerTypeAdapter(Context context, ArrayList<ObjectiveItem> objects) {
        this.context = context;
        this.objects = objects;
        this.layoutInflater = LayoutInflater.from(context);
    }

    @Override
    public int getCount() {
        return objects.size();
    }

    @Override
    public Object getItem(int position) {
        return getItemId(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder viewHolder = null;

        if (convertView == null) {
            convertView = layoutInflater.inflate(R.layout.spinner_objective_item_layout, null);
            viewHolder = new ViewHolder(convertView);
            convertView.setTag(viewHolder);
        } else {
            viewHolder = (ViewHolder) convertView.getTag();
        }

        if (objects.get(position).getPicture() != 0)
            viewHolder.imgObjective.setImageResource(objects.get(position).getPicture());

        viewHolder.txtObjective.setText(objects.get(position).getTitle());

        return convertView;
    }

    @Override
    public View getDropDownView(int position, View convertView, ViewGroup parent) {
        View view = super.getDropDownView(position, convertView, parent);

        TextView title = (TextView) view.findViewById(R.id.txt_objective);
        ImageView img = (ImageView) view.findViewById(R.id.img_objective);

        if (position == 0) {
            title.setTextColor(Color.GRAY);
            img.setColorFilter(Color.GRAY);

            //img.setVisibility(View.GONE);
        } else {
            //img.setVisibility(View.VISIBLE);
            img.setColorFilter(null);
            title.setTextColor(context.getResources().getColor(R.color.colorNormal));
        }


        return view;
    }

    protected class ViewHolder {
        private ImageView imgObjective;
        private TextView txtObjective;

        public ViewHolder(View view) {
            imgObjective = (ImageView) view.findViewById(R.id.img_objective);
            txtObjective = (TextView) view.findViewById(R.id.txt_objective);
        }
    }
}
