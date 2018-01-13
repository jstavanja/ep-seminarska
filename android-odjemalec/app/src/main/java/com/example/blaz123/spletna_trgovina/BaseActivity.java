package com.example.blaz123.spletna_trgovina;

import android.support.v7.app.ActionBar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;

/**
 * Created by blaz123 on 13.1.2018.
 */

public class BaseActivity extends AppCompatActivity{
    static final String ITEM_TRANSFER = "ITEM_TRANSFER";

    void activateToolbar(boolean enableHome){
        ActionBar actionBar = getSupportActionBar();
        if (actionBar == null){
            Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);

            if(toolbar != null){
                setSupportActionBar(toolbar);
                actionBar = getSupportActionBar();
            }
        }
        if(actionBar != null){
            actionBar.setDisplayHomeAsUpEnabled(enableHome);
        }
    }
}
