<?php
use \PHPUnit\Framework\TestCase;

class RunTest extends TestCase
{

    function __construct(?string $name = null, array $data = [], string $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        \Session\Session::start();
    }

    public function test1()
    {
        $this->expectException(\Exception::class);

        Run\Run::step("GET", ["step" => "", "id" => 1, "term" => 7]);
    }

    public function test11()
    {
        $this->expectException(\Exception::class);

        Run\Run::step("POST", ["step" => "calc1", "id" => 1, "term" => 7]);
    }

    public function test2()
    {
        $this->expectException(\Exception::class);

       // Run\Run::step("POST", ["step" => "calc", "id" => 1, "term" => 7]);

       Run\Run::step("POST", ["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);

        //Run\Run::step("POST", ["step" => "code", "code" => "cheater"]);

        //Run\Run::step("POST", ["step" => "paym"]);

        //Run\Run::step("POST", ["step" => "comp"]);


    }

    public function test3()
    {
        $this->expectException(\Exception::class);


        Run\Run::step("POST", ["step" => "code", "code" => "cheater"]);

        //Run\Run::step("POST", ["step" => "paym"]);

        //Run\Run::step("POST", ["step" => "comp"]);


    }

    public function test4()
    {
        $this->expectException(\Exception::class);

        Run\Run::step("POST", ["step" => "calc", "id" => 1, "term" => 7]);

        Run\Run::step("POST", ["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);

        Run\Run::step("POST", ["step" => "code", "code" => "cheater"]);

        //Run\Run::step("POST", ["step" => "paym"]);

        Run\Run::step("POST", ["step" => "comp"]);
    }

    public function test5()
    {
        $this->expectException(\Exception::class);

        Run\Run::step("POST", ["step" => "calc", "id" => 1, "term" => 7]);

        Run\Run::step("POST", ["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);

        //Run\Run::step("POST", ["step" => "code", "code" => "cheater"]);

        Run\Run::step("POST", ["step" => "paym"]);

        //Run\Run::step("POST", ["step" => "comp"]);
        \Session\Session::destroy();
    }


}