package com.example.blaz123.spletna_trgovina;

import android.content.Context;
import android.support.v4.view.GestureDetectorCompat;
import android.support.v7.widget.RecyclerView;
import android.view.GestureDetector;
import android.view.MotionEvent;
import android.view.View;

/**
 * Created by blaz123 on 13.1.2018.
 */

public class RecyclerItemClickListener extends RecyclerView.SimpleOnItemTouchListener {

    interface OnRecyclerClickListener {
        void onItemClick(View view, int position);
    }

    private final OnRecyclerClickListener mListener;
    private final GestureDetectorCompat mGestureDetector;

    public RecyclerItemClickListener(Context context, final RecyclerView recycleView, final OnRecyclerClickListener mListener) {
        this.mListener = mListener;
        mGestureDetector = new GestureDetectorCompat(context, new GestureDetector.SimpleOnGestureListener(){
            @Override
            public boolean onSingleTapUp(MotionEvent e) {
                View childView = recycleView.findChildViewUnder(e.getX(), e.getY());
                if(childView != null && mListener != null){
                    mListener.onItemClick(childView, recycleView.getChildAdapterPosition(childView));
                }
                return true;
            }
        });

    }

    @Override
    public boolean onInterceptTouchEvent(RecyclerView rv, MotionEvent e) {
        if (mGestureDetector != null) {
            boolean result = mGestureDetector.onTouchEvent(e);
            return result;
        }else {
            return false;
        }
    }
}
