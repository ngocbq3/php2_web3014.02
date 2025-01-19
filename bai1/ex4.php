<?php

abstract class Car
{
    public $name;
    public $color;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public abstract function sound();

    public function info()
    {
        echo "<br>";
        echo "Name: " . $this->name;
        echo "<br>Color: " . $this->color;
    }
}

class VinFat extends Car
{
    public function sound()
    {
        echo $this->name . " Bùm Bùm ... <br>";
    }
}
class Toyota extends Car
{
    public function sound()
    {
        echo $this->name . " Buzzz Buzzz ...<br>";
    }
}
$vinfat = new VinFat("VF8", "Đen");
$toyota = new Toyota("Vios", "Trắng");
$vinfat->sound();
$toyota->sound();
