<?php
use \PHPUnit\Framework\TestCase;

use Database\Database as Db;

class DbTest extends TestCase
{
    public function test()
    {
        Db::connect();
        $cars = Db::getAllCars();
        foreach ($cars as $abc)
        {
            $this->assertArrayHasKey("id", $abc);
            $this->assertArrayHasKey("make", $abc);
            $this->assertArrayHasKey("model", $abc);
            $this->assertArrayHasKey("info", $abc);
            $this->assertArrayHasKey("status", $abc);
            $this->assertArrayHasKey("picture", $abc);
            $this->assertArrayHasKey("class_type", $abc);
            $this->assertArrayHasKey("tran_type", $abc);
            $this->assertArrayHasKey("seats_from", $abc);
            $this->assertArrayHasKey("seats_to", $abc);
            $this->assertArrayHasKey("fuel_type", $abc);
            $this->assertArrayHasKey("base_coeff", $abc);
            $this->assertArrayHasKey("class_coeff", $abc);
            $this->assertArrayHasKey("transmission_coeff", $abc);
            $this->assertArrayHasKey("type_coeff", $abc);
            $this->assertArrayHasKey("price", $abc);
        }

    }


    public function test1()
    {

        $abc = Db::getCar(1);

        $this->assertArrayHasKey("id", $abc);
        $this->assertArrayHasKey("make", $abc);
        $this->assertArrayHasKey("model", $abc);
        $this->assertArrayHasKey("info", $abc);
        $this->assertArrayHasKey("status", $abc);
        $this->assertArrayHasKey("picture", $abc);
        $this->assertArrayHasKey("class_type", $abc);
        $this->assertArrayHasKey("tran_type", $abc);
        $this->assertArrayHasKey("seats_from", $abc);
        $this->assertArrayHasKey("seats_to", $abc);
        $this->assertArrayHasKey("fuel_type", $abc);
        $this->assertArrayHasKey("base_coeff", $abc);
        $this->assertArrayHasKey("class_coeff", $abc);
        $this->assertArrayHasKey("transmission_coeff", $abc);
        $this->assertArrayHasKey("type_coeff", $abc);
        $this->assertArrayHasKey("price", $abc);
    }

    public function test2()
    {
        $abc = Db::getCarPriceCoeffs(1);

        $this->assertArrayHasKey("status", $abc);
        $this->assertArrayHasKey("base_coeff", $abc);
        $this->assertArrayHasKey("class_coeff", $abc);
        $this->assertArrayHasKey("transmission_coeff", $abc);
        $this->assertArrayHasKey("type_coeff", $abc);
    }

    public function test3()
    {
        $this->expectNotToPerformAssertions();
         Db::changeCarStatus(1, 1);
    }

    public function test4()
    {
        $this->expectNotToPerformAssertions();
        Db::addOrder("abc", "abc", "a@a.com ", 3, 4, "A", "2018-06-10", "2018-06-17");
    }

}