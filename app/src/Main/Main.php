<?php namespace Main;

use Calculator\Calculator as Calculator;
use Form\Form as Form;
use Code\Code as Code;
use Payment\Payment as Paym;
use Complete\Complete as Comp;

class Main
{

    public function calc()
    {

    }

    public function form()
    {

    }

    public function code()
    {

    }

    public function paym()
    {

    }

    public function comp()
    {

    }


    private $calc;
    private $form;
    private $code;
    private $paym;
    private $comp;

    private function getCalc() : Calculator { return $this->calc; }
    private function isSetCalc() : bool { return isset($this->calc); }
    private function setCalc(array $args)
    {
        $this->calc = new Calculator($args);
    }

    private function getForm() : Form { return $this->form; }
    private function isSetForm() : bool { return isset($this->form); }
    private function setForm(array $args)
    {
        $this->form = new Form($args);
    }

    private function getCode() : Code { return $this->code; }
    private function isSetCode() : bool { return isset($this->code); }
    private function setCode(array $args)
    {
        $this->code = new Code($args);
    }

    private function getPaym() : Paym { return $this->paym; }
    private function isSetPaym() : bool { return isset($this->paym); }
    private function setPaym(array $args)
    {
        $this->paym = new Paym($args);
    }

    private function getComp() : Comp { return $this->comp; }
    private function isSetComp() : bool { return isset($this->comp); }
    private function setComp(array $args)
    {
        $this->comp = new Comp($args);
    }
}