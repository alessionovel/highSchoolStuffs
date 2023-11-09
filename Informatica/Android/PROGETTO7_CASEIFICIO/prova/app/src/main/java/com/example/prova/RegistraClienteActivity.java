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

public class RegistraClienteActivity extends AppCompatActivity {

    EditText txtCF, txtNome, txtNumero, txtIndirizzo, txtTipo;
    Button submit;

    String cf, nome, numero, indirizzo, tipo;

    String risultato;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registra_cliente);

        txtCF = (EditText) findViewById(R.id.txtCF);
        txtNome = (EditText) findViewById(R.id.txtNome);
        txtNumero = (EditText) findViewById(R.id.txtNumero);
        txtIndirizzo = (EditText) findViewById(R.id.txtIndirizzo);
        txtTipo = (EditText) findViewById(R.id.txtTipo);

        submit = (Button) findViewById(R.id.btnSubmit);

        submit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(txtCF.getText().toString().equals("") || txtNome.getText().toString().equals("") || txtNumero.getText().toString().equals("") || txtIndirizzo.getText().toString().equals("") || txtTipo.getText().toString().equals("")) {
                    Toast.makeText(getApplicationContext(),
                            "Compila i campi",
                            Toast.LENGTH_LONG).show();
                }else{
                    cf = txtCF.getText().toString();
                    nome = txtNome.getText().toString();
                    numero = txtNumero.getText().toString();
                    indirizzo = txtIndirizzo.getText().toString();
                    tipo = txtTipo.getText().toString();
                    new newCliente().execute();
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

    class newCliente extends AsyncTask<Void, Void, Void> {

        String text = "";



        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;
            try {
                data = URLEncoder.encode("cf", "UTF-8")
                        + "=" + URLEncoder.encode(cf, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("numero", "UTF-8")
                        + "=" + URLEncoder.encode(numero, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("indirizzo", "UTF-8")
                        + "=" + URLEncoder.encode(indirizzo, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("nome", "UTF-8")
                        + "=" + URLEncoder.encode(nome, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("tipo", "UTF-8")
                        + "=" + URLEncoder.encode(tipo, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }


            BufferedReader reader=null;

            // Send data
            try
            {

                // Indirizzo della pagina PHP da chiamare
                URL url = new URL("https://www.voltahosting.it/5E/caseificioFerro/json/jsonNewCliente.php?");
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
                        "Cliente già presente",
                        Toast.LENGTH_LONG).show();
            }
            if (risultato.equalsIgnoreCase("0")){
                Toast.makeText(getApplicationContext(),
                        "Errore nell'inserimento del cliente",
                        Toast.LENGTH_LONG).show();
            }
            if (risultato.equalsIgnoreCase("1")){
                Intent intent = new Intent(RegistraClienteActivity.this, HomeActivity.class);
                startActivity(intent);
            }
        }
    }
}