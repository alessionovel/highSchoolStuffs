package com.example.progetto6_museo;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageButton;

public class RicercaActivity extends AppCompatActivity {

    EditText testo;
    ImageButton cerca;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ricerca);

        testo = (EditText) findViewById(R.id.txtRicerca);
        cerca = (ImageButton) findViewById(R.id.btnRicerca);

        cerca.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(testo.getText().length()!=0){
                    Intent intent = new Intent(RicercaActivity.this, MostraActivity.class);
                    intent.putExtra("tipo",3);
                    intent.putExtra("cerca",testo.getText().toString());
                    startActivity(intent);
                }
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
