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
            /*
             * calc is the first step so, we do not allow to make other steps
             * so we unset them all
             */
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

            /*
             * create code and send it right after saving form
             */
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
                    echo $this->form->getData()["email"];
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
        /*
         * check if code is eq to actual code
         */
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
        /*
         * create paym config and return it
         */
        try {
        if(!(isset($this->calc) && isset($this->form) && isset($this->code) && $this->code->except == true))
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

        if($args["complete"] == true) {
            $id = $this->calc->getData()["id"];
            /*
             * adding order to database
             */
            Db::changeCarStatus($id, 0);
            Db::addOrder($this->form->getData["userId"], $this->calc->getData()["dateFrom"], $this->calc->getData()["dateTo"], $id);

            unset($this->calc);
            unset($this->form);
            unset($this->code);
            unset($this->paym);

            return true;
        } else {
            return false;
        }
    }
}