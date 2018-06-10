<?php namespace Calculator;

use Database\Database as Db;

class Calculator
{
    private $data;

    function __construct(array $args)
    {
        $this->set($args);
    }

    public function set(array $args)
    {
        $id = $args["id"];
        $term = $args["term"];

        if(!preg_match("(0|[1-9][0-9]*)", $term)) throw new \InvalidArgumentException("___ Wrong term " . $term . " ___");

        Db::connect();
        $data = Db::getCarPriceCoeffs($id);
        if($data === false) throw new \InvalidArgumentException("___ Wrong id " . $id . " ___");
        if($data["status"] == 0) throw new \InvalidArgumentException("___ Auto is unavaliable  ___");

        $this->data = $data;
        $this->data["id"] = $id;
        $this->data["term"] = $term;
        $this->data["price"] = $data["base_coeff"] * $data["class_coeff"] * $data["transmission_coeff"] * $data["type_coeff"] * $term;
    }

    public function getData()
    {
        return $this->data;
    }
}