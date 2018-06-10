<?php
use \PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testInvalidId()
    {
        $this->expectException(\Exception::class);
        $calc = new \Calculator\Calculator(["id" => "0", "term" => "1"]);
        $calc = new \Calculator\Calculator(["id" => "1", "term" => "1"]);
        $calc = new \Calculator\Calculator(["id" => "-1", "term" => "1"]);
        $calc = new \Calculator\Calculator(["term" => "1"]);
        $calc = new \Calculator\Calculator(["id" => "a", "term" => "1"]);
    }

    public function testInvalidTerm()
    {
        $this->expectException(\Exception::class);
        $calc = new \Calculator\Calculator(["id" => "1", "term" => "0"]);
        $calc = new \Calculator\Calculator(["id" => "1", "term" => "-1"]);
        $calc = new \Calculator\Calculator(["id" => "1", "term" => "a"]);
        $calc = new \Calculator\Calculator(["id" => "1"]);
        $calc = new \Calculator\Calculator(["id" => "1", "term" => "1"]);
    }

    public function testData()
    {
        $this->expectException(\Exception::class);
        $arr = (new \Calculator\Calculator(["id" => "2", "term" => "1"]))->getData();
        $this->assertArrayNotHasKey("id", $arr);
        $this->assertArrayNotHasKey("term", $arr );
        $this->assertArrayNotHasKey( "price", $arr);
    }

}