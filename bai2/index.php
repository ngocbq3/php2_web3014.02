<?php
require_once __DIR__ . "/vendor/autoload.php";

use App\Animal;
use App\Dog;

$animal = new Animal("Mèo Tom", "Tam thể");
$animal->info();

echo "<br>TYPE: " . Animal::TYPE;

//static
Animal::soundA();
Dog::soundA();

//self
Animal::soundB();
