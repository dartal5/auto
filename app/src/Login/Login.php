<?php namespace Login;

use Database\Database;

class Login
{
    /*
     * register function
     */
    static public function register(array $args)
    {
        $name = $args["name"];
        $surname= $args["surname"];
        $email = $args["email"];
        $exp = $args["exp"];
        $expna = $args["expna"];
        $category = $args["category"];

        $pass = $args["pass"];

        /*
         * validate input data
         */
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
        /*
         * checks if we already have account with such email
         */
        $acc = Database::getClientByEmail($email);
        if($acc != false)
            $err_arr["messages"][] = "Account with such email already exists";
        if(!empty($err_arr["messages"])) return $err_arr;

        /*
         * add client
         */
        $acc = Database::addClient($name, $surname, $email, $exp, $expna, $category, sha1($pass));

        /*
         * sets userId with acc id
         */
        $_SESSION["userId"] = $acc["id"];

        return(["status" => 1, "id" => $_SESSION["userId"], "messages" => ["Register successfuly"]]);
    }

    static public function login(array $args)
    {
        $email = $args["email"];
        $pass = $args["pass"];

        /*
         * validate input data
         */
        $err_arr = ["status" => 0, "messages" => []];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $err_arr["messages"][] = "Wrong email";
        $acc = Database::getClientByEmail($email);
        if($acc == false)
            $err_arr["messages"][] = "Wrong pass or email";
        /*
         * compare acc pass with sha1 pass
         */
        if($acc["pass"] != sha1($pass))
            $err_arr["messages"][] = "Wrong pass or email";
        if(!empty($err_arr["messages"])) return $err_arr;

        /*
         * sets userId with acc id
         */
        $_SESSION["userId"] = $acc["id"];

        return(["status" => 1, "id" => $_SESSION["userId"], "messages" => ["Login successfuly"]]);
    }

    static public function logout()
    {
        /*
         * check if we are logged in
         */
        if(!isset($_SESSION["userId"]))
            return(["status" => 0, "messages" => ["You are not logged in"]]);

        /*
         * logout
         * unseting userId
         */
        unset($_SESSION["userId"]);
        return(["status" => 1, "messages" => ["Logout successfuly"]]);
    }

    static public function updateInfo($args)
    {
        $name = $args["name"];
        $surname= $args["surname"];
        $email = $args["email"];
        $exp = $args["exp"];
        $expna = $args["expna"];
        $category = $args["category"];

        /*
        * validate input data
        */
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
        if(!isset($_SESSION["userId"]))
            $err_arr["messages"][] = "Not logged in"; 
        if(!empty($err_arr["messages"])) return $err_arr;

        /*
         * change database about client with userId
         */
        Database::changeClient($_SESSION["userId"], $name, $surname, $email, $exp, $expna, $category);
        return(["status" => 1, "id" => $_SESSION["userId"], "messages" => ["Update successfuly"]]);
    }

    static public function updatePass($args)
    {
        $new_pass = $args["newPass"];
        $pass_repeat = $args["repeatPass"];

        /*
        * validate input data
        */
        if(strlen($new_pass) < 6)
            $err_arr["messages"][] = "Pass should be at least 6 chars";
        if($new_pass !== $pass_repeat)
            $err_arr["messages"][] = "Pass are not the same";
        if(!isset($_SESSION["userId"]))
            $err_arr["messages"][] = "Not logged in"; 
        if(!empty($err_arr["messages"])) return $err_arr;


        /*
         * change pass in db about client with userId
         */
        Database::changeClientPass($_SESSION["userId"], sha1($new_pass));
        return(["status" => 1, "id" => $_SESSION["userId"], "messages" => ["Update successfuly"]]);
    }

}