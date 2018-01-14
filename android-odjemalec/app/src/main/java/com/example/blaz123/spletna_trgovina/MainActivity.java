package com.example.blaz123.spletna_trgovina;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.List;

import static com.example.blaz123.spletna_trgovina.BaseActivity.ITEM_TRANSFER;

public class MainActivity extends AppCompatActivity implements GetJsonData.OnDataAvailable,
                        RecyclerItemClickListener.OnRecyclerClickListener{
    private RecyclerViewAdapter mRecyclerViewAdapter;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        RecyclerView recyclerView = (RecyclerView) findViewById(R.id.recycler_view);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        recyclerView.addOnItemTouchListener(new RecyclerItemClickListener(this,recyclerView,this));

        mRecyclerViewAdapter = new RecyclerViewAdapter(new ArrayList<Item>(),this);
        recyclerView.setAdapter(mRecyclerViewAdapter);
    }
    @Override
    protected void onResume(){
        super.onResume();
        GetJsonData getJsonData = new GetJsonData(this,"http://10.0.2.2/index.php/item/getAllItemsJSON");
        //getJsonData.executeOnSameThread();
        getJsonData.execute();
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
    public void onDataAvailable(List<Item> data, DownloadStatus status){
        if(status == DownloadStatus.OK){
            mRecyclerViewAdapter.loadNewData(data);
            Log.d("Main:","data is "+data);
        }else{
            Log.e("Main","failed "+status);
        }
    }
    @Override
    public void onItemClick(View view, int position){
        Intent intent = new Intent(this, ItemDetailActivity.class);
        intent.putExtra(ITEM_TRANSFER, mRecyclerViewAdapter.getItem(position) );
        startActivity(intent);
    }
}
