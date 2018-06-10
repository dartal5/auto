<?php namespace Run;

use Session\Session as Session;
use Main\Main as Main;

class Run
{
    static private $method = "POST";
    const STEPS = array('calc', 'form', 'code', 'paym', 'comp');


    static public function step(string $method, array $args)
    {


        $step = $args["step"];


        if($method !== Run::$method)
            throw new \Exception(" ___ Wrong method " . $method . " ___ " );
        if(!in_array($args["step"], Run::STEPS))
            throw new \Exception(" ___ Wrong step " . $step . " ___ " );


        if(!isset($_SESSION["order"]))
        {
            $_SESSION["order"] = new Main();
        }

        switch($step)
        {
            case 'calc': {
                return $_SESSION["order"]->calc($args);
            }
            case 'form': {
                return $_SESSION["order"]->form($args);
            }
            case 'code': {
                return $_SESSION["order"]->code($args);
            }
            case 'paym': {
                return $_SESSION["order"]->paym($args);
            }
            case 'comp': {
                return $_SESSION["order"]->comp($args);
            }
        }
    }
}