<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'View.php';

class Actions {

    private $max_rounds;
    private $render;
    private $properties;

    public function __construct()
    {
        $this->max_rounds = 20;
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
        
        if($player1->getCharacterSettings()-> getSetting( $this->properties->getHealth()) > 0 && $player2->getCharacterSettings()->getSetting($this->properties->getHealth()) > 0) {

            if( $player1->getCharacterSettings()->getSetting($this->properties->getHealth()) > $player2->getCharacterSettings()->getSetting($this->properties->getHealth())) {
                return $player1->getName();
            } else {
                return $player2->getName();
            }
            return $player1->getName();
        } else if ( $player1->getCharacterSettings()->getSetting($this->properties->getHealth()) == 0) {
            return $player2->getName();
        } else if ( $player2->getCharacterSettings()->getSetting($this->properties->getHealth()) == 0) {
            return $player1->getName();
        }
    }

    public function getFirstRoundRoles($player1, $player2) {

        $speedResult = $this->compareSpeed($player1, $player2);

        if( $speedResult == null) {
            $luckResult = $this->compareLuck($player1, $player2);
            return array('attacker' => $luckResult, 'defender' => $this->decideDefender( $luckResult, $player1, $player2));
        } else {
            return array('attacker' => $speedResult, 'defender' => $this->decideDefender( $speedResult, $player1, $player2));
        }

        
    }

    private function decideDefender($attacker, $player1, $player2) {
        if( $attacker == $player1) {
            $defender = $player2;
        } else {
            $defender = $player1;
        } 

        return $defender;

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

    public function switchRoles($player1, $player2)
    {
            $tmp= $player1;
            $player1= $player2;
            $player2= $tmp;

            return array('attacker' => $player1, 'defender' => $player2);
    }

    public function getMaxRounds() 
    {
        return $this->max_rounds;
    }

    public function setMaxRounds($max_rounds)
    {
        $this->max_rounds = $max_rounds;
    }    
}