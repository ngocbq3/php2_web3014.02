<?php

class Animal
{
    public $name;
    public $color;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function sound()
    {
        echo $this->name . " đang kêu ...<br>";
    }
}
class Dog extends Animal
{
    public function sound()
    {
        echo $this->name . " đang kêu gogo ...<br>";
    }
}
$animal = new Animal("Động vật", "Xanh");
$dog = new Dog("Cậu Vàng", "Vàng");
$animal->sound();
$dog->sound();
