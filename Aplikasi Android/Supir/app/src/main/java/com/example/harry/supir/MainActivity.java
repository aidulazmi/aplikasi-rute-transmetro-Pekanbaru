package com.example.harry.supir;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import org.w3c.dom.Text;

public class MainActivity extends AppCompatActivity {

    Button btn_logout;
    TextView txt_id, txt_username, txt_username1, txt_email, txt_email1, txt_nm_lengkap, txt_alamat, txt_no_hp, txt_nama_koridor, txt_platn, txt_tujuan, txt_idrute;
    String id, username, username1, email, email1, nm_lengkap, alamat, no_hp, nama_koridor, platn, tujuan,idrute;
    SharedPreferences sharedpreferences;

    public static final String TAG_ID = "id_driver";
    public static final String TAG_USERNAME = "Username";
    public static final String TAG_EMAIL = "email";
    public static final String TAG_NM_LENGKAP = "nm_lengkap";
    public static final String TAG_ALAMAT = "alamat";
    public static final String TAG_NO_HP = "no_hp";
    public static final String TAG_NM_KORIDOR = "nama_koridor";
    public static final String TAG_PLATN = "platn";
    public static final String TAG_TUJUAN = "Tujuan";
    public static final String TAG_idrute = "id_rute";


    private BottomNavigationView.OnNavigationItemSelectedListener mOnNavigationItemSelectedListener
            = new BottomNavigationView.OnNavigationItemSelectedListener() {

        @Override
        public boolean onNavigationItemSelected(@NonNull MenuItem item) {
            switch (item.getItemId()) {
                case R.id.navigation_profil:

                    return true;
                case R.id.navigation_rute:
                    Intent q= new Intent(MainActivity.this, MapsActivity.class);
                    q.putExtra(TAG_idrute, txt_idrute.getText().toString());
                    startActivity(q);
                    return true;
                case R.id.navigation_logout:
                    SharedPreferences.Editor editor = sharedpreferences.edit();
                    editor.putBoolean(Login.session_status, false);
                    editor.putString(TAG_ID, null);
                    editor.putString(TAG_USERNAME, null);
                    editor.putString(TAG_EMAIL, null);
                    editor.putString(TAG_NM_LENGKAP, null);
                    editor.putString(TAG_ALAMAT, null);
                    editor.putString(TAG_NO_HP, null);
                    editor.putString(TAG_NM_KORIDOR, null);
                    editor.putString(TAG_PLATN, null);

                    editor.commit();

                    Intent intent = new Intent(MainActivity.this, Login.class);
                    finish();
                    startActivity(intent);


                    return true;
            }
            return false;
        }
    };



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.navigation);
        navigation.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);



        txt_id = (TextView) findViewById(R.id.txt_id);
        txt_username = (TextView) findViewById(R.id.txt_username);
        txt_email = (TextView) findViewById(R.id.txt_email);
        txt_nm_lengkap = (TextView) findViewById(R.id.txt_nm_lengkap);
        txt_alamat = (TextView)  findViewById(R.id.txt_alamat);
        txt_no_hp = (TextView) findViewById(R.id.txt_no_hp);
        txt_nama_koridor = (TextView) findViewById(R.id.txt_nm_koridor);
        txt_platn = (TextView) findViewById(R.id.txt_platn);
        txt_tujuan = (TextView) findViewById(R.id.txt_tujuan);
        txt_idrute = (TextView) findViewById(R.id.id_rute) ;
        txt_username1 = (TextView) findViewById(R.id.txt_username1);
        txt_email1 = (TextView) findViewById(R.id.txt_email1);
        btn_logout = (Button) findViewById(R.id.btn_logout);

        sharedpreferences = getSharedPreferences(Login.my_shared_preferences, Context.MODE_PRIVATE);

        id = getIntent().getStringExtra(TAG_ID);
        username = getIntent().getStringExtra(TAG_USERNAME);
        username1 = getIntent().getStringExtra(TAG_USERNAME);
        email = getIntent().getStringExtra(TAG_EMAIL);
        email1 = getIntent().getStringExtra(TAG_EMAIL);
        nm_lengkap = getIntent().getStringExtra(TAG_NM_LENGKAP);
        alamat= getIntent().getStringExtra(TAG_ALAMAT);
        no_hp = getIntent().getStringExtra(TAG_NO_HP);
        nama_koridor = getIntent().getStringExtra(TAG_NM_KORIDOR);
        platn = getIntent().getStringExtra(TAG_PLATN);
        tujuan = getIntent().getStringExtra(TAG_TUJUAN);
        idrute = getIntent().getStringExtra(TAG_idrute);

        txt_id.setText(id);
        txt_username.setText(username);
        txt_username1.setText(username);
        txt_email.setText(email);
        txt_email1.setText(email);
        txt_nm_lengkap.setText(nm_lengkap);
        txt_alamat.setText(alamat);
        txt_no_hp.setText(no_hp);
        txt_nama_koridor.setText(nama_koridor);
        txt_platn.setText(platn);
        txt_tujuan.setText(tujuan);
        txt_idrute.setText(idrute);
        btn_logout.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                // TODO Auto-generated method stub
                // update login session ke FALSE dan mengosongkan nilai id dan username
                SharedPreferences.Editor editor = sharedpreferences.edit();
                editor.putBoolean(Login.session_status, false);
                editor.putString(TAG_ID, null);
                editor.putString(TAG_USERNAME, null);
                editor.putString(TAG_EMAIL, null);
                editor.putString(TAG_NM_LENGKAP, null);
                editor.putString(TAG_ALAMAT, null);
                editor.putString(TAG_NO_HP, null);
                editor.putString(TAG_NM_KORIDOR, null);
                editor.putString(TAG_PLATN, null);

                editor.commit();

                Intent intent = new Intent(MainActivity.this, Login.class);
                finish();
                startActivity(intent);
            }
        });

    }
}
