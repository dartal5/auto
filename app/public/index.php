<?php
require __DIR__ . '/../vendor/autoload.php';

switch($_GET["action"])
{
    case "getAllCars": {
        exit(json_encode(\Database\Database::getAllCars()));
    }
}

\Run\Run::step($_POST);
