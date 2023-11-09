package com.example.progetto3_paniniebibite;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.TreeSet;

public class MenuActivity extends AppCompatActivity {

    ListView lista2;

    private ArrayList<String> voci = new ArrayList<String>();
    private ArrayList<String> mData0 = new ArrayList<String>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu);

        lista2 = (ListView) findViewById(R.id.listaScelta2);
        lista2.setAdapter(null);

        popolaLista();
        caricaLista();
    }

    public void popolaLista() {
        if(Globals.categoria.equalsIgnoreCase("Panini")){
            voci.add("Big Mac");
            voci.add("Crispy McBacon");
            voci.add("BBQ Chicken");
            voci.add("McToast");
            voci.add("Double Cheeseburger");
        }else if (Globals.categoria.equalsIgnoreCase("Bibite")){
            voci.add("Coca Cola");
            voci.add("Sprite");
            voci.add("Fanta");
            voci.add("Acqua");
            voci.add("The");
        }
    }

    public void caricaLista() {
        MyCustomAdapter mAdapter = new MyCustomAdapter();       // IMPORTANTE
        mAdapter.removeAll();
        int size = voci.size();
        for (int i = 0; i < size; i++) {
            mAdapter.addItem(voci.get(i)); // IMPORTANTE
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
            final MenuActivity.ViewHolder holder;
            holder = new MenuActivity.ViewHolder();
            convertView = mInflater.inflate(R.layout.elemento_lista, null);  // IMPORTANTE
            holder.txtCategoria = (TextView) convertView.findViewById(R.id.txtElemento);
            holder.txtCategoria.setText(mData0.get(position));
            holder.txtCategoria.setTag(position);
            holder.txtCategoria.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    int position = (int) view.getTag();
                    Toast.makeText(getApplicationContext(),"Hai scelto " + mData0.get(position),Toast.LENGTH_LONG).show();
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
        public TextView txtCategoria;
    }
}
