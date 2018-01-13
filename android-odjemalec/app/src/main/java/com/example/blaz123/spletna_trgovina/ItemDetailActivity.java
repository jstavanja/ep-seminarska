package com.example.blaz123.spletna_trgovina;

import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.widget.TextView;

public class ItemDetailActivity extends BaseActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_item_detail);
        activateToolbar(true);
        Intent intent = getIntent();
        Item item = (Item) intent.getExtras().getSerializable(ITEM_TRANSFER);
        if(item != null){
            TextView itemName = (TextView) findViewById(R.id.nameDetail);
            itemName.setText("Ime: "+item.getName());

            TextView itemTag = (TextView) findViewById(R.id.tagDetail);
            itemTag.setText("Oznaka: "+item.getTag());

            TextView itemPrice = (TextView) findViewById(R.id.priceDetail);
            itemPrice.setText("Cena: "+item.getPrice()+"€");

            TextView itemDescription = (TextView) findViewById(R.id.description);
            itemDescription.setText("Opis: "+item.getDescription());
        }
    }

}
