package com.example.prova;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
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

public class MainActivity extends AppCompatActivity {


    EditText username;
    EditText password;
    Button login;

    String user;
    String pw;

    String codice,via,risultato;


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);


        username = (EditText) findViewById(R.id.txtUsername);
        password = (EditText) findViewById(R.id.txtPassword);


        login = (Button) findViewById(R.id.btnLogin);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(username.getText().toString().equals("") || password.getText().toString().equals("")) {
                    Toast.makeText(getApplicationContext(),
                            "Inserisci username e password",
                            Toast.LENGTH_LONG).show();
                }else{
                    user = username.getText().toString();
                    pw = password.getText().toString();
                    new checkLogin().execute();
                }
            }
        });
    }
    class checkLogin extends AsyncTask<Void, Void, Void> {

        String text = "";



        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;
            try {
                data = URLEncoder.encode("username", "UTF-8")
                        + "=" + URLEncoder.encode(user, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }
            try {
                data += "&" + URLEncoder.encode("password", "UTF-8")
                        + "=" + URLEncoder.encode(pw, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }


            BufferedReader reader=null;

            // Send data
            try
            {

                // Indirizzo della pagina PHP da chiamare
                URL url = new URL("https://www.voltahosting.it/5E/caseificioFerro/json/jsonLogin.php?");
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
                        risultato = c.getString("codice");
                        codice = c.getString("codice");
                        via = c.getString("via");
                        if(codice.equalsIgnoreCase("0")){
                            codice = "-1";
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
            if (codice.equalsIgnoreCase("-1")){
                Toast.makeText(getApplicationContext(),
                        "Credenziali errate",
                       Toast.LENGTH_LONG).show();
            }else{
                Globals.codice=codice;
                Globals.via=via;
                Intent intent = new Intent(MainActivity.this, HomeActivity.class);
                startActivity(intent);
            }
        }
    }
}