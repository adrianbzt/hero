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

    public function attack($attacker, $victim) {

        $damage = $attacker->getCharacterSettings()->getstrenght() - $victim->getCharacterSettings()->getdefence();

        $health = $victim->getCharacterSettings()->gethealth();

        if( $damage > $health) {
            $newHealth = 0;
        } else {
            $newHealth = $health - $damage;
        }

        $this->render->render( $attacker->getName() . ' attacks! ' . $victim->getName() . ' gets ' . $damage . ' damage! ' .$newHealth . ' = '. $health. ' - ' .  $damage);

        $victim->getCharacterSettings()->sethealth($newHealth);
    }

    public function heal() {

    }

    public function isGameOver($player1, $player2) {

        $isGameOver = false;

        if($player1->getCharacterSettings()-> gethealth() == 0 ||  $player2->getCharacterSettings()-> gethealth() == 0) {
            $isGameOver = true;
        } 

        return $isGameOver;

    }

    public function getWinner($player1, $player2) {
        
        if($player1->getCharacterSettings()->gethealth() > 0) {
            return $player1->getName();
        } else {
            return $player2->getName();
        }
    }
}