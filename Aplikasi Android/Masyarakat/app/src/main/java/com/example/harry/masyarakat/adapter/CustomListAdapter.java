package com.example.harry.masyarakat.adapter;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.android.volley.toolbox.ImageLoader;
import com.android.volley.toolbox.NetworkImageView;


import java.util.List;
import com.example.harry.masyarakat.R;
import com.example.harry.masyarakat.app.AppController;
import com.example.harry.masyarakat.module.Jarak;


public class CustomListAdapter extends BaseAdapter {
    private Activity activity;
    private LayoutInflater inflater;
    private List<Jarak> jarakItems;
    ImageLoader imageLoader;

    public CustomListAdapter(Activity activity, List<Jarak> jarakItems) {
        this.activity = activity;
        this.jarakItems = jarakItems;
    }

    @Override
    public int getCount() {
        return jarakItems.size();
    }

    @Override
    public Object getItem(int location) {
        return jarakItems.get(location);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        if (inflater == null)
            inflater = (LayoutInflater) activity
                    .getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        if (convertView == null)
            convertView = inflater.inflate(R.layout.card_halte, null);

        if (imageLoader == null)
            imageLoader = AppController.getInstance().getImageLoader();
        @SuppressLint("WrongViewCast") NetworkImageView thumbNail = (NetworkImageView) convertView
                .findViewById(R.id.img_foto);

        TextView nama = (TextView) convertView.findViewById(R.id.txt_nm_halte);

        TextView jarak = (TextView) convertView.findViewById(R.id.jarak);

        Jarak j = jarakItems.get(position);

        thumbNail.setImageUrl(j.getGambar(), imageLoader);
        nama.setText(j.getNama());
        jarak.setText(j.getJarak()+" Km");

        return convertView;
    }
}