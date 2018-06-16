<?php
require __DIR__ . '/../vendor/autoload.php';

\Session\Session::start();

if($_SERVER["REQUEST_METHOD"] == "GET") {
    switch ($_GET["action"]) {
        case "getAllCars":
            {
                exit(json_encode(\Database\Database::getAllCars()));
            }
    }
}

//echo json_encode(\Login\Login::register(["name" => "alex", "surname" => "lebovski", "email" => "abcdefg@gmail.com", "exp" => 3, "expna" => 2, "category" => "B", "pass" => "hellollo"]));
//echo json_encode(\Login\Login::login(["email" => "abcdefg@gmail.com", "pass" => "hellollo"]));
//echo $_SESSION["userId"];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    switch($_POST["action"]) {
        case "step": {
            \Run\Run::step($_POST);
        }
        case "register": {
            \Login\Login::register($_POST);
        }
        case "login": {
            \Login\Login::login($_POST);
        }
        case "logout": {
            \Login\Login::logout();
        }
    }

}

