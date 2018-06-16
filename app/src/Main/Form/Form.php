<?php namespace Form;

use Database\Database as Db;
use Session\Session;

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
            $data = Db::getClient($args["id"]);

            $this->data["userId"] = $args["id"];
            $this->data["name"] = $data["name"];
            $this->data["surname"] = $data["name"];
            $this->data["email"] = $data["email"];
            $this->data["exp"] = $data["exp"];
            $this->data["expna"] = $data["expna"];
            $this->data["category"] = $data["category"];
        } catch(\Exception $e) {
            exit($e->getMessage());
        }

        /*
            $name = $args["name"];
            $surname= $args["surname"];
            $email = $args["email"];
            $exp = $args["exp"];
            $expna = $args["expna"];
            $category = $args["category"];
          try {
            if(empty($name))
                throw new \Exception("___ Empty name " . $name . " ___");
            if(empty($surname))
                throw new \Exception("___ Empty surname " . $surname . " ___");
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                throw new \Exception("___ Wrong email " . $email . " ___");
            if(!preg_match("(0|[1-9][0-9]*)", $exp))
                throw new \Exception("___ Wrong exp " . $exp . " ___");
            if(!preg_match("(0|[1-9][0-9]*)", $expna))
                throw new \Exception("___ Wrong expna " . $expna . " ___");
            if($expna > $exp)
                throw new \Exception("___ expna > exp " . $expna . " " . $exp . " ___");
            if(!in_array($category, array("A", "B", "C", "D")) )
                throw new \Exception("___ Wrong category " . $category . " ___");
        } catch(\Exception $e) {
            exit($e->getMessage());
        }
        */
    }

    public function getData()
    {
        return $this->data;
    }
}