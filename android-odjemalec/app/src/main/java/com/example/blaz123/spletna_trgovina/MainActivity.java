package com.example.blaz123.spletna_trgovina;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;

public class MainActivity extends AppCompatActivity implements GetRawData.OnDownloadComplete {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        GetRawData getRawData = new GetRawData(this);
        getRawData.execute("http://10.0.2.2/index.php/registration/returnItemJson");
    }
    @Override
    public boolean onCreateOptionsMenu(Menu menu){
        //getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }
    @Override
    public boolean onOptionsItemSelected(MenuItem item){
        int id = item.getItemId();

        /*if(id == R.id.action_settings){
            return true;
        }*/
        return super.onOptionsItemSelected(item);
    }
    public void onDownloadComplete(String data, DownloadStatus status){
        if(status == DownloadStatus.OK){
            Log.d("Main:","data is "+data);
        }else{
            Log.e("Main","failed "+status);
        }
    }
}
