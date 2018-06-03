<?php namespace Run;

use Session\Session as Session;

class Run
{
    static private $method = "POST";
    static public function step(string $method, array $args)
    {
        Session::start();
        if($method !== Run::$method)
            throw new \Exception(" ___ Wrong method " . $method . " ___ " );
    }
}