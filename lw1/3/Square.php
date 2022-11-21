<?php

require_once("Shape.php");

abstract class Square extends Shape
{
    private float $side;

    function __construct(float $var)
    {
        if ($var <= 0) {
            throw new Exception("Ошибка в размерах");
        }
        $this->side = $var;
    }

    public function getPerimeter(): float
    {
        return $this->side * 4;
    }

    public function getArea(): float
    {
        return $this->side * $this->side;
    }
}
