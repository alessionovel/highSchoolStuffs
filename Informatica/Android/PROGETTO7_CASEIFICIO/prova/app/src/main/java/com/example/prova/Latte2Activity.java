package com.example.prova;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.URL;
import java.net.URLConnection;
import java.net.URLEncoder;

public class Latte2Activity extends AppCompatActivity {

    String date;
    TextView dataOut;
    String tipo="0";

    String racDB="";
    String lavDB="";

    EditText rac;
    EditText lav;
    Button submit;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_latte2);

        dataOut = (TextView) findViewById(R.id.txtView);

        rac = (EditText) findViewById(R.id.txtQtaRac);
        lav = (EditText) findViewById(R.id.txtCF);

        submit = (Button) findViewById(R.id.btnSubmit);

        Intent intent=getIntent();
        date = intent.getStringExtra("data");
        dataOut.setText("Data: "+date);
        new checkLatte().execute();

        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(!rac.getText().toString().equals("") || !lav.getText().toString().equals("")) {
                    racDB = rac.getText().toString();
                    lavDB = lav.getText().toString();
                    new loadLatte().execute();
                }else{
                    Toast.makeText(getApplicationContext(),
                            "Compila i campi",
                            Toast.LENGTH_LONG).show();
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

    class checkLatte extends AsyncTask<Void, Void, Void> {

        String text = "";



        @SuppressLint("WrongThread")
        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;
            try {
                data = URLEncoder.encode("date", "UTF-8")
                        + "=" + URLEncoder.encode(date, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("codice", "UTF-8")
                        + "=" + URLEncoder.encode(Globals.codice, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }


            BufferedReader reader=null;

            // Send data
            try
            {

                // Indirizzo della pagina PHP da chiamare
                URL url = new URL("https://www.voltahosting.it/5E/caseificioFerro/json/jsonSelectDataLatte.php?");
                // Chiamata alla pagina
                URLConnection conn = url.openConnection();
                conn.setDoOutput(true);
                OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
                wr.write( data );
                wr.flush();
                // Risposta del server
                reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));
                StringBuilder sb = new StringBuilder();
                String line = null;
                while((line = reader.readLine()) != null)
                {
                    sb.append(line);
                }
                text = sb.toString();
                try {
                    // Interpretazione del JSON in risposta
                    JSONObject jsonObj = new JSONObject(text);
                    JSONArray results = jsonObj.getJSONArray("UpdateList");
                    for (int i = 0; i < results.length(); i++) {
                        JSONObject c = results.getJSONObject(i);
                        if(!c.getString("qtaLav").equals("-1")){
                            lav.setText(c.getString("qtaLav"));
                            tipo="1";
                        }
                        if(!c.getString("qtaRac").equals("-1")){
                            rac.setText(c.getString("qtaRac"));
                            tipo="1";
                        }

                    }
                } catch (final JSONException e) {
                    //Log.e(TAG, "Json parsing error: " + e.getMessage());
                    runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            Toast.makeText(getApplicationContext(),
                                    "Json parsing error: " + e.getMessage(),
                                    Toast.LENGTH_LONG).show();
                        }
                    });
                }
            }
            catch(Exception ex)
            {
                System.out.println("ERRORE:" + ex.getMessage());
            }
            finally
            {
                try
                {
                    // Show response on activity
                    reader.close();
                }

                catch(Exception ex) {}
            }

            // Show response on activity
            System.out.println("OK:" + text);


            return null;
        }

        @Override
        protected void onPostExecute(Void param) {
            System.out.println("Fine esecuzione");

        }
    }

    class loadLatte extends AsyncTask<Void, Void, Void> {

        String text = "";



        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;
            try {
                data = URLEncoder.encode("rac", "UTF-8")
                        + "=" + URLEncoder.encode(racDB, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("lav", "UTF-8")
                        + "=" + URLEncoder.encode(lavDB, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("tipo", "UTF-8")
                        + "=" + URLEncoder.encode(tipo, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("codiceBo", "UTF-8")
                        + "=" + URLEncoder.encode(Globals.codice, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("data", "UTF-8")
                        + "=" + URLEncoder.encode(date, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }


            BufferedReader reader=null;

            // Send data
            try
            {

                // Indirizzo della pagina PHP da chiamare
                URL url = new URL("https://www.voltahosting.it/5E/caseificioFerro/json/jsonInsLatte.php?");
                // Chiamata alla pagina
                URLConnection conn = url.openConnection();
                conn.setDoOutput(true);
                OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
                wr.write( data );
                wr.flush();
                // Risposta del server
                reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));
                StringBuilder sb = new StringBuilder();
                String line = null;
                while((line = reader.readLine()) != null)
                {
                    sb.append(line);
                }
                text = sb.toString();
                try {
                    // Interpretazione del JSON in risposta
                    JSONObject jsonObj = new JSONObject(text);
                    JSONArray results = jsonObj.getJSONArray("UpdateList");
                    for (int i = 0; i < results.length(); i++) {
                        JSONObject c = results.getJSONObject(i);


                    }
                } catch (final JSONException e) {
                    //Log.e(TAG, "Json parsing error: " + e.getMessage());
                    runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            Toast.makeText(getApplicationContext(),
                                    "Json parsing error: " + e.getMessage(),
                                    Toast.LENGTH_LONG).show();
                        }
                    });
                }
            }
            catch(Exception ex)
            {
                System.out.println("ERRORE:" + ex.getMessage());
            }
            finally
            {
                try
                {
                    // Show response on activity
                    reader.close();
                }

                catch(Exception ex) {}
            }

            // Show response on activity
            System.out.println("OK:" + text);


            return null;
        }

        @Override
        protected void onPostExecute(Void param) {
            System.out.println("Fine esecuzione");
            Intent intent = new Intent(Latte2Activity.this, HomeActivity.class);
            startActivity(intent);
        }
    }

}