<?php namespace Calculator;

use Database\Database as Db;

class Calculator
{
    private $info;

    function __construct(array $args)
    {
        $id = $args["id"];
        $term = $args["term"];

        if(!preg_match("(0|[1-9][0-9]*)", $term)) throw new \Exception("___ Wrong term " . $term . " ___");

        Db::connect();
        $info = Db::getCar($id);
        if($info === false) throw new \Exception("___ Wrong id " . $id . " ___");

        $this->info = $info;
        $this->info["term"] = $term;
        $this->info["price"] = $info["base_coeff"] * $info["class_coeff"] * $info["transmission_coeff"] * $info["type_coeff"] * $term;
    }

    public function getInfo() : array
    {
        return $this->info;
    }
}