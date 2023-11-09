package com.example.progetto6_museo;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    Button tutte;


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        tutte = (Button) findViewById(R.id.btnTutte);

        tutte.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, MostraActivity.class);
                intent.putExtra("tipo",1);
                startActivity(intent);
            }
        });
    }

    public boolean onCreateOptionsMenu(Menu menu){
        MenuInflater inflater=getMenuInflater();
        inflater.inflate(R.menu.menu_principale,menu);
        return true;
    }

    public boolean onOptionsItemSelected(MenuItem item){
        int id=item.getItemId();
        Intent intent;
        switch(id) {
            case R.id.cerca:
                intent = new Intent(this, RicercaActivity.class);
                startActivity(intent);
                break;
            case R.id.home:
                intent = new Intent(this, MainActivity.class);
                startActivity(intent);
                break;
            case R.id.tutte:
                intent = new Intent(this, MostraActivity.class);
                startActivity(intent);
                break;
            case R.id.categoria:
                intent = new Intent(this, CategoriaActivity.class);
                startActivity(intent);
                break;
        }
        return false;
    }
}