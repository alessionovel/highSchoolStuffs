package com.example.progetto4_database;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.ImageView;
import com.squareup.picasso.Callback;
import com.squareup.picasso.Picasso;

public class SecondActivity extends AppCompatActivity {

    ImageView immagine;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);

        immagine = (ImageView) findViewById(R.id.img1);

        Picasso.get().load(Globals.immagini.get(Globals.ind)).into(immagine, new Callback() {
            @Override
            public void onSuccess() {
            }

            @Override
            public void onError(Exception e) {
                System.out.println(e.getMessage().toString());
            }
        });
    }
}
