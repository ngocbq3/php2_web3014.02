<?php

class Animal
{
    private $name;
    protected $color;
    public $age;

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
}

class Dog extends Animal
{
    public function info()
    {
        echo "<br>Name: " . $this->getName();
        echo "<br>Color: " . $this->color;
        echo "<br>Age: " . $this->age;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
}

$animal = new Animal;
$animal->setName("Cậu Vàng");
echo $animal->getName();

$dog = new Dog;
$dog->setName("Cậu Vàng");
$dog->setColor("vàng");
$dog->age = 10;
$dog->info();
