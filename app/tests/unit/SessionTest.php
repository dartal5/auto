<?php
use \PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    public function test()
    {

        $_SESSION["abc"] = 1;
        $this->assertTrue(1 ==  $_SESSION["abc"]);

    }

}