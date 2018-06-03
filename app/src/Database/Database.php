<?php namespace Database;

use RedBeanPHP\R as R;

class Database
{
    private static $host = 'localhost';
    private static $dbname = 'auto';
    private static $login = 'root';
    private static $pass = '';

    public static function connect()
    {
        R::setup( 'mysql:host='.Database::$host.';dbname='.Database::$dbname, Database::$login, Database::$pass );
    }

    public static function getCar($id)
    {
        return R::getRow('select 
                                car.make, car.model, car.info, car.status,
                                class.type, transmission.type, type.type, type.seats_from, type.seats_to, fuel.type,
                                baseprice.coeff as base_coeff, class.coeff as class_coeff, transmission.coeff as transmission_coeff, type.coeff as type_coeff
                                from car 
                                inner join class on car.class_id = class.id 
                                inner join transmission on car.transmission_id = transmission.id 
                                inner join type on car.type_id = type.id
                                inner join fuel on car.fuel_id = fuel.id
                                cross join baseprice 
                                where car.id = :id', [':id' => $id]);
    }
}