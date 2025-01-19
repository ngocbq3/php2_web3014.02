<?php

use VinFat as GlobalVinFat;

interface Car
{
    public function sound();
    public function info();
}

class Vinfat implements Car
{
    public function sound()
    {
        echo "Xe vinfat kêu Bùm Bùm ...<br>";
    }
    public function info()
    {
        echo "THông tin của xe Vinfat<br>";
    }
}
$vinfat = new Vinfat;
$vinfat->sound();
