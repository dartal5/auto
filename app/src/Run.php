<?php namespace Run;

use Main\Main as Main;
use Database\Database as Db;

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
                $res = $_SESSION["order"]->calc($args);
                break;
            }
            case 'form': {
                $res = $_SESSION["order"]->form($args);
                break;
            }
            case 'code': {
                $res = $_SESSION["order"]->code($args);
                break;
            }
            case 'paym': {
                $res = $_SESSION["order"]->paym();
                break;
            }
            case 'comp': {
                $res = $_SESSION["order"]->comp($args);
                \Session\Session::destroy();
                break;
            }
        }
        return $res;
    }

}