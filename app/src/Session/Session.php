<?php namespace Session;

class Session
{
    /*
     * start browser session
     */
    static public function start()
    {
        session_start();
        /*
         * regenerate to prevent session hack
         */
        session_regenerate_id();
    }

    /*
     * destroy session
     */
    static public function destroy()
    {
        session_destroy();
    }
}