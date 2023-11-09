package com.example.progetto6_museo;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageButton;
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
import java.util.ArrayList;

public class CategoriaActivity extends AppCompatActivity {

    private ArrayList<String> nome = new ArrayList<String>();
    private ArrayList<String> foto = new ArrayList<String>();
    private ArrayList<String> id = new ArrayList<String>();

    ImageButton cat1,cat2,cat3;
    TextView ct1,ct2,ct3;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        Intent intent = getIntent();
        setContentView(R.layout.activity_categoria);

        cat1 = (ImageButton) findViewById(R.id.btnCat1);
        cat2 = (ImageButton) findViewById(R.id.btnCat2);
        cat3 = (ImageButton) findViewById(R.id.btnCat3);
        ct1 = (TextView) findViewById(R.id.txtCat1);
        ct2 = (TextView) findViewById(R.id.txtCat2);
        ct3 = (TextView) findViewById(R.id.txtCat3);

        new readProdotti().execute();

        cat1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(CategoriaActivity.this, MostraActivity.class);
                intent.putExtra("tipo",2);
                intent.putExtra("categoria",id.get(0));
                startActivity(intent);
            }
        });

        cat2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(CategoriaActivity.this, MostraActivity.class);
                intent.putExtra("tipo",2);
                intent.putExtra("categoria",id.get(1));
                startActivity(intent);
            }
        });

        cat3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(CategoriaActivity.this, MostraActivity.class);
                intent.putExtra("tipo",2);
                intent.putExtra("categoria",id.get(2));
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



    class readProdotti extends AsyncTask<Void, Void, Void> {

        String text = "";

        @Override
        protected void onPostExecute(Void param) {
            System.out.println("Fine esecuzione");
            carica();
        }

        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;
                try{
                    data = URLEncoder.encode("","UTF-8");
                } catch (UnsupportedEncodingException e) {
                    e.printStackTrace();
                }

            BufferedReader reader=null;

            try
            {
                URL url=null;
                url = new URL("https://www.voltahosting.it/4E/galleria/galleriaCategorie.php");

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
                        foto.add(c.getString("foto"));
                        nome.add(c.getString("categoria"));
                        id.add(c.getString("id"));
                        System.out.println("id = " + c.getString("id"));
                        System.out.println("foto = " + c.getString("foto"));
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

    public void carica(){
        ct1.setText(nome.get(0));
        Picasso.get().load(foto.get(0)).fit().centerCrop().into(cat1, new Callback() {
            @Override
            public void onSuccess() {
            }

            @Override
            public void onError(Exception e) {
                System.out.println(e.getMessage().toString());
            }
        });
        ct2.setText(nome.get(1));
        Picasso.get().load(foto.get(1)).fit().centerCrop().into(cat2, new Callback() {
            @Override
            public void onSuccess() {
            }

            @Override
            public void onError(Exception e) {
                System.out.println(e.getMessage().toString());
            }
        });
        ct3.setText(nome.get(2));
        Picasso.get().load(foto.get(2)).fit().centerCrop().into(cat3, new Callback() {
            @Override
            public void onSuccess() {
            }

            @Override
            public void onError(Exception e) {
                System.out.println(e.getMessage().toString());
            }
        });
    }
}
