package com.example.progetto6_museo;

import androidx.appcompat.app.AppCompatActivity;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.BaseAdapter;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.SearchView;
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
import java.util.ArrayList;
import java.util.TreeSet;

import com.squareup.picasso.Callback;
import com.squareup.picasso.Picasso;

public class MostraActivity extends AppCompatActivity {

    ListView lista2;
    String categoria;
    int tipo;
    String cerca;
    TextView vuoto;

    private ArrayList<String> voci = new ArrayList<String>();
    private ArrayList<String> foto = new ArrayList<String>();
    private ArrayList<String> mData0 = new ArrayList<String>();
    private ArrayList<String> mData1 = new ArrayList<String>();

    private ArrayList<String> id = new ArrayList<String>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        Intent intent=getIntent();
        if(intent.getIntExtra("tipo",1)==1){
            tipo=1;
        }else if(intent.getIntExtra("tipo",1)==2){
            tipo=2;
            categoria=intent.getStringExtra("categoria");
        }else if(intent.getIntExtra("tipo",1)==3){
            tipo=3;
            cerca=intent.getStringExtra("cerca");
        }
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mostra);

        lista2 = (ListView) findViewById(R.id.listMostra);
        lista2.setAdapter(null);
        vuoto = (TextView) findViewById(R.id.txtVuoto);

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

    class readProdotti extends AsyncTask<Void, Void, Void> {

        String text = "";

        @Override
        protected void onPostExecute(Void param) {
            System.out.println("Fine esecuzione");
            vuoto.setText(null);
            if(Integer.valueOf(id.get(0))==-1){
                vuoto.setText("Nessun opera trovata");
            }else {
                caricaLista();
            }
        }

        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;
            if(tipo==1) {
                try{
                    data = URLEncoder.encode("","UTF-8");
                } catch (UnsupportedEncodingException e) {
                    e.printStackTrace();
                }
            }else if(tipo==2){
                try{
                data = URLEncoder.encode("idCategoria", "UTF-8")
                        + "=" + URLEncoder.encode(categoria, "UTF-8");
                } catch (UnsupportedEncodingException e) {
                     e.printStackTrace();
                }
            }else if(tipo==3){
                try{
                    data = URLEncoder.encode("chiave", "UTF-8")
                        + "=" + URLEncoder.encode(cerca, "UTF-8");
                } catch (UnsupportedEncodingException e) {
                     e.printStackTrace();
                }
            }

            BufferedReader reader=null;

            try
            {
                URL url=null;
                if(tipo==1){
                    url = new URL("https://www.voltahosting.it/4E/galleria/galleriaOpere.php");
                }else if(tipo==2){
                    url = new URL("https://www.voltahosting.it/4E/galleria/galleriaOpereCategoria.php");
                }else if (tipo==3){
                    url = new URL("https://www.voltahosting.it/4E/galleria/galleriaOpere.php");
                }

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
                        if(Integer.valueOf(c.getString("id"))==-1){
                            id.add(c.getString("id"));
                        }else {
                            voci.add(c.getString("titolo"));
                            foto.add(c.getString("foto"));
                            id.add(c.getString("id"));
                            System.out.println("id = " + c.getString("id"));
                            System.out.println("foto = " + c.getString("foto"));
                        }
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

    public void caricaLista() {
        MyCustomAdapter mAdapter = new MyCustomAdapter();       // IMPORTANTE
        mAdapter.removeAll();
        int size = voci.size();
        for (int i = 0; i < size; i++) {
            mAdapter.addItem(voci.get(i),foto.get(i)); // IMPORTANTE
        }
        lista2.setAdapter(mAdapter);  // IMPORTANTE
    }

    private class MyCustomAdapter extends BaseAdapter {

        private static final int TYPE_ITEM = 0;
        private static final int TYPE_SEPARATOR = 1;
        private static final int TYPE_MAX_COUNT = TYPE_SEPARATOR + 1;


        private LayoutInflater mInflater;

        private TreeSet<Integer> mSeparatorsSet = new TreeSet<Integer>();

        public MyCustomAdapter() {
            mInflater = (LayoutInflater) getSystemService(LAYOUT_INFLATER_SERVICE);
        }

        public void removeAll() {
            mData0.clear();
            mData1.clear();
        }

        public void addItem(String voce, String voce2) {  // IMPORTANTE
            mData0.add(voce); // IMPORTANTE
            mData1.add(voce2);
            notifyDataSetChanged();
        }

        @Override
        public int getItemViewType(int position) {
            return mSeparatorsSet.contains(position) ? TYPE_SEPARATOR : TYPE_ITEM;
        }

        @Override
        public int getViewTypeCount() {
            return TYPE_MAX_COUNT;
        }

        @Override
        public int getCount() {
            return mData0.size();
        }

        @Override
        public String getItem(int position) {
            return mData0.get(position);
        }

        @Override
        public long getItemId(int position) {
            return position;
        }

        @Override
        public View getView(final int position, View convertView, ViewGroup parent) {
            final ViewHolder holder;
            holder = new ViewHolder();
            convertView = mInflater.inflate(R.layout.elemento_lista, null);  // IMPORTANTE
            holder.txtNome = (TextView) convertView.findViewById(R.id.txtNome);
            holder.imgFoto = (ImageView) convertView.findViewById(R.id.imgFoto);
            holder.vedi = (ImageView) convertView.findViewById(R.id.imgVedi);
            holder.vedi.setTag(position);
            holder.vedi.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Intent intent = new Intent(MostraActivity.this, VediActivity.class);
                    intent.putExtra("id",id.get(position));
                    startActivity(intent);
                }
            });
            holder.txtNome.setText(mData0.get(position));
            Picasso.get().load(mData1.get(position)).fit().centerCrop().into(holder.imgFoto, new Callback() {
                @Override
                public void onSuccess() {
                }

                @Override
                public void onError(Exception e) {
                    System.out.println(e.getMessage().toString());
                }
            });
            convertView.setTag(holder);
            return convertView;
        }
    }

    public static class ViewHolder {
        public TextView txtNome;
        public ImageView imgFoto;
        public ImageView vedi;
    }

}