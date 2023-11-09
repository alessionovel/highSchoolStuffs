package com.volta.quartae2020;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.media.Image;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Callback;
import com.squareup.picasso.Picasso;

public class MainActivity extends AppCompatActivity {


    Button btnMio;
    TextView testo;
    ImageButton immagine;
    ImageView cane;

    EditText input;

    int contatore = 0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btnMio = (Button) findViewById(R.id.btnGo);
        testo = (TextView) findViewById(R.id.txtEtichetta);
        immagine = (ImageButton) findViewById(R.id.imgAndroid);
        input = (EditText) findViewById(R.id.txtInput);
        cane = (ImageView) findViewById(R.id.imgCane);

        testo.setText("Sono qui");

        btnMio.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                /*contatore++;
                String letto = input.getText().toString();
                testo.setText(letto);*/
                Intent intent = new Intent(MainActivity.this, SecondActivity.class);
                startActivity(intent);
            }
        });

        immagine.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                testo.setText("Ahia !!!!!");
            }
        });

        Picasso.get().load("https://www.voltahosting.it/4E/menu/images/panini/bacon.jpg").into(cane, new Callback() {
            @Override
            public void onSuccess() {
            }

            @Override
            public void onError(Exception e) {
                System.out.println(e.getMessage().toString());
            }
        });

        Globals.comune = "Ciao";

    }


}
