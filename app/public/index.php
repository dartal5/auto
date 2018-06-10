<?php
require __DIR__ . '/../vendor/autoload.php';

\Session\Session::start();
echo "<pre>" . json_encode(Run\Run::step("POST", ["step" => "calc", "id" => 1, "term" => 7])) . "</pre>";
echo "<br>";
echo "<pre>" .json_encode(Run\Run::step("POST", ["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"])) . "</pre>";;
echo "<br>";
echo "<pre>" . json_encode(Run\Run::step("POST", ["step" => "code", "code" => "cheater"])). "</pre>";
echo "<br>";
echo "<pre>" . json_encode(Run\Run::step("POST", ["step" => "paym"])). "</pre>";
echo "<br>";
echo "<pre>" . json_encode(Run\Run::step("POST", ["step" => "comp"])). "</pre>";

