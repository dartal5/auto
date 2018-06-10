<?php
use \PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testInvalidPrice()
    {
        $this->expectException(\Exception::class);
        $calc = \Payment\Payment::set(["price" => ""]);
    }

}