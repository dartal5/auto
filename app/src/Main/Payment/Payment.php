<?php namespace Payment;

class Payment
{
    /*
     * Liqpay script info
     * for frontend
     */
    static public function set($price)
    {
        try {
            if(!preg_match("([1-9][0-9]*)", $price))
                throw new \Exception("___ Wrong price " . $price . " ___");
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

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