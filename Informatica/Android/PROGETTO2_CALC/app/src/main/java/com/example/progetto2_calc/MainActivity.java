package com.example.progetto2_calc;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    TextView tipo;
    TextView res;
    EditText primo;
    EditText secondo;
    Button piu;
    Button per;
    Button meno;
    Button diviso;
    Button calc;
    Button second;
    int tipo2=0;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        primo = (EditText) findViewById(R.id.txt1);
        secondo = (EditText) findViewById(R.id.txt2);
        tipo = (TextView) findViewById(R.id.txtTipo);
        res = (TextView) findViewById(R.id.txtRes);
        piu = (Button) findViewById(R.id.btnPiu);
        per = (Button) findViewById(R.id.btnPer);
        meno = (Button) findViewById(R.id.btnMeno);
        diviso = (Button) findViewById(R.id.btnDiviso);
        calc = (Button) findViewById(R.id.btnCalcola);
        second= (Button) findViewById(R.id.btnSecond);

        piu.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                tipo.setText("+");
                tipo2=1;
            }
        });

        meno.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                tipo.setText("-");
                tipo2=2;
            }
        });
        per.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                tipo.setText("*");
                tipo2=3;
            }
        });
        diviso.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                tipo.setText("/");
                tipo2=4;
            }
        });

        calc.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (primo.getText().toString().equals("") || secondo.getText().toString().equals("") || tipo2==0){
                    res.setText("ERRORE");
                }else{
                    if(tipo2==1){
                        res.setText(Integer.toString(Integer.valueOf(primo.getText().toString())+Integer.valueOf(secondo.getText().toString())));
                    }else  if(tipo2==2){
                        res.setText(Integer.toString(Integer.valueOf(primo.getText().toString())-Integer.valueOf(secondo.getText().toString())));
                    }else  if(tipo2==3){
                        res.setText(Integer.toString(Integer.valueOf(primo.getText().toString())*Integer.valueOf(secondo.getText().toString())));
                    }else  if(tipo2==4){
                        res.setText(Integer.toString(Integer.valueOf(primo.getText().toString())/Integer.valueOf(secondo.getText().toString())));
                    }
                }
                primo.setText("");
                secondo.setText("");
                tipo.setText("?");
                tipo2=0;
            }
        });

        second.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, SecondActivity.class);
                startActivity(intent);
            }
        });
    }
}
