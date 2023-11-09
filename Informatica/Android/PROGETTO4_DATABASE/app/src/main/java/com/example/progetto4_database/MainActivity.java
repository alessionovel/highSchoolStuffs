package com.example.progetto4_database;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
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

    Button btn1;
    Button btn2;
    Button btn3;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        new readPic().execute();

        btn1 = (Button) findViewById(R.id.btn1);
        btn2 = (Button) findViewById(R.id.btn2);
        btn3 = (Button) findViewById(R.id.btn3);

        btn1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Globals.ind=0;
                Intent intent = new Intent(MainActivity.this, SecondActivity.class);
                startActivity(intent);
            }
        });

        btn2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Globals.ind=1;
                Intent intent = new Intent(MainActivity.this, SecondActivity.class);
                startActivity(intent);
            }
        });

        btn3.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Globals.ind=2;
                Intent intent = new Intent(MainActivity.this, SecondActivity.class);
                startActivity(intent);
            }
        });
    }

    class readPic extends AsyncTask<Void, Void, Void> {

        String text       = "";

        @Override
        protected void onPostExecute(Void param) {
            System.out.println("Fine esecuzione");
        }

        @Override
        protected Void doInBackground(Void... voids) {
            String data = null;
            String param = "fake";

            try {
                data = URLEncoder.encode("param", "UTF-8")
                        + "=" + URLEncoder.encode(param, "UTF-8");

            } catch (UnsupportedEncodingException e) {
                e.printStackTrace();
            }


            BufferedReader reader=null;

            // Send data
            try
            {
                // Defined URL  where to send data
                URL url = new URL("https:/www.voltahosting.it/quinta/read_bikes.php");

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
                    JSONArray contacts = jsonObj.getJSONArray("List");

                    // looping through All Contacts
                    for (int i = 0; i < contacts.length(); i++) {
                        JSONObject c = contacts.getJSONObject(i);
                        Globals.immagini.add(c.getString("immagine"));
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
