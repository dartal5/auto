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
        case "getClient": {
            exit(json_encode(\Database\Database::getClient($_SESSION["userId"])));
            break;
        }
    }
}

//echo json_encode(\Login\Login::register(["name" => "alex", "surname" => "dym", "email" => "abcdef@abcdef.com", "exp" => 3, "expna" => 2, "category" => "B", "pass" => "abcdabcd"]));
//echo $_SESSION["userId"];
//\Login\Login::logout();

//echo json_encode(\Run\Run::step(["step" => "calc", "id" => "1", "dateFrom" => "2018-06-20", "dateTo" => "2018-06-20"]));
//echo json_encode(\Run\Run::step(["step" => "form"]));
//echo json_encode(\Login\Login::updateInfo(["name" => "Alex", "surname" => "dym", "email" => "1234@1234.com", "exp" => 3, "expna" => 2, "category" => "B"]));
//echo json_encode(\Login\Login::updatePass(["newPass" => "123456", "repeatPass" => "123456"]));

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
        case "updateInfo": {
            exit(json_encode(\Login\Login::updateInfo($_POST)));
            break;
        }
        case "updatePass": {
            exit(json_encode(\Login\Login::updatePass($_POST)));
            break;
        }
        case "getId": {
            exit(isset($_SESSION["userId"]) ? $_SESSION["userId"] : "-1");
            break;
        }
    }
}

