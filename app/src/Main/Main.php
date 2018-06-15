<?php namespace Main;

use Database\Database as Db;
use Calculator\Calculator as Calculator;
use Form\Form as Form;
use Code\Code as Code;
use Payment\Payment as Paym;

class Main
{
    private $calc;
    private $form;
    private $code;

    public function calc(array $args)
    {
        if(!isset($this->calc))
        {
            $this->calc = new Calculator($args);
        }
        else
        {
            unset($this->form);
            unset($this->code);
            unset($this->paym);
            unset($this->comp);
            $this->calc->set($args);
        }
        return $this->calc->getData();
    }

    public function form(array $args)
    {
        try {
            if(isset($this->calc))
            {
                if(!isset($this->form))
                {
                    $this->form = new Form($args);
                }
                else
                {
                    unset($this->code);
                    unset($this->paym);
                    unset($this->comp);
                    $this->form->set($args);
                }
            }
            else throw new \Exception("___ Bad step form ___");

            if(isset($this->calc) && isset($this->form))
            {
                if(!isset($this->code))
                {
                    $this->code = new Code($this->form->getData()["email"]);
                }
                else
                {
                    unset($this->paym);
                    unset($this->comp);
                    $this->code->set($this->form->getData()["email"]);
                }
            }
            else throw new \Exception("___ Bad step form ___");
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return $this->form->getData();
    }

    public function code(array $args)
    {
        try {
        if(!(isset($this->calc) && isset($this->form) && isset($this->code)))
            throw new \Exception("___ Bad step code ___");
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return $this->code->getData($args);
    }

    public function paym()
    {
        try {
        if(!(isset($this->calc) && isset($this->form) && isset($this->code)))
            throw new \Exception("___ Bad step paym ___");
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        return Paym::set($this->calc->getData()["price"]);
    }

    public function comp(array $args)
    {

        try {
        if(!(isset($this->calc) && isset($this->form) && isset($this->code)))
            throw new \Exception("___ Bad step comp ___");
        } catch (\Exception $e) {
            exit($e->getMessage());
        }

        Db::connect();
        Db::changeCarStatus($this->calc->getData()["id"], 0);
        $form_data = $this->form->getData();
        $calc_data = $this->calc->getData();
        Db::addOrder($form_data["name"], $form_data["surname"], $form_data["email"], $form_data["exp"], $form_data["expna"], $form_data["category"], $calc_data["dateFrom"], $calc_data["dateTo"]);
        Db::close();

        unset($this->calc);
        unset($this->form);
        unset($this->code);
        unset($this->paym);
    }
}