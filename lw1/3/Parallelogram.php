<?php

require_once("Shape.php");

abstract class Parallelogram extends Shape
{
    private float $width, $height, $angle;

    function __construct(float $var1, float $var2, float $var3)
    {
        $this->width = $var1;
        $this->height = $var2;
        $this->angle = $var3;
        if ($this->width <= 0 || $this->height <= 0 ||
        $this->angle <= 0 || $this->angle >= 180) {
            throw new Exception("Ошибка в размерах");
        }
    }

    public function getPerimeter(): float
    {
        return ($this->width + $this->height) * 2;
    }

    public function getArea(): float
    {
        return ($this->width * $this->height *
            sin(deg2rad($this->angle)));
    }
}
