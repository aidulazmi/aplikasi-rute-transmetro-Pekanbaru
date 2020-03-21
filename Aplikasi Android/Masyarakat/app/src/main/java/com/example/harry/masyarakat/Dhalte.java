package com.example.harry.masyarakat;
import com.android.volley.Request;
import com.android.volley.toolbox.StringRequest;
import android.app.AlertDialog;
import android.Manifest;
import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Criteria;
import android.location.Location;
import android.location.LocationListener;
import android.location.LocationManager;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v4.app.ActivityCompat;
import android.support.v4.widget.SwipeRefreshLayout;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListView;
import android.widget.Toast;
import android.net.Uri;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.VolleyLog;
import com.android.volley.toolbox.JsonArrayRequest;
import java.util.HashMap;



import com.example.harry.masyarakat.adapter.CustomListAdapter;
import com.example.harry.masyarakat.app.AppController;
import com.example.harry.masyarakat.module.Jarak;
import java.util.Map;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;


public class Dhalte  extends AppCompatActivity implements LocationListener,
        SwipeRefreshLayout.OnRefreshListener {

    private BottomNavigationView.OnNavigationItemSelectedListener mOnNavigationItemSelectedListener
            = new BottomNavigationView.OnNavigationItemSelectedListener() {

        @Override
        public boolean onNavigationItemSelected(@NonNull MenuItem item) {
            switch (item.getItemId()) {
                case R.id.navigation_home:
                    Intent intent = new Intent(Dhalte.this,Home.class);
                    startActivity(intent);
                    return true;

            }
            return false;
        }
    };
    String tag_json_obj = "json_obj_req";
    String goolgeMap = "com.google.android.apps.maps"; // identitas package aplikasi google masps android
    Uri gmmIntentUri;
    Intent mapIntent;
    private static final String TAG_SUCCESS = "success";
    SwipeRefreshLayout swipe;
    ListView list;
    int success;
    CustomListAdapter adapter;
    List<Jarak> itemList = new ArrayList<>();
    Double latitude, longitude;
    Criteria criteria;
    Location location;
    LocationManager locationManager;
    String provider;
    AlertDialog.Builder dialog;

    private static String url_halte 	     = "http://192.168.43.51/Abusway/Masyarakat/halteselect.php";
    private static final String TAG = Dhalte.class.getSimpleName();
    public static final String TAG_ID       = "nama_halte";
    public static final String TAG_latitute     = "latitute";
    public static final String TAG_long   = "longtitude";
    /* 10.0.2.2 adalah IP Address localhost EMULATOR ANDROID STUDIO,
    Ganti IP Address tersebut dengan IP Laptop Apabila di RUN di HP. HP dan Laptop harus 1 jaringan */
    private static final String url = "http://192.168.43.51/abusway/Masyarakat/jarak.php?latitute=";
    private static final String TAG_MESSAGE = "message";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dhalte);
        BottomNavigationView navigation = (BottomNavigationView) findViewById(R.id.navigation);
        navigation.setOnNavigationItemSelectedListener(mOnNavigationItemSelectedListener);

        // menyamakan variabel pada layout dan java
        list = (ListView) findViewById(R.id.list);
        swipe = (SwipeRefreshLayout) findViewById(R.id.swipe);

        // mengisi data dari adapter ke listview
        adapter = new CustomListAdapter(this, itemList);
        list.setAdapter(adapter);

        locationManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);
        criteria = new Criteria();

        provider = locationManager.getBestProvider(criteria, false);

        swipe.setOnRefreshListener(this);

        swipe.post(new Runnable() {
                       @Override
                       public void run() {
                           lokasi();
                       }
                   }
        );

          list.setOnItemClickListener(new AdapterView.OnItemClickListener() {
              @Override
              public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                  final String idx = itemList.get(position).getNama();
                    showhalte(idx);
              }
          });
    }


    @Override
    public void onRefresh() {
        lokasi();
    }

    // fungsi ngecek lokasi GPS device pengguna
    private void lokasi() {
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return;
        }
        location = locationManager.getLastKnownLocation(provider);
        if (ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) !=
                PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this,
                Manifest.permission.ACCESS_COARSE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            // TODO: Consider calling
            //    ActivityCompat#requestPermissions
            // here to request the missing permissions, and then overriding
            //   public void onRequestPermissionsResult(int requestCode, String[] permissions,
            //                                          int[] grantResults)
            // to handle the case where the user grants the permission. See the documentation
            // for ActivityCompat#requestPermissions for more details.
            return;
        }

        // permintaan update lokasi device dalam waktu per detik
        locationManager.requestLocationUpdates(provider, 1000, 1, this);

        if (location != null) {
            onLocationChanged(location);
        } else {
            /* latitude longitude Alun-alun Demak sebagai default jika tidak ditemukan lokasi dari device pengguna */
            callListVolley(0.526813, 101.450822);
        }
    }

    // untuk menampilkan lokasi wisata terdekat dari device pengguna
    private void callListVolley(double latitute, double longtitude) {
        itemList.clear();
        adapter.notifyDataSetChanged();

        swipe.setRefreshing(true);

        JsonArrayRequest jArr = new JsonArrayRequest(url + latitute + "&longtitude=" + longtitude,
                new Response.Listener<JSONArray>() {
                    @Override
                    public void onResponse(JSONArray response) {
                        Log.e(TAG, response.toString());

                        // Parsing json
                        for (int i = 0; i < response.length(); i++) {
                            try {

                                JSONObject obj = response.getJSONObject(i);
                                Jarak j = new Jarak();
                                j.setNama(obj.getString("nama_halte"));
                                j.setGambar(obj.getString("foto"));

                                double jarak = Double.parseDouble(obj.getString("jarak"));

                                j.setJarak("" + round(jarak, 2));

                                itemList.add(j);

                            } catch (JSONException e) {
                                e.printStackTrace();
                            }

                        }

                        // memberitahu adapter jika ada perubahan data
                        adapter.notifyDataSetChanged();

                        swipe.setRefreshing(false);
                    }
                }, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                VolleyLog.e(TAG, "Error: " + error.getMessage());
                Toast.makeText(getApplicationContext(), error.getMessage(), Toast.LENGTH_LONG).show();
                swipe.setRefreshing(false);
            }
        });

        // menambah permintaan ke queue
        AppController.getInstance().addToRequestQueue(jArr);
    }

    @Override
    public void onBackPressed() {
        finish();
        System.exit(0);
    }

    // untuk menyederhanakan angka dibelakan koma jarak
    public static double round(double value, int places) {
        if (places < 0) throw new IllegalArgumentException();

        long factor = (long) Math.pow(10, places);
        value = value * factor;
        long tmp = Math.round(value);
        return (double) tmp / factor;
    }

    // untuk menentukan lokasi gps dari device pengguna
    @Override
    public void onLocationChanged(Location location) {
        latitude = location.getLatitude();
        longitude = location.getLongitude();

        // untuk melihat latitude longitude posisi device pengguna pada logcat ditemukan atau tidak
        Log.e(TAG, "User location latitude:" + latitude + ", longitude:" + longitude);

        callListVolley(latitude, longitude);
    }

    @Override
    public void onStatusChanged(String provider, int status, Bundle extras) {

    }

    @Override
    public void onProviderEnabled(String provider) {

    }

    @Override
    public void onProviderDisabled(String provider) {

    }
    private void showhalte(final String idx){
        StringRequest strReq = new StringRequest(Request.Method.POST, url_halte, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                Log.d(TAG, "Response: " + response.toString());

                try {
                    JSONObject jObj = new JSONObject(response);
                    success = jObj.getInt(TAG_SUCCESS);

                    // Cek error node pada json
                    if (success == 1) {
                        Log.d("get edit data", jObj.toString());
                        String nama_halte = jObj.getString(TAG_ID);
                        String lati = jObj.getString(TAG_latitute);
                        String longt = jObj.getString(TAG_long);

                        gmmIntentUri = Uri.parse("google.navigation:q=" + lati+ ","+ longt );

                        // Buat Uri dari intent gmmIntentUri. Set action => ACTION_VIEW
                        mapIntent = new Intent(Intent.ACTION_VIEW, gmmIntentUri);

                        // Set package Google Maps untuk tujuan aplikasi yang di Intent yaitu google maps
                        mapIntent.setPackage(goolgeMap);

                        if (mapIntent.resolveActivity(getPackageManager()) != null) {
                            startActivity(mapIntent);
                        } else {
                            Toast.makeText(Dhalte.this, "Google Maps Belum Terinstal. Install Terlebih dahulu.",
                                    Toast.LENGTH_LONG).show();
                        }

                        adapter.notifyDataSetChanged();

                    } else {
                        Toast.makeText(Dhalte.this, jObj.getString(TAG_MESSAGE), Toast.LENGTH_LONG).show();
                    }
                } catch (JSONException e) {
                    // JSON error
                    e.printStackTrace();
                }


            }

}, new Response.ErrorListener() {

            @Override
            public void onErrorResponse(VolleyError error) {
                Log.e(TAG, "Error: " + error.getMessage());
                Toast.makeText(Dhalte.this, error.getMessage(), Toast.LENGTH_LONG).show();
            }
        }) {

            @Override
            protected Map<String, String> getParams() {
                // Posting parameters ke post url
                Map<String, String> params = new HashMap<String, String>();
                params.put("nama_halte", idx);

                return params;
            }

        };

        AppController.getInstance().addToRequestQueue(strReq, tag_json_obj);
    }

}


