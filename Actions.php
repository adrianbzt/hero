<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Actions {

    public function attack($player1, $player2) {

        $damage = $player1->getstrenght() - $player2->getdefence();

        $health = $player2->gethealth();

        $newHealth = $health - $damage;

        echo ' <br> i am attacking with damage: ' . $damage . ' new health: ' . $newHealth;
        
        $player2->sethealth($newHealth);
    }

    public function heal() {

    }
}