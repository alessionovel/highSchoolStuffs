package com.example.prova;

import androidx.appcompat.app.AppCompatActivity;

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

public class RegistraForma2Activity extends AppCompatActivity {

    String date, mese, anno;
    TextView dataOut;

    String scelta="";
    String progr="";

    EditText s;
    EditText p;
    Button submit;

    String risultato="1";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registra_forma2);

        dataOut = (TextView) findViewById(R.id.txtView);

        s = (EditText) findViewById(R.id.txtScelta);
        p = (EditText) findViewById(R.id.txtProgr);

        submit = (Button) findViewById(R.id.btnSubmit);

        Intent intent=getIntent();
        date = intent.getStringExtra("data");
        mese = intent.getStringExtra("mese");
        anno = intent.getStringExtra("anno");
        dataOut.setText("Data: "+date);

        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(!s.getText().toString().equals("") || !p.getText().toString().equals("")) {
                    if(s.getText().toString().equals("1") || s.getText().toString().equals("2")){
                        scelta = s.getText().toString();
                        progr = p.getText().toString();
                        new loadForma().execute();
                    }else{
                        Toast.makeText(getApplicationContext(),
                                "La scelta deve essere 1 o 2",
                                Toast.LENGTH_LONG).show();
                    }

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

    class loadForma extends AsyncTask<Void, Void, Void> {

        String text = "";



        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;
            try {
                data = URLEncoder.encode("scelta", "UTF-8")
                        + "=" + URLEncoder.encode(scelta, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("progr", "UTF-8")
                        + "=" + URLEncoder.encode(progr, "UTF-8");

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
            try {
                data += "&" + URLEncoder.encode("mese", "UTF-8")
                        + "=" + URLEncoder.encode(mese, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("anno", "UTF-8")
                        + "=" + URLEncoder.encode(anno, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }


            BufferedReader reader=null;

            // Send data
            try
            {

                // Indirizzo della pagina PHP da chiamare
                URL url = new URL("https://www.voltahosting.it/5E/caseificioFerro/json/jsonNewForma.php?");
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
                        risultato = c.getString("risultato");
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
            if (risultato.equalsIgnoreCase("-1")){
                Toast.makeText(getApplicationContext(),
                        "Forma già inserita",
                        Toast.LENGTH_LONG).show();
            }
            if (risultato.equalsIgnoreCase("0")){
                Toast.makeText(getApplicationContext(),
                        "Errore nell'inserimento della forma",
                        Toast.LENGTH_LONG).show();
            }
            if (risultato.equalsIgnoreCase("1")){
                Intent intent = new Intent(RegistraForma2Activity.this, HomeActivity.class);
                startActivity(intent);
            }
        }
    }
}