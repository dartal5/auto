<?php
require __DIR__ . '/../vendor/autoload.php';

\Session\Session::start();
$_SESSION["userId"] = 1;

echo '<br><pre>' . json_encode(Run\Run::step( ["step" => "calc", "id" => 1, "dateFrom" => "2018-06-16", "dateTo" => "2018-06-18"])). ' </pre>';
echo '<br><pre>' . json_encode(Run\Run::step( ["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@gmail.com", 'exp' => 3, 'expna' => 2, "category"=> "B"])). ' </pre>';
echo '<br><pre>' . json_encode(Run\Run::step( ["step" => "code", "code" => "cheater"])). ' </pre>';
echo '<br><pre>' . json_encode(Run\Run::step( ["step" => "paym"])). ' </pre>';
echo '<br><pre>' . json_encode(Run\Run::step( ["step" => "comp", "complete" => "true"])) . ' </pre>';

if($_SERVER["REQUEST_METHOD"] == "GET") {
    switch ($_GET["action"]) {
        case "getAllCars":
            {
                exit(json_encode(\Database\Database::getAllCars()));
            }
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    switch($_POST["action"]) {
        case "step": {
            \Run\Run::step($_POST);
        }
        case "login": {

        }
    }

}

