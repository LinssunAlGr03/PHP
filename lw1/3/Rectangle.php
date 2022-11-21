<?php

require_once("Shape.php");

abstract class Rectangle extends Shape
{
    private float $side1, $side2;

    function __construct(float $var1, float $var2)
    {
        if ($this->side1 <= 0 || $this->side2 <= 0) {
            throw new Exception("Ошибка в размерах");
        }
        $this->side1 = $var1;
        $this->side2 = $var2;
    }

    public function getPerimeter(): float
    {
        return ($this->side1 + $this->side2) * 2;
    }

    public function getArea(): float
    {
        return $this->side1 * $this->side2;
    }
}
