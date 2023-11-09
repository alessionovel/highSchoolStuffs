package com.example.progetto5_menudb;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.ListView;
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

public class MenuActivity extends AppCompatActivity {

    ListView lista2;
    String categoria;

    private ArrayList<String> voci = new ArrayList<String>();
    private ArrayList<String> foto = new ArrayList<String>();
    private ArrayList<String> mData0 = new ArrayList<String>();
    private ArrayList<String> mData1 = new ArrayList<String>();

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

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        Intent intent=getIntent();
        categoria=intent.getStringExtra("tipo");
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        lista2 = (ListView) findViewById(R.id.listaScelta2);
        lista2.setAdapter(null);

        new readProdotti().execute();
    }

    class readProdotti extends AsyncTask<Void, Void, Void> {

        String text       = "";

        @Override
        protected void onPostExecute(Void param) {
            System.out.println("Fine esecuzione");
            caricaLista();
        }

        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;


            try {
                data = URLEncoder.encode("idCat", "UTF-8")
                        + "=" + URLEncoder.encode(categoria, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }


            BufferedReader reader=null;

            try
            {
                URL url = new URL("https://www.voltahosting.it/4E/menu/leggi_gallery.php");
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
                        voci.add(c.getString("id"));
                        foto.add(c.getString("foto"));
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
            final MenuActivity.ViewHolder holder;
            holder = new MenuActivity.ViewHolder();
            convertView = mInflater.inflate(R.layout.elemento_lista, null);  // IMPORTANTE
            holder.txtProdotto = (TextView) convertView.findViewById(R.id.txtElemento);
            holder.imgProdotto = (ImageView) convertView.findViewById(R.id.imgFoto);
            holder.linea = (LinearLayout) convertView.findViewById(R.id.lineObject);
            holder.txtProdotto.setText(mData0.get(position));
            Picasso.get().load(mData1.get(position)).resize(300,300).into(holder.imgProdotto, new Callback() {
                @Override
                public void onSuccess() {
                }

                @Override
                public void onError(Exception e) {
                    System.out.println(e.getMessage().toString());
                }
            });
            holder.linea.setTag(position);
            holder.linea.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    int position = (int) view.getTag();
                    Toast.makeText(getApplicationContext(),"Hai aggiunto " + mData0.get(position),Toast.LENGTH_LONG).show();
                    boolean bool=false;
                    for(int i=0;i<Globals.carrello.size();i++){
                        if (Globals.carrello.get(i).equals(mData0.get(position))){
                            bool=true;
                            Globals.carrelloN.set(i,(Globals.carrelloN.get(i)+1));
                        }
                    }
                    if(bool==false) {
                        Globals.carrello.add(mData0.get(position));
                        Globals.carrelloN.add(1);
                    }
                }
            });
            convertView.setTag(holder);
            return convertView;
        }
    }

    public static class ViewHolder {
        public TextView txtProdotto;
        public ImageView imgProdotto;
        public LinearLayout linea;
    }
}
