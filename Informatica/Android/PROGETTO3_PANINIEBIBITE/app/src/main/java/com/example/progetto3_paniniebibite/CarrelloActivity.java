package com.example.progetto3_paniniebibite;

import androidx.appcompat.app.AppCompatActivity;


import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.Button;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.TreeSet;

public class CarrelloActivity extends AppCompatActivity {

    ListView carrello;
    Button ordina;
    TextView vuoto;

    private ArrayList<String> voci = new ArrayList<String>();
    private ArrayList<String> mData0 = new ArrayList<String>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_carrello);

        ordina = (Button) findViewById(R.id.btnOrdina);
        vuoto = (TextView) findViewById(R.id.txtVuoto);
        carrello = (ListView) findViewById(R.id.listaCarrello);
        carrello.setAdapter(null);

        popolaLista();
        caricaLista();

        ordina.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Globals.carrello.clear();
                Globals.carrelloN.clear();
                finish();
                startActivity(getIntent());
            }
        });
    }

    public void popolaLista() {
        vuoto.setText(null);
        if(Globals.carrello.isEmpty()){
            vuoto.setText("Il carrello è vuoto");
        }else{
            for(int i=0;i<Globals.carrello.size();i++){
                voci.add(Globals.carrello.get(i) + " x" + Globals.carrelloN.get(i));
            }
        }
    }

    public void caricaLista() {
        CarrelloActivity.MyCustomAdapter mAdapter = new CarrelloActivity.MyCustomAdapter();       // IMPORTANTE
        mAdapter.removeAll();
        int size = voci.size();
        for (int i = 0; i < size; i++) {
            mAdapter.addItem(voci.get(i)); // IMPORTANTE
        }
        carrello.setAdapter(mAdapter);  // IMPORTANTE
    }

    private class MyCustomAdapter extends BaseAdapter implements ListAdapter {

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
        }

        public void addItem(String voce) {  // IMPORTANTE
            mData0.add(voce);               // IMPORTANTE
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
            final CarrelloActivity.ViewHolder holder;
            holder = new CarrelloActivity.ViewHolder();
            convertView = mInflater.inflate(R.layout.elemento_lista2, null);  // IMPORTANTE
            holder.txtCategoria = (TextView) convertView.findViewById(R.id.txtElemento);
            holder.txtCategoria.setText(mData0.get(position));
            holder.txtCategoria.setTag(position);
            Button delete = (Button)convertView.findViewById(R.id.btnDelete);
            delete.setOnClickListener(new View.OnClickListener(){
                @Override
                public void onClick(View v) {
                    Toast.makeText(getApplicationContext(),"Hai eliminato " + mData0.get(position),Toast.LENGTH_LONG).show();
                    if(Globals.carrelloN.get(position)!=1){
                        Globals.carrelloN.set(position,(Globals.carrelloN.get(position)-1));
                    }else{
                        Globals.carrello.remove(position);
                        Globals.carrelloN.remove(position);
                    }
                    finish();
                    startActivity(getIntent());
                }
            });
            Button add = (Button)convertView.findViewById(R.id.btnAdd);
            add.setOnClickListener(new View.OnClickListener(){
                @Override
                public void onClick(View v) {
                    Toast.makeText(getApplicationContext(),"Hai aggiunto " + mData0.get(position),Toast.LENGTH_LONG).show();
                    Globals.carrelloN.set(position,(Globals.carrelloN.get(position)+1));
                    finish();
                    startActivity(getIntent());
                }
            });
            convertView.setTag(holder);
            return convertView;
        }
    }

    public static class ViewHolder {
        public TextView txtCategoria;
    }
}
