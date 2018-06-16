<?php namespace Run;

use Main\Main as Main;

class Run
{
    static public function step(array $args)
    {
        $step = $args["step"];

        $userOrder = "order";

        if(!isset($_SESSION[$userOrder]))
        {
            $_SESSION[$userOrder] = new Main();
        }

        try {
            switch($step)
            {
                case 'calc': {
                    $res = $_SESSION[$userOrder]->calc($args);
                    break;
                }
                case 'form': {
                    $res = $_SESSION[$userOrder]->form(["id" => $_SESSION["userId"]]);
                    break;
                }
                case 'code': {
                    $res = $_SESSION[$userOrder]->code($args);
                    break;
                }
                case 'paym': {
                    $res = $_SESSION[$userOrder]->paym();
                    break;
                }
                case 'comp': {
                    $res = $_SESSION[$userOrder]->comp($args);
                    break;
                }
                default: {
                    throw new \Exception(" ___ Wrong step " . $step . " ___ " );
                }
            }
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return $res;
    }

}