<?php
use \PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testMain()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->form(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
    }

    public function testMain1()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->code(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
    }

    public function testMain2()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->paym(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
    }

    public function testMain3()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->code(["step" => "code", "code" => "cheater"]);
    }

    public function testMain14()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->paym(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
    }

    public function testMain141()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->comp([]);
    }

    public function testMain5()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->form(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
        $m->paym(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
    }


    public function testMain6()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->form(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->code(["step" => "code", "code" => "cheater"]);

    }

    public function testMain61()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->form(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->comp([]);

    }

    public function testMain7()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->form(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
        $m->code(["step" => "code", "code" => "cheater"]);
        $m->form(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
    }

    public function testMain8()
    {
        $this->expectException(\Exception::class);
        $m = (new \Main\Main());
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->form(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
        $m->code(["step" => "code", "code" => "cheater"]);
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->form(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
        $m->code(["step" => "code", "code" => "cheater"]);
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->paym(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
        $m->calc(["step" => "calc", "id" => 1, "term" => 7]);
        $m->form(["step" => "form", "name" => "Alex", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
        $m->code(["step" => "code", "code" => "cheater"]);
        $m->comp([]);
    }
}