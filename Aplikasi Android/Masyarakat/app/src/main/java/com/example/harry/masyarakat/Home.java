package com.example.harry.masyarakat;

import android.content.DialogInterface;
import android.content.Intent;

import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

import android.view.View;
import android.widget.ImageView;

public class Home extends AppCompatActivity {



    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        ImageView img_halte = (ImageView) findViewById(R.id.img_halte);
        img_halte.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                    Intent intent = new Intent(Home.this,Dhalte.class);
                    startActivity(intent);

            }
        });
        ImageView img_koridor = (ImageView)findViewById(R.id.img_koridor);
        img_koridor.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(Home.this, Koridor.class);
                startActivity(intent);
            }
        });

        ImageView tentang = (ImageView) findViewById(R.id.img_about_us);
       tentang.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
               showtentang();

            }
        });

        ImageView contack = (ImageView) findViewById(R.id.img_contact);
        contack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                showkontak();

            }
        });


    }
    private void showtentang(){
        AlertDialog.Builder alerttentang = new AlertDialog.Builder(this);
        alerttentang.setTitle("Tentang Aplikasi");

        alerttentang
                .setMessage("Sibusway adalah aplikasi pencari rute terdekat transmetro Pekanbaru. By awsystek, dari Universitas islam Sultan Syarif Kasim Riau")
                .setIcon(R.drawable.iconmasyarakat)
                .setCancelable(false)
                .setNegativeButton("OK", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.cancel();
                    }
                });
        AlertDialog alertDialog = alerttentang.create();
        alertDialog.show();
    }
    private void showkontak(){
        AlertDialog.Builder alerttentang = new AlertDialog.Builder(this);
        alerttentang.setTitle("Informasi Kontak");

        alerttentang
                .setMessage("Silahkan Hubungin Dinas Perhubungan Jika terjadi keluhan. \nEmail : dinasperhubungan@riau.go.id \nTelpon : (0761)34245/33992")

                .setIcon(R.drawable.iconmasyarakat)
                .setCancelable(false)
                .setNegativeButton("OK", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        dialog.cancel();
                    }
                });
        AlertDialog alertDialog = alerttentang.create();
        alertDialog.show();
    }
}
