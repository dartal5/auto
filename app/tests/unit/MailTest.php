<?php
use \PHPUnit\Framework\TestCase;

class MailTest extends TestCase
{
    public function test()
    {
        $this->assertTrue( \Mail\Mail::sendCode("aldart@meta.ua", "1") == true);

    }

    public function test1()
    {
        $this->assertTrue( \Mail\Mail::sendCode("", "1") == false);

    }


}