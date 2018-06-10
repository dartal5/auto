<?php namespace Payment;

class Payment
{
    static public function set($price)
    {
        if(!isset($price)) throw new \Exception("___ Wrong price " . $price . " ___");
        if(empty($price)) throw new \Exception("___ Wrong price " . $price . " ___");

        if(!preg_match("(0|[1-9][0-9]*)", $price)) throw new \InvalidArgumentException("___ Wrong price " . $price . " ___");

        $private_key = 'privatekey';
        $public_key = 'publickey';

        $data  = base64_encode(json_encode(array(
            'public_key' => $public_key,
            'version' => '3',
            'action'  => 'pay',
            'amount' => $price,
            'currency' => 'UAH',
            'description' => " Payment for car",
            'sandbox' => '1')));


        $signature  = base64_encode( sha1($private_key . $data . $private_key, 1 ));
        return json_encode(array("data" => $data, "signature" => $signature));
    }
}