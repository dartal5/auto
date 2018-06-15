<?php namespace Code;

use Mail\Mail as Mail;

class Code
{
    const LENGTH = 6;
    const ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

    private $code;

    public function __construct($email)
    {
        $this->set($email);
    }

    public function set($email) {
        try {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                throw new \Exception("___ Wrong email " . $email . " ___");
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        $this->code = substr(str_shuffle(Code::ALPHABET), 0, Code::LENGTH);
        Mail::sendCode($email, $this->code);
    }

    public function getData(array $args)
    {
        $code = $args["code"];
        return $this->code === $code;
    }

}