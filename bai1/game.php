<?php

abstract class Game
{
    public $name;
    public $hp;

    public function __construct($name, $hp)
    {
        $this->name = $name;
        $this->hp = $hp;
    }

    public abstract function attack($game);
}

class Monster extends Game
{
    public function attack($game)
    {
        $game->hp -= 100;
        if ($game->hp <= 0) $game->hp = 0;
    }
}

class Player extends Game
{
    public $level = 1;
    public $exp = 0;

    public function attack($monster)
    {
        if ($monster->hp <= 0) {
            return 0;
        }
        $monster->hp -= 200 * $this->level;
        if ($monster->hp <= 0) {
            $this->exp += 1;
            $monster->hp = 0;
        }
        if ($this->exp >= 10) {
            $this->level += 1;
            $this->exp = 0;
            echo "Nhân vật " . $this->name . " tăng cấp: " . $this->level;
            echo "<br>";
        }
    }
}

$monster1 = new Monster('Quái 1', 200);

$player1 = new Player("Hunter", 1000);

for ($i = 0; $i < 100; $i++) {
    $monster = new Monster("quai 2", 200);
    $player1->attack($monster);
}

// echo "Exp: " . $player1->exp;
