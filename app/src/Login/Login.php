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

        $err_arr = ["status" => 0, "messages" => []];
        if(empty($name))
            $err_arr["messages"][] = "Empty name";
        if(empty($surname))
            $err_arr["messages"][] = "Empty surname";
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $err_arr["messages"][] = "Wrong email";
        if(!preg_match("(0|[1-9][0-9]*)", $exp))
            $err_arr["messages"][] = "Wrong exp";
        if(!preg_match("(0|[1-9][0-9]*)", $expna))
            $err_arr["messages"][] = "Wrong expna";
        if($expna > $exp)
            $err_arr["messages"][] = "expna > exp";
        if(!in_array($category, array("A", "B", "C", "D")))
            $err_arr["messages"][] = "Wrong category";
        if(strlen($pass) < 6)
            $err_arr["messages"][] = "Pass should be at least 6 chars";
        $acc = Database::getClientByEmail($email);
        if($acc != false)
            $err_arr["messages"][] = "Account with such email already exists";
        if(!empty($err_arr["messages"])) return $err_arr;

        Database::addClient($name, $surname, $email, $exp, $expna, $category, sha1($pass));

        $_SESSION["userId"] = $acc["id"] + 1;

        return(["status" => 1, "id" => $_SESSION["userId"], "messages" => ["Register successfuly"]]);
    }

    static public function login(array $args)
    {
        $email = $args["email"];
        $pass = $args["pass"];

        $err_arr = ["status" => 0, "messages" => []];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $err_arr["messages"][] = "Wrong email";
        $acc = Database::getClientByEmail($email);
        if($acc == false)
            $err_arr["messages"][] = "Wrong pass or email";
        if($acc["pass"] != sha1($pass))
            $err_arr["messages"][] = "Wrong pass or email";
        if(!empty($err_arr["messages"])) return $err_arr;

        $_SESSION["userId"] = $acc["id"];

        return(["status" => 1, "id" => $_SESSION["userId"], "messages" => ["Login successfuly"]]);
    }

    static public function logout()
    {
        if(!isset($_SESSION["userId"]))
            return(["status" => 0, "messages" => ["You are not logged in"]]);

        unset($_SESSION["userId"]);
        return(["status" => 1, "messages" => ["Logout successfuly"]]);
    }

}