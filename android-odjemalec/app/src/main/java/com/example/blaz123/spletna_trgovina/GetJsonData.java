package com.example.blaz123.spletna_trgovina;

import android.net.Uri;
import android.os.AsyncTask;
import android.util.Log;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by blaz123 on 11.1.2018.
 */

public class GetJsonData extends AsyncTask<String,Void,List<Item>> implements GetRawData.OnDownloadComplete {
    private static final String TAG = "GetJsonData";

    private List<Item> mItemList = null;
    private String mBaseURL;;

    private final OnDataAvailable mCallBack;
    private boolean runningOnSameThread = false;

    interface  OnDataAvailable {
        void onDataAvailable(List<Item> data, DownloadStatus status);
    }

    public GetJsonData(OnDataAvailable mCallBack, String mBaseURL) {
        Log.d(TAG, "GetJsonData called");
        this.mBaseURL = mBaseURL;
        this.mCallBack = mCallBack;
    }

    void executeOnSameThread(){
        runningOnSameThread = true;
        String destinationUri = createUri();
        GetRawData getRawData = new GetRawData(this);
        getRawData.execute(destinationUri);
    }

    @Override
    protected void onPostExecute(List<Item> items) {
        if(mCallBack != null){
            mCallBack.onDataAvailable(mItemList,DownloadStatus.OK);
        }
    }

    @Override
    protected List<Item> doInBackground(String... params) {
        Log.d("Start","doInBackground starts");
        String destinationURI = createUri();

        GetRawData getRawData = new GetRawData(this);
        getRawData.runInSameThread(destinationURI);
        return mItemList;
    }

    private String createUri(){
        return Uri.parse(mBaseURL).buildUpon().build().toString();
    }

    @Override
    public void onDownloadComplete(String data, DownloadStatus status){
        if(status == DownloadStatus.OK){
            mItemList = new ArrayList<>();
            try{
                JSONObject jsonData = new JSONObject(data);
                JSONArray itemsArray = jsonData.getJSONArray("items");

                for(int i=0; i < itemsArray.length(); i++){
                    JSONObject jsonItem = itemsArray.getJSONObject(i);
                    String name = jsonItem.getString("name");
                    String description = jsonItem.getString("description");
                    String price = jsonItem.getString("price");
                    String tag = jsonItem.getString("tag");
                    Item itemObject = new Item(name,description,price,tag);
                    Log.d("JSON:","objekt: "+itemObject);
                    mItemList.add(itemObject);
                }
            }catch(JSONException jsonerror){
                jsonerror.printStackTrace();
                status = DownloadStatus.FAILED_OR_EMPTY;
            }
        }
        if(runningOnSameThread && mCallBack != null){
            //processing is done
            mCallBack.onDataAvailable(mItemList,status);

        }
    }
}
