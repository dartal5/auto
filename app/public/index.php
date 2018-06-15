<?php
require __DIR__ . '/../vendor/autoload.php';

switch($_GET["action"]) {
    case "step": {
        break;
    }


    case "getAllCars": {
        \Database\Database::connect();
        $res = json_encode(\Database\Database::getAllCars());
        \Database\Database::close();
        exit($res);
    }
}

