package com.volta.quartae2020;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;

import android.content.DialogInterface;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Build;
import android.os.Bundle;
import android.text.InputType;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

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
import java.util.TreeSet;

public class SecondActivity extends AppCompatActivity {

    ListView listaCodice;

    private ArrayList<String> voci = new ArrayList<String>();
    private ArrayList<String> mData0 = new ArrayList<String>();

    private ArrayList<String> voci2 = new ArrayList<String>();
    private ArrayList<String> mData1 = new ArrayList<String>();

    String idCategoria = "2";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_second);

        listaCodice = (ListView) findViewById(R.id.lista);
        listaCodice.setAdapter(null);

        popolaLista();

        caricaLista();

        new readBikes().execute();

        // new readBikes().start();


    }

    public void popolaLista() {
        voci.add("Prima");
        voci.add("Seconda");
        voci.add("Terza");
        voci.add("Quarta");
        voci.add("Quinta");
        voci2.add("Alfa");
        voci2.add("Beta");
        voci2.add("Gamma");
        voci2.add("Delta");
        voci2.add("Epsilon");
    }

    public void caricaLista() {
        MyCustomAdapter mAdapter = new MyCustomAdapter();       // IMPORTANTE
        mAdapter.removeAll();
        int rows = voci.size();
        for (int i = 0; i < rows; i++) {
            mAdapter.addItem(voci.get(i), voci2.get(i)); // IMPORTANTE
        }
        listaCodice.setAdapter(mAdapter);  // IMPORTANTE
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
            mData0.add(voce);               // IMPORTANTE
            mData1.add(voce2);               // IMPORTANTE
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
            holder.txtCategoria = (TextView) convertView.findViewById(R.id.txtElemento);
            holder.txtCategoria2 = (TextView) convertView.findViewById(R.id.txtElemento2);
            holder.btnTest = (Button) convertView.findViewById(R.id.btnTest);

            holder.txtCategoria.setText(mData0.get(position));
            holder.txtCategoria2.setText(mData1.get(position));

            holder.txtCategoria.setTag(position);
            holder.btnTest.setTag(position);

            holder.txtCategoria.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    int position = (int) view.getTag();
                    Toast.makeText(getApplicationContext(),"Hai premuto " + mData0.get(position),Toast.LENGTH_LONG).show();
                    //Globals.id_categoria = mData0.get(position);
                    //Intent intent = new Intent(MenuLocaleActivity.this, PiattiActivity.class);
                    //startActivity(intent);
                }
            });

            holder.btnTest.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    int position = (int) view.getTag();
                    Toast.makeText(getApplicationContext(),"Hai premuto " + mData0.get(position),Toast.LENGTH_LONG).show();
                    //Globals.id_categoria = mData0.get(position);
                    //Intent intent = new Intent(MenuLocaleActivity.this, PiattiActivity.class);
                    //startActivity(intent);
                }
            });

            convertView.setTag(holder);
            return convertView;
        }
    }

    public static class ViewHolder {
        public TextView txtCategoria;
        public TextView txtCategoria2;
        public Button btnTest;
    }

    class readBikes extends AsyncTask<Void, Void, Void> {

        // class readBikes extends Thread

        String text       = "";

        @Override
        protected void onPostExecute(Void param) {
            System.out.println("Fine esecuzione");
        }

        // public void run()

        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;


            try {
                data = URLEncoder.encode("idCat", "UTF-8")
                        + "=" + URLEncoder.encode(idCategoria, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }


            BufferedReader reader=null;

            // Send data
            try
            {
                // Defined URL  where to send data
                URL url = new URL("https://www.voltahosting.it/4E/menu/leggi_gallery.php");

                // Send POST data request

                URLConnection conn = url.openConnection();
                conn.setDoOutput(true);
                OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
                wr.write( data );
                wr.flush();

                // Get the server response

                reader = new BufferedReader(new InputStreamReader(conn.getInputStream()));
                StringBuilder sb = new StringBuilder();
                String line = null;

                // Read Server Response
                while((line = reader.readLine()) != null)
                {
                    // Append server response in string
                    sb.append(line);
                }

                text = sb.toString();

                try {
                    JSONObject jsonObj = new JSONObject(text);

                    // Getting JSON Array node
                    JSONArray contacts = jsonObj.getJSONArray("UpdateList");

                    // looping through All Contacts
                    for (int i = 0; i < contacts.length(); i++) {
                        JSONObject c = contacts.getJSONObject(i);

                        System.out.println("id = " + c.getString("id"));
                        System.out.println("foto = " + c.getString("foto"));
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

            return null;
        }
    }


}
