<?php namespace Form;

use Database\Database as Db;
use Session\Session;

/*
 * class that saves client information
 * and throw exception if not logged in
 */
class Form
{
    private $data;

    function __construct(array $args)
    {
        $this->set($args);
    }

    public function set($args)
    {
        try {
            /*
             * try to get client with such id
             */
            $data = Db::getClient($args["id"]);

            $this->data["userId"] = $args["id"];
            $this->data["name"] = $data["name"];
            $this->data["surname"] = $data["name"];
            $this->data["email"] = $data["email"];
            $this->data["exp"] = $data["exp"];
            $this->data["expna"] = $data["expna"];
            $this->data["category"] = $data["category"];
        } catch(\Exception $e) {
            exit(["status" => 0, "messages" => ["You are not logged in"]]);
        }
    }

    public function getData()
    {
        return $this->data;
    }
}