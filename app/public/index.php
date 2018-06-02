<?php
require __DIR__ . '/../vendor/autoload.php';

Run\Run::step($_SERVER['REQUEST_METHOD'], $_POST);