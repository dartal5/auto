<?php
require __DIR__ . '/../vendor/autoload.php';

switch($_GET["action"]) {
    case "step": {
        break;
    }


    case "getAllCars": {
        exit(json_encode(\Database\Database::getAllCars()));
    }
}

