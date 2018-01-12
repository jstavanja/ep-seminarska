package com.example.blaz123.spletna_trgovina;

/**
 * Created by blaz123 on 11.1.2018.
 */

public class Item {
    private String mName;
    private String mDescription;
    private String mPrice;
    private String mTag;

    public Item(String mName, String mDescription, String mPrice, String mTag){
        this.mName = mName;
        this.mDescription = mDescription;
        this.mPrice = mPrice;
        this.mTag = mTag;
    }

    public String getName(){
        return mName;
    }
    public String getDescription(){
        return mDescription;
    }
    public String getPrice(){
        return mPrice;
    }
    public String getTag(){
        return mTag;
    }

    @Override
    public String toString() {
        return "Item{" +
                "mName='" + mName + '\'' +
                ", mDescription='" + mDescription + '\'' +
                ", mPrice='" + mPrice + '\'' +
                ", mTag='" + mTag + '\'' +
                '}';
    }
}
