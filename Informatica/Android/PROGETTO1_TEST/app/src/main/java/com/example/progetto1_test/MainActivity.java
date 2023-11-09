package com.example.progetto1_test;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    Button btnGo;
    TextView txtEtichetta;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        btnGo = (Button) findViewById(R.id.btnGo);
        txtEtichetta = (TextView) findViewById(R.id.txtEtichetta);

        txtEtichetta.setText("Ciao");
    }
}
