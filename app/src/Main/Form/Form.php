<?php namespace Form;

class Form
{
    private $data;

    function __construct(array $args)
    {
        $this->set($args);
    }

    public function set($args)
    {
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

        $this->data["name"] = $name;
        $this->data["surname"] = $surname;
        $this->data["email"] = $email;
        $this->data["exp"] = $exp;
        $this->data["expna"] = $expna;
        $this->data["category"] = $category;
    }

    public function getData()
    {
        return $this->data;
    }
}