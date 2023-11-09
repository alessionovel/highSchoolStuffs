package com.example.progetto6_museo;

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
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.picasso.Callback;
import com.squareup.picasso.Picasso;

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

public class VediActivity extends AppCompatActivity {

    String id;

    TextView autore, titolo, descrizione, media;
    Button vota;
    ImageView foto;
    EditText voto;

    String a;
    String t;
    String d;
    String f;
    double m;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        id=getIntent().getStringExtra("id");
        setContentView(R.layout.activity_vedi);
        autore = (TextView) findViewById(R.id.txtAutore);
        titolo = (TextView) findViewById(R.id.txtTitolo);
        descrizione = (TextView) findViewById(R.id.txtDescrizione);
        vota = (Button) findViewById(R.id.btnVota);
        foto = (ImageView) findViewById(R.id.imgOpera);
        voto = (EditText) findViewById(R.id.txtVoto);
        media = (TextView) findViewById(R.id.txtMedia);

        vota.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(!voto.getText().toString().equals("")){
                    if(Integer.valueOf(voto.getText().toString())>0 && Integer.valueOf(voto.getText().toString())<=10){
                        new caricaVoto(Integer.valueOf(voto.getText().toString())).execute();
                        voto.setText("");
                        finish();
                        startActivity(getIntent());
                    }else{
                        voto.setText("");
                    }
                }
            }
        });

        new readProdotti().execute();
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

    public void carica(){
        autore.setText(a);
        titolo.setText(t);
        descrizione.setText(d);
        m = m * 100;
        m = Math.round(m);
        m = m / 100;
        media.setText("Media voto: " + m);
        Picasso.get().load(f).into(foto, new Callback() {
            @Override
            public void onSuccess() {
            }

            @Override
            public void onError(Exception e) {
                System.out.println(e.getMessage().toString());
            }
        });
    }

    class readProdotti extends AsyncTask<Void, Void, Void> {

        String text       = "";

        @Override
        protected void onPostExecute(Void param) {
            System.out.println("Fine esecuzione");
            carica();
        }

        @SuppressLint("WrongThread")
        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;


            try {
                data = URLEncoder.encode("id", "UTF-8")
                        + "=" + URLEncoder.encode(id, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }


            BufferedReader reader=null;

            try
            {
                URL url = new URL("https://www.voltahosting.it/4E/galleria/galleriaOpera.php");
                URLConnection conn = url.openConnection();
                conn.setDoOutput(true);
                OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
                wr.write( data );
                wr.flush();
                reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));
                StringBuilder sb = new StringBuilder();
                String line = null;
                while((line = reader.readLine()) != null) {
                    sb.append(line);
                }
                text = sb.toString();
                try {
                    JSONObject jsonObj = new JSONObject(text);
                    JSONArray contacts = jsonObj.getJSONArray("UpdateList");
                    for (int i = 0; i < contacts.length(); i++) {
                        JSONObject c = contacts.getJSONObject(i);
                        t = c.getString("titolo");
                        a = c.getString("autore");
                        d = c.getString("descrizione");
                        f = c.getString("foto");
                        m = Double.parseDouble(c.getString("voto"));
                    }
                } catch (final JSONException e) {
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
            catch(Exception ex) {
                System.out.println("ERRORE:" + ex.getMessage());
            }
            finally {
                try {
                    reader.close();
                }
                catch(Exception ex) {}
            }
            return null;
        }
    }

    class caricaVoto extends AsyncTask<Void, Void, Void> {
        int voto=0;
        String res;

        public caricaVoto(int v) {
            voto=v;
        }

        String text       = "";

        @Override
        protected void onPostExecute(Void param) {
            System.out.println("Fine esecuzione " + res);
        }

        @SuppressLint("WrongThread")
        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;


            try {
                data = URLEncoder.encode("idOpera", "UTF-8")
                        + "=" + URLEncoder.encode(id, "UTF-8") + "&" + URLEncoder.encode("voto", "UTF-8") + "=" + URLEncoder.encode(String.valueOf(voto), "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }


            BufferedReader reader=null;

            try
            {
                URL url = new URL("https://www.voltahosting.it/4E/galleria/galleriaVoto.php");
                URLConnection conn = url.openConnection();
                conn.setDoOutput(true);
                OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
                wr.write( data );
                wr.flush();
                reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));
                StringBuilder sb = new StringBuilder();
                String line = null;
                while((line = reader.readLine()) != null) {
                    sb.append(line);
                }
                text = sb.toString();
                try {
                    JSONObject jsonObj = new JSONObject(text);
                    JSONArray contacts = jsonObj.getJSONArray("UpdateList");
                    for (int i = 0; i < contacts.length(); i++) {
                        JSONObject c = contacts.getJSONObject(i);
                        res=c.getString("id");
                    }
                } catch (final JSONException e) {
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
            catch(Exception ex) {
                System.out.println("ERRORE:" + ex.getMessage());
            }
            finally {
                try {
                    reader.close();
                }
                catch(Exception ex) {}
            }
            return null;
        }
    }
}
