package com.example.prova;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.Toast;

public class LatteActivity extends AppCompatActivity {

    Button submit;
    DatePicker data;

    String dataCompleta;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_latte);

        submit = (Button) findViewById(R.id.btnSubmit);
        data = (DatePicker) findViewById(R.id.date);

        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                int   day  = data.getDayOfMonth();
                int   month= data.getMonth() + 1;
                int   year = data.getYear();
                dataCompleta = year+"-"+month+"-"+day;
                Intent intent = new Intent(LatteActivity.this, Latte2Activity.class);
                intent.putExtra("data",dataCompleta);
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
            case R.id.home:
                intent = new Intent(this, HomeActivity.class);
                startActivity(intent);
                break;
            case R.id.latte:
                intent = new Intent(this, LatteActivity.class);
                startActivity(intent);
                break;
            case R.id.rForma:
                intent = new Intent(this, RegistraFormaActivity.class);
                startActivity(intent);
                break;
            case R.id.mForma:
                intent = new Intent(this, ModificaFormaActivity.class);
                startActivity(intent);
                break;
            case R.id.vForma:
                intent = new Intent(this, VendiFormaActivity.class);
                startActivity(intent);
                break;
            case R.id.cliente:
                intent = new Intent(this, RegistraClienteActivity.class);
                startActivity(intent);
                break;
        }
        return false;
    }
}