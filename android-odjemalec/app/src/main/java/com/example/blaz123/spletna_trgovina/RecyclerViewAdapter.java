package com.example.blaz123.spletna_trgovina;

import android.content.Context;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by blaz123 on 13.1.2018.
 */

public class RecyclerViewAdapter extends RecyclerView.Adapter<RecyclerViewAdapter.ItemViewHolder> {
    private List<Item> mItemList;
    private Context mContext;

    public RecyclerViewAdapter(List<Item> mItemList, Context mContext) {
        this.mItemList = mItemList;
        this.mContext = mContext;
    }

    @Override
    public ItemViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        //called by the layout manager when it needs a new view
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.browse, parent, false);
        return new ItemViewHolder(view);
    }

    @Override
    public void onBindViewHolder(ItemViewHolder holder, int position) {
        Item item = mItemList.get(position);
        holder.name.setText(item.getName());
        holder.price.setText(item.getPrice());
        holder.tag.setText(item.getTag());
    }

    @Override
    public int getItemCount() {
        return ((mItemList != null) && (mItemList.size() != 0) ? mItemList.size() : 0);
    }
    void loadNewData(List<Item> newItems){
        mItemList = newItems;
        notifyDataSetChanged();
    }
    public Item getItem(int position) {
        return ((mItemList != null) && (mItemList.size() !=0) ? mItemList.get(position) : null);
    }

    static class ItemViewHolder extends RecyclerView.ViewHolder {
        TextView name = null;
        TextView tag = null;
        TextView price = null;

        public ItemViewHolder(View itemView){
            super(itemView);
            this.name = (TextView) itemView.findViewById(R.id.name);
            this.tag = (TextView) itemView.findViewById(R.id.tag);
            this.price = (TextView) itemView.findViewById(R.id.price);

        }
    }
}
