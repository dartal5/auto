<?php namespace Code;

use Mail\Mail as Mail;

/*
 * class that creates and checks confirm code
 */
class Code
{
    /*
     * code length
     */
    const LENGTH = 6;
    /*
     * code chars
     */
    const ALPHABET = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    private $code;

    public $except = false;

    public function __construct($email)
    {
        $this->set($email);
    }

    public function set($email) {
        /*
         * email validation
         */
        try {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                throw new \Exception("___ Wrong email " . $email . " ___");
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        /*
         * create code
         */
        $this->code = substr(str_shuffle(Code::ALPHABET), 0, Code::LENGTH);

        /*
         * sends code on email
         */
        Mail::sendCode($email, $this->code);
    }

    /*
     * check if input code equ to actual code
     */
    public function getData(array $args)
    {
        $code = $args["code"];
        $this->except = $this->code === $code;
        return $this->except ;
    }

}