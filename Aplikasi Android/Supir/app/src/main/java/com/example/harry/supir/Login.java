package com.example.harry.supir;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.ConnectivityManager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import com.example.harry.supir.app.AppController;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;


public class Login extends AppCompatActivity {

    ProgressDialog pDialog;
    Button  btn_login;
    EditText txt_username, txt_password, txt_email, txt_nm_lengkap, txt_alamat, txt_no_hp, txt_nama_koridor, txt_platn;
    Intent intent;

    int success;
    ConnectivityManager conMgr;

    private String url = Server.URL + "login.php";

    private static final String TAG = Login.class.getSimpleName();

    private static final String TAG_SUCCESS = "success";
    private static final String TAG_MESSAGE = "message";

    public final static String TAG_USERNAME = "Username";
    public final static String TAG_ID = "id_driver";
    public static final String TAG_EMAIL = "email";
    public static final String TAG_NM_LENGKAP = "nm_lengkap";
    public static final String TAG_ALAMAT = "alamat";
    public static final String TAG_NO_HP = "no_hp";
    public static final String TAG_NM_KORIDOR = "nama_koridor";
    public static final String TAG_PLATN = "platn";
    public static final String TAG_TUJUAN = "Tujuan";
    public static final String TAG_id_rute="id_rute";

    String tag_json_obj = "json_obj_req";

    SharedPreferences sharedpreferences;
    Boolean session = false;
    String id, username , email, nm_lengkap, alamat, no_hp, nama_koridor, platn, tujuan,id_rute;
    public static final String my_shared_preferences = "my_shared_preferences";
    public static final String session_status = "session_status";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.login);

        conMgr = (ConnectivityManager) getSystemService(Context.CONNECTIVITY_SERVICE);
        {
            if (conMgr.getActiveNetworkInfo() != null
                    && conMgr.getActiveNetworkInfo().isAvailable()
                    && conMgr.getActiveNetworkInfo().isConnected()) {
            } else {
                Toast.makeText(getApplicationContext(), "No Internet Connection",
                        Toast.LENGTH_LONG).show();
            }
        }

        btn_login = (Button) findViewById(R.id.btn_login);
        txt_username = (EditText) findViewById(R.id.txt_username);
        txt_password = (EditText) findViewById(R.id.txt_password);

        // Cek session login jika TRUE maka langsung buka MainActivity
        sharedpreferences = getSharedPreferences(my_shared_preferences, Context.MODE_PRIVATE);
        session = sharedpreferences.getBoolean(session_status, false);
        id = sharedpreferences.getString(TAG_ID, null);
        username = sharedpreferences.getString(TAG_USERNAME, null);
        email = sharedpreferences.getString(TAG_EMAIL, null);
        nm_lengkap = sharedpreferences.getString(TAG_NM_LENGKAP, null);
        alamat = sharedpreferences.getString(TAG_ALAMAT, null);
        no_hp = sharedpreferences.getString(TAG_NO_HP, null);
        nama_koridor = sharedpreferences.getString(TAG_NM_KORIDOR, null);
        platn = sharedpreferences.getString(TAG_PLATN, null);
        tujuan = sharedpreferences.getString(TAG_TUJUAN, null);
        id_rute = sharedpreferences.getString(TAG_id_rute, null);

        if (session) {
            Intent intent = new Intent(Login.this, MainActivity.class);
            intent.putExtra(TAG_ID, id);
            intent.putExtra(TAG_USERNAME, username);
            intent.putExtra(TAG_EMAIL, email);
            intent.putExtra(TAG_NM_LENGKAP, nm_lengkap);
            intent.putExtra(TAG_ALAMAT, alamat);
            intent.putExtra(TAG_NO_HP, no_hp);
            intent.putExtra(TAG_NM_KORIDOR, nama_koridor);
            intent.putExtra(TAG_PLATN, platn);
            intent.putExtra(TAG_TUJUAN, tujuan);
            intent.putExtra(TAG_id_rute,id_rute);
            finish();
            startActivity(intent);
        }


        btn_login.setOnClickListener(new View.OnClickListener() {

            @Override
            public void onClick(View v) {
                // TODO Auto-generated method stub
                String username = txt_username.getText().toString();
                String password = txt_password.getText().toString();

                // mengecek kolom yang kosong
                if (username.trim().length() > 0 && password.trim().length() > 0) {
                    if (conMgr.getActiveNetworkInfo() != null
                            && conMgr.getActiveNetworkInfo().isAvailable()
                            && conMgr.getActiveNetworkInfo().isConnected()) {
                        checkLogin(username, password);
                    } else {
                        Toast.makeText(getApplicationContext() ,"No Internet Connection", Toast.LENGTH_LONG).show();
                    }
                } else {
                    // Prompt user to enter credentials
                    Toast.makeText(getApplicationContext() ,"Kolom tidak boleh kosong", Toast.LENGTH_LONG).show();
                }
            }
        });


    }

    private void checkLogin(final String username, final String password) {
        pDialog = new ProgressDialog(this);
        pDialog.setCancelable(false);
        pDialog.setMessage("Logging in ...");
        showDialog();

        StringRequest strReq = new StringRequest(Request.Method.POST, url, new Response.Listener<String>() {

            @Override
            public void onResponse(String response) {
                Log.e(TAG, "Login Response: " + response.toString());
                hideDialog();

                try {
                    JSONObject jObj = new JSONObject(response);
                    success = jObj.getInt(TAG_SUCCESS);

                    // Check for error node in json
                    if (success == 1) {
                        String username = jObj.getString(TAG_USERNAME);
                        String id = jObj.getString(TAG_ID);
                        String email = jObj.getString(TAG_EMAIL);
                        String nm_lengkap = jObj.getString(TAG_NM_LENGKAP);
                        String alamat = jObj.getString(TAG_ALAMAT);
                        String no_hp = jObj.getString(TAG_NO_HP);
                        String nama_koridor = jObj.getString(TAG_NM_KORIDOR);
                        String platn = jObj.getString(TAG_PLATN);
                        String tujuan = jObj.getString(TAG_TUJUAN);
                        String id_rute = jObj.getString(TAG_id_rute);

                        Log.e("Successfully Login!", jObj.toString());

                        Toast.makeText(getApplicationContext(), jObj.getString(TAG_MESSAGE), Toast.LENGTH_LONG).show();


                        // menyimpan login ke session
                        SharedPreferences.Editor editor = sharedpreferences.edit();
                        editor.putBoolean(session_status, true);
                        editor.putString(TAG_ID, id);
                        editor.putString(TAG_USERNAME, username);
                        editor.putString(TAG_EMAIL, email);
                        editor.putString(TAG_NM_LENGKAP, nm_lengkap);
                        editor.putString(TAG_ALAMAT, alamat);
                        editor.putString(TAG_NO_HP, no_hp);
                        editor.putString(TAG_NM_KORIDOR, nama_koridor);
                        editor.putString(TAG_PLATN, platn);
                        editor.putString(TAG_TUJUAN, tujuan);
                        editor.putString(TAG_id_rute, id_rute);

                        editor.commit();

                        // Memanggil main activity
                        Intent intent = new Intent(Login.this, MainActivity.class);
                        intent.putExtra(TAG_ID, id);
                        intent.putExtra(TAG_USERNAME, username);
                        intent.putExtra(TAG_EMAIL, email);
                        intent.putExtra(TAG_NM_LENGKAP, nm_lengkap);
                        intent.putExtra(TAG_ALAMAT, alamat);
                        intent.putExtra(TAG_NO_HP, no_hp);
                        intent.putExtra(TAG_NM_KORIDOR, nama_koridor);
                        intent.putExtra(TAG_PLATN, platn);
                        intent.putExtra(TAG_TUJUAN, tujuan);
                        intent.putExtra(TAG_id_rute, id_rute);
                        finish();
                        startActivity(intent);
                    } else {
                        Toast.makeText(getApplicationContext(),
                                jObj.getString(TAG_MESSAGE), Toast.LENGTH_LONG).show();

                    }
                } catch (JSONException e) {
                    // JSON error
                    e.printStackTrace();
                }

            }
        }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Login Error: " + error.getMessage());
                Toast.makeText(getApplicationContext(),
                        error.getMessage(), Toast.LENGTH_LONG).show();

                hideDialog();

            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // Posting parameters to login url
                Map<String, String> params = new HashMap<String, String>();
                params.put("Username", username);
                params.put("password", password);

                return params;
            }

        };

        // Adding request to request queue
        AppController.getInstance().addToRequestQueue(strReq, tag_json_obj);
    }

    private void showDialog() {
        if (!pDialog.isShowing())
            pDialog.show();
    }

    private void hideDialog() {
        if (pDialog.isShowing())
            pDialog.dismiss();
    }
}
