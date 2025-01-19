<?php

class Computer
{
    protected $name;
    protected $color;
    protected $type;

    public function __construct($name, $color, $type)
    {
        $this->name = $name;
        $this->color = $color;
        $this->type = $type;
    }

    public function info()
    {
        echo "<br>Name: " . $this->name;
        echo "<br>Color: " . $this->color;
        echo "<br>Type: " . $this->type;
    }
}

class Dell extends Computer
{
    protected $brand;

    public function __construct($name, $color, $type, $brand)
    {
        parent::__construct($name, $color, $type);
        $this->brand = $brand;
    }
}
$computer = new Computer("Dell Vostro 5501", "Bạc", "Văn phòng");
$computer->info();
