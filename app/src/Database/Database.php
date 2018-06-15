<?php namespace Database;

use RedBeanPHP\R as R;

class Database
{
    private static $host = 'localhost';
    private static $dbname = 'auto';
    private static $login = 'root';
    private static $pass = '';


    private static $from_all = ' from car 
                         inner join class on car.class_id = class.id 
                         inner join transmission on car.transmission_id = transmission.id 
                         inner join type on car.type_id = type.id
                         inner join fuel on car.fuel_id = fuel.id
                         cross join baseprice ';

    public static function close()
    {
        R::close();
    }

    public static function connect()
    {
        R::setup( 'mysql:host='.Database::$host.';dbname='.Database::$dbname, Database::$login, Database::$pass, "true" );
    }

    public static function getAllCars()
    {
        $res = R::getAll('select 
                              car.id, car.make, car.model, car.info, car.status, car.pic as picture,
                              class.type as class_type, transmission.type as tran_type, type.type as type, type.seats, fuel.type as fuel_type,
                              baseprice.coeff as base_coeff, class.coeff as class_coeff, transmission.coeff as transmission_coeff, type.coeff as type_coeff'
                              . Database::$from_all, []);
        foreach ($res as $key=>$val)
        {
            $res[$key]["price"] = $val["base_coeff"] * $val["class_coeff"] * $val["transmission_coeff"] * $val["type_coeff"];
        }
        return $res;

    }

    public static function getCar($id)
    {
        $res = R::getRow('select 
                              car.id, car.make, car.model, car.info, car.status, car.pic as picture,
                              class.type as class_type, transmission.type as tran_type, type.type as type, type.seats_from, fuel.type as fuel_type,
                              baseprice.coeff as base_coeff, class.coeff as class_coeff, transmission.coeff as transmission_coeff, type.coeff as type_coeff'
                              . Database::$from_all . 'where car.id = :id', [':id' => $id]);
        $res["price"] = $res["base_coeff"] * $res["class_coeff"] * $res["transmission_coeff"] * $res["type_coeff"];
        return $res;
    }

    public static function getCarPriceCoeffs($id)
    {
        return R::getRow('select 
                              car.status, baseprice.coeff as base_coeff, class.coeff as class_coeff, transmission.coeff as transmission_coeff, type.coeff as type_coeff'
                              . Database::$from_all . '  where car.id = :id', [':id' => $id]);
    }

    public static function changeCarStatus($id, $status)
    {
        return R::getRow('UPDATE car
                              SET status = :status
                              WHERE id = :id;', ['status' => $status, ':id' => $id]);
    }

    public static function addOrder($name, $surname, $email, $exp, $expna, $category, $f, $t)
    {
        return R::exec('INSERT INTO `car_client` (`name`, `surname`, `email`, `exp`, `expna`, `category`, `from_date`, `to_date`) 
                            VALUES (:n, :s, :e, :ex, :en, :c, :fd, :td)',
            [":n" => $name, ":s" => $surname, ':e' => $email, ":ex" => $exp, ":en" => $expna, ":c" => $category, ":fd" => $f, ":td" => $t]);
    }
}