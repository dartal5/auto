<?php
require __DIR__ . '/../vendor/autoload.php';

\Session\Session::start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
    switch ($_GET["action"]) {
        case "getAllCars": {
            exit(json_encode(\Database\Database::getAllCars()));
        }
        case "getCarHistory": {
            exit(json_encode(\Database\Database::getHistory($_GET["id"])));
        }
        case "getCarHistoryExtend": {
            exit(json_encode(\Database\Database::getHistoryExtend($_GET["id"])));
        }
    }
}

echo json_encode(\Login\Login::register(["name" => "alex", "surname" => "dym", "email" => "abcd@abcd.com", "exp" => 3, "expna" => 2, "category" => "B", "pass" => "abcdabcd"]));

if($_SERVER["REQUEST_METHOD"] == "POST") {
    switch($_POST["action"]) {
        case "step": {
            exit(json_encode(\Run\Run::step($_POST)));
        }
        case "register": {
            exit(json_encode(\Login\Login::register($_POST)));
        }
        case "login": {
            exit(json_encode(\Login\Login::login($_POST)));
        }
        case "logout": {
            exit(json_encode(\Login\Login::logout()));
        }
    }
}

