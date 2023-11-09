package com.example.progetto5_menudb;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;

public class MainActivity extends AppCompatActivity {

    Button bibite;
    Button panini;
    Button dessert;

    public boolean onCreateOptionsMenu(Menu menu){
        MenuInflater inflater=getMenuInflater();
        inflater.inflate(R.menu.menu,menu);
        return true;
    }

    public boolean onOptionsItemSelected(MenuItem item){
        int id=item.getItemId();
        Intent intent;
        switch(id) {
            case R.id.cibo:
                intent = new Intent(this, MainActivity.class);
                startActivity(intent);
                break;
            case R.id.carrello:
                intent = new Intent(this, CarrelloActivity.class);
                startActivity(intent);
                break;
        }
        return false;
    }


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        bibite = (Button) findViewById(R.id.btnBibite);
        panini = (Button) findViewById(R.id.btnPanini);
        dessert = (Button) findViewById(R.id.btnDolci);


        panini.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, MenuActivity.class);
                intent.putExtra("tipo","2");
                startActivity(intent);
            }
        });

        bibite.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, MenuActivity.class);
                intent.putExtra("tipo","1");
                startActivity(intent);
            }
        });

        dessert.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(MainActivity.this, MenuActivity.class);
                intent.putExtra("tipo","3");
                startActivity(intent);
            }
        });
    }
}
