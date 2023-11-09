package com.example.progetto3_paniniebibite;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    Button carrello;
    Button bibite;
    Button panini;

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        carrello = (Button) findViewById(R.id.btnCarrello);
        bibite = (Button) findViewById(R.id.btnBibite);
        panini = (Button) findViewById(R.id.btnPanini);


        panini.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Globals.categoria="Panini";
                Intent intent = new Intent(MainActivity.this, MenuActivity.class);
                startActivity(intent);
            }
        });

        bibite.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Globals.categoria="Bibite";
                Intent intent = new Intent(MainActivity.this, MenuActivity.class);
                startActivity(intent);
            }
        });

        carrello.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, CarrelloActivity.class);
                startActivity(intent);
            }
        });

    }

}
