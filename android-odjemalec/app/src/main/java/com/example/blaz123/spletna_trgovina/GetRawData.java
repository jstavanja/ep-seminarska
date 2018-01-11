package com.example.blaz123.spletna_trgovina;

import android.nfc.Tag;
import android.os.AsyncTask;
import android.util.Log;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

enum DownloadStatus { IDLE, PROCESSING, NOT_INITIALISED, FAILED_OR_EMPTY, OK }

/**
 * Created by blaz123 on 11.1.2018. Class for retrieving json
 */

public class GetRawData extends AsyncTask<String,Void,String> {
    private DownloadStatus mDownloadStatus;
    private final OnDownloadComplete mCallback;

    interface OnDownloadComplete {
        void onDownloadComplete(String data, DownloadStatus status);
    }

    public GetRawData(OnDownloadComplete callback){
        this.mDownloadStatus = DownloadStatus.IDLE;
        mCallback = callback;
    }
    @Override
    protected void onPostExecute(String s){
        if(mCallback != null){
            mCallback.onDownloadComplete(s, mDownloadStatus);
        }
    }
    @Override
    protected String doInBackground(String... strings){
        HttpURLConnection connection = null;
        BufferedReader reader = null;

        if(strings == null){
            mDownloadStatus = DownloadStatus.NOT_INITIALISED;
            return null;
        }

        mDownloadStatus = DownloadStatus.PROCESSING;

        try {
            URL url = new URL(strings[0]);

            connection = (HttpURLConnection) url.openConnection();
            connection.setRequestMethod("GET");
            connection.setDoInput(true);
            connection.setDoOutput(true);
            connection.connect();

            int response = connection.getResponseCode();
            Log.d("TAG", "Response code "+response);
            StringBuilder result = new StringBuilder();

            reader = new BufferedReader(new InputStreamReader(connection.getInputStream()));

            String line;
            while(null != (line = reader.readLine())){
                result.append(line).append("\n");
            }
            mDownloadStatus = DownloadStatus.OK;
            Log.d("TAG","result "+result.toString());
            return result.toString();

        }catch (MalformedURLException e){
            Log.e("TAG","Invalid URL");
        }catch (IOException e){
            Log.e("TAG","IO exception reading data");
        }finally {
            if(connection != null){
                connection.disconnect();
            }
            if(reader != null){
                try{
                    reader.close();
                }catch(IOException e){
                    Log.e("TAG","Error closing stream");
                }
            }
        }
        mDownloadStatus = DownloadStatus.FAILED_OR_EMPTY;
        return null;
    }
}
