<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'View.php';

class Actions {

    private $render;

    public function __construct()
    {
        $this->render = new View();
    }

    public function attack($player1, $player2) {

        $damage = $player1->getCharacterSettings()->getstrenght() - $player2->getCharacterSettings()->getdefence();

        $health = $player2->getCharacterSettings()->gethealth();

        $newHealth = $health - $damage;

        $this->render->render( $player1->getName() . ' attacks with damage: ' . $damage . ' new health: ' . $newHealth);

        $player2->getCharacterSettings()->sethealth($newHealth);
    }

    public function heal() {

    }
}