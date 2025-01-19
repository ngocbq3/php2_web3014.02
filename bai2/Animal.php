<?php

namespace App;

class Animal
{
    public $name;
    public $color;

    //constant
    public const TYPE = 'DOG';

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function info()
    {
        echo "<br>Name: " . $this->name;
        echo "<br>Color: " . $this->color;
        echo "<br>TYPE: " . self::TYPE;
    }

    public static function soundA()
    {
        echo "<br>Truy cập static: " . static::class;
    }
    public static function soundB()
    {
        echo "<br>Truy cập self: " . self::class;
    }
}
