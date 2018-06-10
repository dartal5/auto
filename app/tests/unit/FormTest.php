<?php
use \PHPUnit\Framework\TestCase;

class FormTest extends TestCase
{
    public function testInvalidName()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
    }

    public function testInvalidsurname()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "abc", "surname" => "", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
    }

    public function testInvalidemail()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "abc", "surname" => "darkstalker", "email" => "abcabc.com", 'exp' => 3, 'expna' => 2, "category"=> "B"]);

    }

    public function testInvalidemail1()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "abc", "surname" => "darkstalker", "email" => "", 'exp' => 3, 'expna' => 2, "category"=> "B"]);
    }


    public function testInvalidexp()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "abc", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => "", 'expna' => 2, "category"=> "B"]);
    }

    public function testInvalidexp1()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "abc", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => -1, 'expna' => 2, "category"=> "B"]);
    }

    public function testInvalidexp2()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "abc", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => "a", 'expna' => 2, "category"=> "B"]);
    }

    public function testInvalidexpna()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "abc", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => "4", "category"=> "B"]);
    }
    public function testInvalidexpna1()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "abc", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 1, 'expna' => 4, "category"=> "B"]);
    }

    public function testInvalidcategory()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "abc", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> ""]);
    }

    public function testInvalidcategory1()
    {
        $this->expectException(\Exception::class);
        $form = new \Form\Form(["name" => "abc", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "E"]);
    }


    public function testData()
    {
        $form = (new \Form\Form(["name" => "abc", "surname" => "darkstalker", "email" => "abc@abc.com", 'exp' => 3, 'expna' => 2, "category"=> "A"]))->getData();
        $this->assertArrayHasKey("name", $form);
        $this->assertArrayHasKey("surname", $form);
        $this->assertArrayHasKey("email", $form);
        $this->assertArrayHasKey("exp", $form);
        $this->assertArrayHasKey("expna", $form);
        $this->assertArrayHasKey("category", $form);
    }

}