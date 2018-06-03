<?php
require __DIR__ . '/../vendor/autoload.php';



$a = new \Calculator\Calculator(array("id" => 1, "term" => 7));

try
{
   //Run\Run::step($_SERVER['REQUEST_METHOD'], $_POST);
}
catch (Exception $e)
{
    echo $e->getMessage();
}

