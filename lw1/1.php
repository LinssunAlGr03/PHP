<?php

class Calculator
{
    private float $result = 0;

    public function sum(float $var):float
    {
        return $this->result += $var;
    }

    public function minus(float $var):float
    {
        return $this->result -= $var;
    }

    public function product(float $var):float
    {
        return $this->result *= $var;
    }

    public function division(float $var):float
    {
        if ($var === 0.0) {
            throw new Exception("Деление на ноль");
        } else {
            $this->result /= $var;
            return $this;
        }
    }

    public function getResult():float
    {
        return $this->result;
    }

    public function reset():float
    {
      return $this->result = 0;
    }
}

$calculator = new Calculator();

try {
    print("1) ". $calculator->sum(1)->sum(2)->product(3)->division(3)->getResult() ."\n");
    $calculator->reset();
    print("2) ". $calculator->sum(3)->sum(3)->minus(3)->division(3)->getResult() ."\n");
    $calculator->reset();
    print("3) ". $calculator->sum(1.4)->sum(2.6)->product(4)->getResult() ."\n");
    $calculator->reset();
    print("4) " . $calculator->sum(2)->product(3)->division(0)->getResult() ."\n");
} catch (Exception $e) {
    print("4) " . $e->getMessage());
}
