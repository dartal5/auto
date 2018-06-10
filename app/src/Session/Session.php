<?php namespace Session;

class Session
{
    static public function start()
    {
        ini_set('session.use_only_cookies', TRUE );
        ini_set('session.use_trans_sid', FALSE );

        session_start();
        session_regenerate_id();
    }

    static public function destroy()
    {
        session_destroy();
    }
}