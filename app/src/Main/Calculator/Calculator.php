<?php namespace Calculator;

use Database\Database as Db;


/*
 * class that count price of car. Validate and saves dates and car id. Count term of using in days
 */
class Calculator
{
    private $data;

    function __construct(array $args)
    {
        $this->set($args);
    }

    /*
     * actual construct function
     */
    public function set(array $args)
    {
        $id = $args["id"];
        $dateFrom = \DateTime::createFromFormat("Y-m-d", $args["dateFrom"]);
        $dateTo = \DateTime::createFromFormat("Y-m-d", $args["dateTo"]);

        /*
         * input validation
         */
        try {
            if($dateFrom == false )
                throw new \Exception("___ Wrong dateFrom " .  $dateFrom->format('Y-m-d') . "  ___");
             if($dateTo == false )
                 throw new \Exception("___ Wrong dateTo " .  $dateTo->format('Y-m-d') . "  ___");
            if($dateFrom > $dateTo)
                throw new \Exception("___ dateFrom " . $dateFrom->format('Y-m-d') ."can`t be bigger than dateTo " . $dateTo->format('Y-m-d') ." ___" );
            if($dateFrom < \DateTime::createFromFormat("Y-m-d", (new \DateTime())->format("Y-m-d")))
                throw new \Exception("___ dateFrom " . $dateFrom->format('Y-m-d' ." is less than NOW ___") );

            /*
             * check if such id exist
             */
            $data = Db::getCarPriceCoeffs($id);
            if($data === false)
                throw new \Exception("___ Wrong id " . $id . " ___");
            if($data["status"] == 0)
                throw new \Exception("___ Auto is unavaliable  ___");
        }
        catch (\Exception $e) {
            exit($e->getMessage());
        }


        $this->data = $data;
        $this->data["id"] = $id;
        $this->data["dateFrom"] = $dateFrom->format('Y-m-d');
        $this->data["dateTo"] = $dateTo->format('Y-m-d');
        $this->data["term"] = $dateFrom->diff($dateTo)->format("%d");

        /*
         * price is a linear combination of coeffs
         */
        $this->data["price"] = $data["base_coeff"] * $data["class_coeff"] * $data["transmission_coeff"] * $data["type_coeff"] * $this->data["term"];

    }

    /*
     * return calc data
     */
    public function getData()
    {
        return $this->data;
    }
}