<?php namespace Session;

class Session
{
    static public function start()
    {
        session_start();
        session_regenerate_id();
    }

    static public function destroy()
    {
        session_destroy();
    }
}