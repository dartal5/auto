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
        try {
            R::setup( 'mysql:host='.Database::$host.';dbname='.Database::$dbname, Database::$login, Database::$pass, "true" );
        }
        catch (\Exception $e) {
            try {
                R::selectDatabase('default');
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
        }

    }

    public static function getAllCars()
    {
        Database::connect();
        $res = R::getAll('select 
                              car.id, car.make, car.model, car.info, car.status, car.pic as picture,
                              class.type as class_type, transmission.type as tran_type, type.type as type, type.seats, fuel.type as fuel_type,
                              baseprice.coeff as base_coeff, class.coeff as class_coeff, transmission.coeff as transmission_coeff, type.coeff as type_coeff'
                              . Database::$from_all, []);
        Database::close();
        foreach ($res as $key=>$val)
        {
            $res[$key]["price"] = $val["base_coeff"] * $val["class_coeff"] * $val["transmission_coeff"] * $val["type_coeff"];
        }

        return $res;

    }

    public static function getCarPriceCoeffs($id)
    {
        Database::connect();
        $res  = R::getRow('select 
                              car.status, baseprice.coeff as base_coeff, class.coeff as class_coeff, transmission.coeff as transmission_coeff, type.coeff as type_coeff'
                              . Database::$from_all . '  where car.id = :id', [':id' => $id]);
        Database::close();
        return $res;
    }

    public static function getClient($id)
    {
        Database::connect();
        $res  = R::getRow('select client.name, client.surname, client.email, client.exp, client.expna, client.category, client.pass
                               from client
                               where client.id = :id', [':id' => $id]);
        Database::close();
        return $res;
    }

    public static function getClientByEmail($email) {
        Database::connect();
        $res  = R::getRow('select `id`, `name`, `surname`, `email`, `exp`, `expna`, `category`, `pass`
                               from client
                               where client.email = :email', [':email' => $email]);
        Database::close();
        return $res;
    }


    public static function addClient($name, $surname, $email, $exp, $expna, $category, $pass) {
        Database::connect();
        R::exec('INSERT INTO `client` (`name`, `surname`, `email`, `exp`, `expna`, `category`, `pass`) 
                      VALUES (:name, :surname, :email, :exp, :expna, :category, :pass)',
                     [":name" => $name, ":surname" => $surname, ":email" => $email, ":exp" => $exp, ":expna" => $expna, ":category" => $category, ":pass" => $pass]);
        Database::close();
    }

    public static function changeCarStatus($id, $status)
    {
        Database::connect();
        R::getRow('UPDATE car
                        SET status = :status
                        WHERE id = :id;', ['status' => $status, ':id' => $id]);
        Database::close();
    }

    public static function addOrder($client_id, $f, $t)
    {
        Database::connect();
        R::exec('INSERT INTO `car_client` (`client_id`, `from_date`, `to_date`) 
                      VALUES (:client_id, :fd, :td)',
                      [":client_id" => $client_id, ":fd" => $f, ":td" => $t]);
        Database::close();
    }


}