<?php
use \PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testId()
    {
        $this->expectException(\InvalidArgumentException::class);
        $calc = new \Calculator\Calculator(["id" => "-", "term" => "-"]);
    }
}