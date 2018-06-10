<?php
use \PHPUnit\Framework\TestCase;

class CodeTest extends TestCase
{
    public function testEmail()
    {
        $this->expectException(\Exception::class);
        new \Code\Code("123");
    }

    public function testEmail1()
    {
        $this->expectException(\Exception::class);
        new \Code\Code("a@a");
    }

    public function testCode()
    {
        $this->expectException(\Exception::class);
        $this->assertTrue((new \Code\Code("a@a.com"))->getData(["code" => ""]));
    }

}