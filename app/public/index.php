<?php
require __DIR__ . '/../vendor/autoload.php';

\Session\Session::start();

if($_SERVER["REQUEST_METHOD"] == "GET") {

    switch ($_GET["action"]) {
        case "getAllCars": {
            exit(json_encode(\Database\Database::getAllCars()));
            break;
        }
        case "getCarHistory": {
            exit(json_encode(\Database\Database::getHistory($_SESSION["userId"])));
            break;
        }
        case "getCarHistoryExtend": {
            exit(json_encode(\Database\Database::getHistoryExtend($_SESSION["userId"])));
            break;
        }
    }
}

//echo json_encode(\Login\Login::register(["name" => "alex", "surname" => "dym", "email" => "abcd@abcd.com", "exp" => 3, "expna" => 2, "category" => "B", "pass" => "abcdabcd"]));
//echo json_encode(\Login\Login::login(["email" => "abcd@abcd.com", "pass" => "abcdabcd"]));
//\Login\Login::logout();
//echo json_encode(\Login\Login::login(["email" => "abcd@abcd.com", "pass" => "abcdabcd123"]));

if($_SERVER["REQUEST_METHOD"] == "POST") {
    switch($_POST["action"]) {
        case "step": {
            exit(json_encode(\Run\Run::step($_POST)));
            break;
        }
        case "register": {
            echo json_encode(\Login\Login::register($_POST));
            break;
        }
        case "login": {
            exit(json_encode(\Login\Login::login($_POST)));
            break;
        }
        case "logout": {
            exit(json_encode(\Login\Login::logout()));
            break;
        }
        case "getId": {
            exit($_SESSION["userId"]);
            break;
        }
    }
}

