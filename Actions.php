<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'View.php';

class Actions {

    private $render;
    private $properties;

    public function __construct()
    {
        $this->render = new View();
        $this->properties = new CharacterProperties();
    }

    public function attack($attacker, $victim) {

        $damage = $attacker->getCharacterSettings()->getSetting( $this->properties->getStrength()) - $victim->getCharacterSettings()-> getSetting( $this->properties->getDefence());

        $health = $victim->getCharacterSettings()-> getSetting( $this->properties->getHealth());

        if( $damage > $health) {
            $newHealth = 0;
        } else {
            $newHealth = $health - $damage;
        }

        $this->render->render( $attacker->getName() . ' attacks! ' . $victim->getName() . ' gets ' . $damage . ' damage! ' .$newHealth . ' = '. $health. ' - ' .  $damage);

        $victim->getCharacterSettings()->setSetting( $this->properties->getHealth(), $newHealth);
    }

    public function heal() {

    }

    public function isGameOver($player1, $player2) {

        $isGameOver = false;

        if($player1->getCharacterSettings()-> getSetting( $this->properties->getHealth()) == 0 ||  $player2->getCharacterSettings()-> getSetting( $this->properties->getHealth()) == 0) {
            $isGameOver = true;
        } 

        return $isGameOver;

    }

    public function getWinner($player1, $player2) {
        
        if($player1->getCharacterSettings()-> getSetting( $this->properties->getHealth()) > 0) {
            return $player1->getName();
        } else {
            return $player2->getName();
        }
    }

    public function getFirstAttacker($player1, $player2) {

        $speedResult = $this->compareSpeed($player1, $player2);

        if( $speedResult == null) {
            $luckResult = $this->compareLuck($player1, $player2);
            return $luckResult;
        } else {
            return $speedResult;
        }
    }

    private function compareSpeed($player1, $player2){
        if ($player1->getCharacterSettings()->getSetting($this->properties->getSpeed()) > $player2->getCharacterSettings()->getSetting($this->properties->getSpeed())) {
            return $player1;
        } else if ($player1->getCharacterSettings()->getSetting($this->properties->getSpeed()) == $player2->getCharacterSettings()->getSetting($this->properties->getSpeed())) {
            return null;
        } else {
            return $player2;
        }
    }

    private function compareLuck($player1, $player2){
    
        if ($player1->getCharacterSettings()->getSetting($this->properties->getLuck()) >= $player2->getCharacterSettings()->getSetting($this->properties-> getLuck())) {
            return $player1;
        } else {
            return $player2;
        }        
    }

    public function switchPlayers($firstAttacker, $player1, $player2){
        if( $firstAttacker !== $player1) {
            return $player1;
        } else {
            return $player2;
        }
    }
}