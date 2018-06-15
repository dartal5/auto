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
        $data_from = $args["data_from"];
        $data_to = $args["data_to"];

        if(valida) throw new \Exception("___ Wrong term " . $term . " ___");

        Db::connect();
        $data = Db::getCarPriceCoeffs($id);

        if($data === false) throw new \Exception("___ Wrong id " . $id . " ___");
        if($data["status"] == 0) throw new \Exception("___ Auto is unavaliable  ___");

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