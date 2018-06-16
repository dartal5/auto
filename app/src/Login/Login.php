<?php namespace Login;

use Database\Database;

class Login
{
    static public function register(array $args)
    {
        $name = $args["name"];
        $surname= $args["surname"];
        $email = $args["email"];
        $exp = $args["exp"];
        $expna = $args["expna"];
        $category = $args["category"];

        $pass = $args["pass"];

        if(empty($name))
            return(["status" => 0, "message" => "Empty name"]);
        if(empty($surname))
            return(["status" => 0, "message" => "Empty surname"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            return(["status" => 0, "message" => "Wrong email"]);
        if(!preg_match("(0|[1-9][0-9]*)", $exp))
            return(["status" => 0, "message" => "Wrong exp"]);
        if(!preg_match("(0|[1-9][0-9]*)", $expna))
            return(["status" => 0, "message" => "Wrong expna"]);
        if($expna > $exp)
            return(["status" => 0, "message" => "expna > exp"]);
        if(!in_array($category, array("A", "B", "C", "D")) )
            return(["status" => 0, "message" => "Wrong category"]);
        if(strlen($pass) < 6)
            return(["status" => 0, "message" => "Pass should be at least 6 chars"]);
        $acc = Database::getClientByEmail($email);
        if($acc != false)
            return(["status" => 0, "message" => "Account with such email already exists"]);

        Database::addClient($name, $surname, $email, $exp, $expna, $category, sha1($pass));

        $_SESSION["userId"] = $acc["id"] + 1;

        return(["status" => 1, "message" => "Register successfuly"]);
    }

    static public function login(array $args)
    {
        $email = $args["email"];
        $pass = $args["pass"];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            return(["status" => 0, "message" => "Wrong email"]);
        $acc = Database::getClientByEmail($email);
        if($acc == false)
            return(["status" => 0, "message" => "Wrong pass or email"]);

        if($acc["pass"] != sha1($pass))
            return(["status" => 0, "message" => "Wrong pass or email"]);

        $_SESSION["userId"] = $acc["id"];

        return(["status" => 1, "message" => "Login successfuly"]);
    }

    static public function logout()
    {
        if(!isset($_SESSION["userId"]))
            return(["status" => 0, "message" => "You are not logged in"]);

        unset($_SESSION["userId"]);
        return(["status" => 1, "message" => "Logout successfuly"]);
    }
}