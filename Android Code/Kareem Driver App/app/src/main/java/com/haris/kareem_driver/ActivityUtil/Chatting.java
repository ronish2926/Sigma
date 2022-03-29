package com.haris.kareem_driver.ActivityUtil;

import android.os.Bundle;
import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;
import android.text.Editable;
import android.text.TextWatcher;
import android.view.KeyEvent;
import android.view.View;
import android.view.inputmethod.EditorInfo;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.google.firebase.database.ChildEventListener;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;
import com.haris.kareem_driver.AdapterUtil.ChattingAdapter;
import com.haris.kareem_driver.ConstantUtil.Constant;
import com.haris.kareem_driver.ManagementUtil.Management;
import com.haris.kareem_driver.ObjectUtil.ChattingObject;
import com.haris.kareem_driver.ObjectUtil.DataObject;
import com.haris.kareem_driver.ObjectUtil.DateTimeObject;
import com.haris.kareem_driver.ObjectUtil.PrefObject;
import com.haris.kareem_driver.ObjectUtil.RiderObject;
import com.haris.kareem_driver.ObjectUtil.TypingObject;
import com.haris.kareem_driver.ObjectUtil.UserObject;
import com.haris.kareem_driver.R;
import com.haris.kareem_driver.Utility.Utility;

import java.util.ArrayList;
import java.util.HashMap;

public class Chatting extends AppCompatActivity implements View.OnClickListener, TextWatcher, TextView.OnEditorActionListener {
    private String TAG = Chatting.class.getName();
    private TextView txtMenu;
    private TextView txtTyping;
    private ImageView imageBack;
    private Management management;
    private PrefObject prefObject;
    public DataObject chattingDetail;
    private UserObject userObject;
    private RiderObject riderObject;
    private RecyclerView recyclerViewChatting;
    private LinearLayoutManager linearLayoutManager;
    private ChattingAdapter chattingAdapter;
    private ArrayList<Object> objectArrayList = new ArrayList<>();
    private HashMap<String, Object> dataHashMap = new HashMap<>();
    private LinearLayout layoutSend;
    private EditText editChat;
    private DatabaseReference chatRef;
    private DatabaseReference statusRef;
    private ChildEventListener chatChildEventListener;
    private ValueEventListener statusEventListener;
    private DatabaseReference rootReference;
    private String orderId;
    private boolean isStartTyping = true;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        Utility.changeAppTheme(this);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chatting);

        getIntentData(); //Retrieve Intent Data
        initUI(); //Initialize UI


    }

    /**
     * <p>It is used to retrieve Intent Data</p>
     */
    private void getIntentData() {
        orderId = getIntent().getStringExtra(Constant.IntentKey.RESTAURANT_DETAIL);
        userObject = getIntent().getParcelableExtra(Constant.IntentKey.USER);
        riderObject = getIntent().getParcelableExtra(Constant.IntentKey.RIDER);
    }


    /**
     * <p>It is used to initialize UI</p>
     */
    private void initUI() {

        management = new Management(this);
        prefObject = management.getPreferences(new PrefObject()
                .setRetrieveUserCredential(true)
                .setRetrieveLogin(true));


        txtMenu = findViewById(R.id.txt_menu);
        txtMenu.setText(Utility.getStringFromRes(this, R.string.chatting));

        imageBack = findViewById(R.id.image_back);
        imageBack.setVisibility(View.VISIBLE);
        imageBack.setImageResource(R.drawable.ic_back);

        layoutSend = findViewById(R.id.layout_send);
        editChat = findViewById(R.id.edit_chat);
        txtTyping = findViewById(R.id.txt_typing);

        linearLayoutManager = new LinearLayoutManager(this, LinearLayoutManager.VERTICAL, false);
        recyclerViewChatting = findViewById(R.id.recycler_view_chatting);
        recyclerViewChatting.setLayoutManager(linearLayoutManager);

        chattingAdapter = new ChattingAdapter(this, objectArrayList);
        recyclerViewChatting.setAdapter(chattingAdapter);

        rootReference = FirebaseDatabase.getInstance().getReference();

        chatRef = rootReference.limitToFirst(100).getRef().child("order").child(orderId).child("userChattingObject");
        chatChildEventListener = new ChildEventListener() {
            @Override
            public void onChildAdded(@NonNull DataSnapshot dataSnapshot, @Nullable String s) {
                ChattingObject chattingObject = dataSnapshot.getValue(ChattingObject.class);
                Utility.Logger(TAG, "Chatting Data = " + chattingObject.toString());


                objectArrayList.add(new DataObject()
                        .setChatting(chattingObject.message)
                        .setFrom(chattingObject.from)
                        .setTime(chattingObject.time)
                        .setPicture(chattingObject.from ? userObject.getUser_picture() : riderObject.getUser_picture())
                        .setDataType(chattingObject.from ? Constant.DATA_TYPE.FROM_CHAT : Constant.DATA_TYPE.TO_CHAT));

                chattingAdapter.notifyDataSetChanged();
                recyclerViewChatting.scrollToPosition((objectArrayList.size() - 1));

                dataSnapshot.child("read").getRef().setValue(false);

            }

            @Override
            public void onChildChanged(@NonNull DataSnapshot dataSnapshot, @Nullable String s) {

            }

            @Override
            public void onChildRemoved(@NonNull DataSnapshot dataSnapshot) {

            }

            @Override
            public void onChildMoved(@NonNull DataSnapshot dataSnapshot, @Nullable String s) {

            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {

            }
        };
        //chatRef.addValueEventListener(chatEventListener);
        chatRef.addChildEventListener(chatChildEventListener);

        statusRef = rootReference.child("order").child(orderId).child("typingObject");
        statusEventListener = new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                Utility.Logger(TAG, "LocationEventListener");
                // This method is called once with the initial value and again
                // whenever data at this location is updated.
                TypingObject value = dataSnapshot.getValue(TypingObject.class);
                if (value.isFrom()) {
                    txtTyping.setText(userObject.getUser_name() + " " + Utility.getStringFromRes(getApplicationContext(), R.string.typing_tagline));
                    txtTyping.setVisibility(View.VISIBLE);
                } else {
                    txtTyping.setVisibility(View.GONE);
                }
                Utility.Logger(TAG, "Status = " + value.toString());

            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {
                // Failed to read value
                Utility.Logger(TAG, "Failed to read value in LocationEvent = " + databaseError.toException());
            }
        };
        statusRef.addValueEventListener(statusEventListener);


        layoutSend.setOnClickListener(this);
        editChat.addTextChangedListener(this);
        editChat.setOnEditorActionListener(this);
        imageBack.setOnClickListener(this);


    }


    @Override
    public void onClick(View v) {
        if (v == imageBack) {
            finish();
        }

        if (v == layoutSend) {

            DateTimeObject dateTimeObject = Utility.parseTimeDate(new DateTimeObject()
                    .setDatetimeType(Constant.DATETIME.BOTH12)
                    .setCurrentDate(true));

            chatRef.push().setValue(new ChattingObject((objectArrayList.size() + 1), editChat.getText().toString(), dateTimeObject.getTime(), dateTimeObject.getDate(), false, true));
            editChat.setText(null);

        }

    }

    @Override
    public void beforeTextChanged(CharSequence s, int start, int count, int after) {

    }

    @Override
    public void onTextChanged(CharSequence s, int start, int before, int count) {
        if (isStartTyping) {
            //statusRef.child("from").setValue(true);
            isStartTyping = false;
        }
    }

    @Override
    public void afterTextChanged(Editable s) {
        ///statusRef.child("from").setValue(false);
        isStartTyping = true;
        if (s.length() > 1)
            statusRef.child("to").setValue(true);
        else
            statusRef.child("to").setValue(false);
    }

    @Override
    public boolean onEditorAction(TextView v, int actionId, KeyEvent event) {
        if (actionId == EditorInfo.IME_ACTION_SEARCH ||
                actionId == EditorInfo.IME_ACTION_DONE ||
                event != null &&
                        event.getAction() == KeyEvent.ACTION_DOWN &&
                        event.getKeyCode() == KeyEvent.KEYCODE_ENTER) {
            if (event == null || !event.isShiftPressed()) {
                // the user is done typing.
                Utility.Logger(TAG, "Finish Typing...");

                return true; // consume.
            }
        }
        return false; // pass on to other listeners.
    }

}
