package com.haris.kareem_driver.FragmentUtil;

import android.os.Bundle;
import androidx.fragment.app.Fragment;
import androidx.appcompat.widget.AppCompatSpinner;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ImageView;
import android.widget.TextView;

import com.haris.kareem_driver.AdapterUtil.SpinnerTypeAdapter;
import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.InterfaceUtil.ConnectionCallback;
import com.haris.kareem_driver.ManagementUtil.Management;
import com.haris.kareem_driver.ObjectUtil.DataObject;
import com.haris.kareem_driver.ObjectUtil.ObjectiveItem;
import com.haris.kareem_driver.ObjectUtil.PrefObject;
import com.haris.kareem_driver.ObjectUtil.ProgressObject;
import com.haris.kareem_driver.ObjectUtil.RequestObject;
import com.haris.kareem_driver.R;
import com.haris.kareem_driver.Utility.Utility;

import org.json.JSONException;
import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;

import me.ithebk.barchart.BarChart;
import me.ithebk.barchart.BarChartModel;


public class OrderHistory extends Fragment implements ConnectionCallback, View.OnClickListener, AdapterView.OnItemSelectedListener {
    private String TAG = CurrentOrder.class.getSimpleName();
    private Management management;
    private ArrayList<Object> objectArrayList = new ArrayList<>();
    private ArrayList<ObjectiveItem> objectiveItemList = new ArrayList<>();
    private PrefObject prefObject;
    private ImageView imageBack;
    private ImageView imageNext;
    private TextView txtCalendar;
    private TextView txtEarning;
    private TextView txtTotalTrip;
    private TextView txtTotalDuration;
    private TextView txtTotalDistance;
    private TextView txtTotalEarning;
    private TextView txtYourEarning;
    private TextView txtTaxes;
    private BarChart barChart;
    private String fromDate, toDate;
    private Calendar cl;
    private String weeklyDate;
    private int week_of_year = 0;
    private AppCompatSpinner spinnerType;
    private SpinnerTypeAdapter spinnerAdapter;
    private boolean weeklyAnalyticsSchedule = true;


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        return inflater.inflate(R.layout.activity_earning, null);
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        initUI(view); //Initialize UI

    }


    /**
     * <p>It initialize the UI</p>
     */
    private void initUI(View view) {

        management = new Management(getActivity());
        prefObject = management.getPreferences(new PrefObject()
                .setRetrieveUserCredential(true));

        imageBack = (ImageView) view.findViewById(R.id.image_back);
        imageNext = (ImageView) view.findViewById(R.id.image_next);

        txtCalendar = (TextView) view.findViewById(R.id.txt_calendar);
        txtEarning = (TextView) view.findViewById(R.id.txt_earning);

        txtTotalTrip = (TextView) view.findViewById(R.id.txt_total_trip);
        txtTotalDuration = (TextView) view.findViewById(R.id.txt_total_duration);
        txtTotalDistance = (TextView) view.findViewById(R.id.txt_total_distance);
        txtTotalEarning = (TextView) view.findViewById(R.id.txt_total_earning);
        txtYourEarning = (TextView) view.findViewById(R.id.txt_your_earning);
        txtTaxes = (TextView) view.findViewById(R.id.txt_taxes);
        barChart = (BarChart) view.findViewById(R.id.bar_chart_vertical);

        objectiveItemList.add(new ObjectiveItem(Utility.getStringFromRes(getActivity(), R.string.select_statistics_type), 0));
        objectiveItemList.add(new ObjectiveItem(Utility.getStringFromRes(getActivity(), R.string.weekly_statistics), 0));
        objectiveItemList.add(new ObjectiveItem(Utility.getStringFromRes(getActivity(), R.string.monthly_statistics), 0));

        spinnerType = view.findViewById(R.id.spinner_type);
        spinnerAdapter = new SpinnerTypeAdapter(getActivity(), objectiveItemList);
        spinnerType.setAdapter(spinnerAdapter);


        cl = Calendar.getInstance();
        cl.setTime(new Date());

        spinnerType.setSelection(1);


        imageBack.setOnClickListener(this);
        imageNext.setOnClickListener(this);
        spinnerType.setOnItemSelectedListener(this);

    }


    /**
     * <p>It is used to send request to Server</p>
     */
    private void sendRequestToServer(String startDate, String endDate) {

        management.sendRequestToServer(new RequestObject()
                .setContext(getActivity())
                .setJson(getJson(prefObject.getUserId(), startDate, endDate))
                .setConnection(Constant.CONNECTION.CAPTAIN_STATISTICS)
                .setConnectionType(Constant.CONNECTION_TYPE.UI)
                .setConnectionCallback(this));


    }


    /**
     * <p> It is used to convert Object
     * into Json</p>
     *
     * @param
     * @return
     */
    private String getJson(String rider_id, String from_date, String to_date) {
        String json = null;

        // 1. build jsonObject
        JSONObject jsonObject = new JSONObject();
        try {

            jsonObject.accumulate("functionality", "retrieve_captain_analytics");
            jsonObject.accumulate("captain_id", rider_id);
            jsonObject.accumulate("from_date", from_date);
            jsonObject.accumulate("to_date", to_date);


        } catch (JSONException e) {
            e.printStackTrace();
        }

        // 2. convert JSONObject to JSON to String
        json = jsonObject.toString();
        Utility.Logger(TAG, "JSON " + json);

        return json;
    }


    @Override
    public void onSuccess(Object data, RequestObject requestObject) {
        if (data != null && requestObject != null) {

            DataObject dtObject = (DataObject) data;

            txtEarning.setText(dtObject.getTotal_earning());
            txtTotalTrip.setText(dtObject.getTotal_trip());
            txtTotalDuration.setText(dtObject.getTotal_duration());
            txtTotalDistance.setText(dtObject.getTotal_distance());
            txtTotalEarning.setText(dtObject.getTotal_earning());
            txtYourEarning.setText(dtObject.getTrip_your_earning());
            txtTaxes.setText(dtObject.getTrip_taxes());
            barChart.setBarMaxValue(Integer.parseInt(Utility.extractNumericDataFromString(dtObject.getTotal_earning())));

            for (int i = 0; i < dtObject.getObjectArrayList().size(); i++) {

                DataObject statisticsObject = dtObject.getObjectArrayList().get(i);
                BarChartModel barChartModel = new BarChartModel();
                barChartModel.setBarValue(
                        Integer.parseInt(Utility.extractNumericDataFromString(statisticsObject.getTrip_earning()
                        )));
                barChartModel.setBarColor(Utility.getColourFromRes(getActivity(), R.color.colorMenuBackgroundDay));
                barChartModel.setBarTag(null); //You can set your own tag to bar model
                barChartModel.setBarText(statisticsObject.getTrip_earning());
                barChartModel.setBarXValue(
                        weeklyAnalyticsSchedule ?
                                statisticsObject.getTrip_day_name() :
                                statisticsObject.getTrip_date_no()
                );

                barChart.addBar(barChartModel);

            }

        }
    }

    @Override
    public void onError(String data, RequestObject requestObject) {

        txtEarning.setText("0");
        txtTotalTrip.setText("0");
        txtTotalDuration.setText("0");
        txtTotalDistance.setText("0");
        txtTotalEarning.setText("0");
        txtYourEarning.setText("0");
        txtTaxes.setText("0");
        barChart.clearAll();

    }

    @Override
    public void onResume() {
        super.onResume();

        objectArrayList.clear();
        objectArrayList.add(new ProgressObject());
        ////orderAdapter.notifyDataSetChanged();

        ///sendRequestToServer();  //Send Request to Server

    }

    @Override
    public void onClick(View v) {
        if (v == imageNext) {

            week_of_year++;
            getDateOfWeek();
            sendRequestToServer(fromDate, toDate);

        }
        if (v == imageBack) {
            if (week_of_year > 0) {
                week_of_year--;
                getDateOfWeek();
                sendRequestToServer(fromDate, toDate);
            }
        }
    }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        if (position == 0)
            return;

        if (position == 1) {
            weeklyAnalyticsSchedule = true;

            week_of_year = cl.get(Calendar.WEEK_OF_YEAR);
            getDateOfWeek();  //Retrieve Date of Weeks
            sendRequestToServer(fromDate, toDate);

        } else if (position == 2) {
            weeklyAnalyticsSchedule = false;
            week_of_year = cl.get(Calendar.MONTH);
            getDateOfWeek();  //Retrieve Date of Weeks
            sendRequestToServer(fromDate, toDate);
        }
    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }

    private String getStartEndOFWeek(int enterWeek, int enterYear, boolean isFrom, boolean onlyDateRequired) {

        String result;

        Calendar calendar = Calendar.getInstance();
        calendar.clear();
        calendar.set(Calendar.WEEK_OF_YEAR, enterWeek);
        calendar.set(Calendar.YEAR, enterYear);

        SimpleDateFormat formatter = null;

        if (onlyDateRequired) {

            formatter = new SimpleDateFormat("dd MMM"); // PST`

            Date startDate = calendar.getTime();
            result = formatter.format(startDate) + " - ";
            //Utility.Logger(TAG, "...date..." + result);

            calendar.add(Calendar.DATE, 6);
            Date enddate = calendar.getTime();
            result += formatter.format(enddate);
            ///Utility.Logger(TAG,"...date..." + result);

        } else {

            formatter = new SimpleDateFormat("yyyy-MM-dd"); // PST`

            if (isFrom) {

                Date startDate = calendar.getTime();
                result = formatter.format(startDate);
                Utility.Logger(TAG, "...date..." + result);

            } else {

                calendar.add(Calendar.DATE, 6);
                Date enddate = calendar.getTime();
                result = formatter.format(enddate);
                Utility.Logger(TAG, "...date..." + result);

            }

        }


        return result;


    }

    private String getStartEndOFMonth(int enterMonth, int enterYear, boolean isFrom, boolean onlyDateRequired) {

        String result;

        Calendar calendar = Calendar.getInstance();
        calendar.clear();
        calendar.set(Calendar.MONTH, enterMonth);
        calendar.set(Calendar.YEAR, enterYear);

        SimpleDateFormat formatter = null;

        if (onlyDateRequired) {

            formatter = new SimpleDateFormat("dd MMM"); // PST`

            Date startDate = calendar.getTime();
            result = formatter.format(startDate) + " - ";
            //Utility.Logger(TAG, "...date..." + result);

            calendar.add(Calendar.MONTH, 1);
            calendar.set(Calendar.DAY_OF_MONTH, 1);
            calendar.add(Calendar.DATE, -1);

            Date enddate = calendar.getTime();
            result += formatter.format(enddate);
            ///Utility.Logger(TAG,"...date..." + result);

        } else {

            formatter = new SimpleDateFormat("yyyy-MM-dd"); // PST`

            if (isFrom) {

                Date startDate = calendar.getTime();
                result = formatter.format(startDate);
                Utility.Logger(TAG, "...date..." + result);

            } else {

                calendar.add(Calendar.MONTH, 1);
                calendar.set(Calendar.DAY_OF_MONTH, 1);
                calendar.add(Calendar.DATE, -1);
                Date enddate = calendar.getTime();
                result = formatter.format(enddate);
                Utility.Logger(TAG, "...date..." + result);

            }

        }


        return result;


    }

    private void getDateOfWeek() {

        if (weeklyAnalyticsSchedule) {

            fromDate = getStartEndOFWeek(week_of_year, cl.get(Calendar.YEAR), true, false);
            toDate = getStartEndOFWeek(week_of_year, cl.get(Calendar.YEAR), false, false);

            weeklyDate = getStartEndOFWeek(week_of_year, cl.get(Calendar.YEAR), true, true);
            txtCalendar.setText(weeklyDate);

        } else {

            fromDate = getStartEndOFMonth(week_of_year, cl.get(Calendar.YEAR), true, false);
            toDate = getStartEndOFMonth(week_of_year, cl.get(Calendar.YEAR), false, false);

            weeklyDate = getStartEndOFMonth(week_of_year, cl.get(Calendar.YEAR), true, true);
            txtCalendar.setText(weeklyDate);


        }


    }

}