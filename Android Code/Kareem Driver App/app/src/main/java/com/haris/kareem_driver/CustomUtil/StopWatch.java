package com.haris.kareem_driver.CustomUtil;

import android.os.Handler;

/**
 * Created by essam on 3/22/16.
 */
public class StopWatch {

    public interface StopWatchListener {
        public void onTick(String time);
    }

    private long startTime = 0;
    private boolean running = false;
    private long currentTime = 0;


    public StopWatch() {

    }

    public StopWatch(StopWatchListener listener) {
        this.listener = listener;
    }

    public void start() {
        this.startTime = System.currentTimeMillis();
        this.running = true;
        final Handler handler = new Handler();
        handler.post(new Runnable() {
            @Override
            public void run() {
                //lock to access running
                synchronized (StopWatch.this) {
                    if (running) {
                        if (listener != null)
                            listener.onTick(StopWatch.this.toString(false,true,false));
                        handler.postDelayed(this, 1000);
                    }
                }
            }
        });

    }

    /**
     * Overload
     * <p/>
     * Starts the stopwatch from an offset
     *
     * @param offset The offset in milli seconds
     */
    public void start(long offset) {
        stop();
        this.startTime = System.currentTimeMillis() - offset;
        this.running = true;
        final Handler handler = new Handler();
        handler.post(new Runnable() {
            @Override
            public void run() {
                //lock to access running
                synchronized (StopWatch.this) {
                    if (running) {
                        if (listener != null)
                            listener.onTick(StopWatch.this.toString());
                        handler.postDelayed(this, 1000);
                    }
                }
            }
        });
    }

    public synchronized void stop() {
        this.running = false;
    }

    public void restart() {
        this.stop();
        this.start();
    }

    public synchronized void pause() {
        if (!isRunning()) return;
        this.running = false;
        currentTime = System.currentTimeMillis() - startTime;
    }

    public void resume() {
        if (running) return;
        synchronized (StopWatch.this) {
            this.running = true;
            this.startTime = System.currentTimeMillis() - currentTime;
        }
        final Handler handler = new Handler();
        handler.post(new Runnable() {
            @Override
            public void run() {
                if (running) {
                    if (listener != null)
                        listener.onTick(StopWatch.this.toString());
                    handler.postDelayed(this, 1000);
                }
            }
        });
    }

    //elaspsed time in milliseconds
    public long getElapsedTimeMili() {
        long elapsed = 0;
        if (running) {
            elapsed = ((System.currentTimeMillis() - startTime) / 100) % 1000;
        }
        return elapsed;
    }

    //elaspsed time in seconds
    public long getElapsedTimeSecs() {
        long elapsed = 0;
        if (running) {
            elapsed = ((System.currentTimeMillis() - startTime) / 1000) % 60;
        }
        return elapsed;
    }

    //elaspsed time in minutes
    public long getElapsedTimeMin() {
        long elapsed = 0;
        if (running) {
            elapsed = (((System.currentTimeMillis() - startTime) / 1000) / 60) % 60;
        }
        return elapsed;
    }

    //elaspsed time in hours
    public long getElapsedTimeHour() {
        long elapsed = 0;
        if (running) {
            elapsed = ((((System.currentTimeMillis() - startTime) / 1000) / 60) / 60);
        }
        return elapsed;
    }

    public String toString() {
        return padZero(getElapsedTimeHour()) + ":" + padZero(getElapsedTimeMin()) + ":"
                + padZero(getElapsedTimeSecs());
    }

    public String toString(boolean isHour , boolean isMin , boolean isSec) {
        String result="0.0";

        if (isHour){
            return padZero(getElapsedTimeHour());
        }
        else if (isMin){
            return padZero(getElapsedTimeMin());
        }
        else if (isSec){
            return padZero(getElapsedTimeSecs());
        }

        return result;
    }

    public long getTotalTimeElapsed() {
        return (getElapsedTimeHour() * 60 * 60 + getElapsedTimeMin() * 60 + getElapsedTimeSecs()) * 1000;
    }

    public boolean isRunning() {
        return running;
    }

    public void setListener(StopWatchListener listener) {
        this.listener = listener;
    }

    private String padZero(long time) {
        if (time < 10)
            return "0" + time;
        return String.valueOf(time);
    }

    private StopWatchListener listener = null;

}