<?php namespace Run;

use Main\Main as Main;

class Run
{

    /*
     * method to order car
     */
    static public function step(array $args)
    {
        $step = $args["step"];

        $userOrder = "order";

        if(!isset($_SESSION[$userOrder]))
        {
            $_SESSION[$userOrder] = new Main();
        }

        /*
         * 5 steps of ordering
         */
        try {
            switch($step)
            {
                /*
                 * calculate price
                 */
                case 'calc': {
                    $res = $_SESSION[$userOrder]->calc($args);
                    break;
                }
                /*
                 * save client info
                 */
                case 'form': {
                    $res = $_SESSION[$userOrder]->form(["id" => $_SESSION["userId"]]);
                    break;
                }
                /*
                 * send confirm code and check it
                 */
                case 'code': {
                    $res = $_SESSION[$userOrder]->code($args);
                    break;
                }
                /*
                 * get payment script config
                 */
                case 'paym': {
                    $res = $_SESSION[$userOrder]->paym();
                    break;
                }
                /*
                 * redirect to complete page
                 */
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