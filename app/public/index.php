<?php
require __DIR__ . '/../vendor/autoload.php';


if($_SERVER["REQUEST_METHOD"] == "GET") {
    switch ($_GET["action"]) {
        case "getAllCars":
            {
                exit(json_encode(\Database\Database::getAllCars()));
            }
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    \Run\Run::step($_POST);
}

