<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'CharacterSettings.php';

class Character {
    private $name;
    private $type;
    private $health; 
    private $strenght;
    private $defence;
    private $speed;
    private $luck;
    private $rapid_strike;
    private $magic_shield;

    function __construct($name, $type) {

        $characterSettings = new CharacterSettings();

        $this->name = $name;
        $this->type = $type;
        $this->health = $characterSettings->getAttribute($type, 'health');
        $this->strenght =  $characterSettings->getAttribute($type, 'strength');
        $this->defence = $characterSettings->getAttribute($type, 'defence');
        $this->speed = $characterSettings->getAttribute($type, 'speed');
        $this->luck = $characterSettings->getAttribute($type, 'luck');
        $this->rapid_strike = $characterSettings->getAttribute($type, 'rapid_strike');
        $this->magic_shield = $characterSettings->getAttribute($type, 'magic_shield');
    }

    public function setname($name){
        $this->name = $name;
    }

    public function getname() {
        return $this->name;
    }

    public function settype($type){
        $this->type = $type;
    }

    public function gettype() {
        return $this->type;
    } 
    
    public function sethealth($health){
        $this->health = $health;
    }

    public function gethealth() {
        return $this->health;
    } 
    
    public function setstrenght($strenght){
        $this->strenght = $strenght;
    }

    public function getstrenght() {
        return $this->strenght;
    }   
    
    public function setdefence($defence){
        $this->defence = $defence;
    }

    public function getdefence() {
        return $this->defence;
    }    

    public function setspeed($speed){
        $this->speed = $speed;
    }

    public function getspeed() {
        return $this->speed;
    }
   
    public function setluck($luck){
        $this->luck = $luck;
    }

    public function getluck() {
        return $this->luck;
    }  
    
    public function setrapid_strike($rapid_strike){
        $this->rapid_strike = $rapid_strike;
    }

    public function getrapid_strike() {
        return $this->rapid_strike;
    }
    
    public function setmagic_shield($magic_shield){
        $this->magic_shield = $magic_shield;
    }

    public function getmagic_shield() {
        return $this->magic_shield;
    }

    public function toString(){
        return 
        ' name ' . $this->name 
        . ' type ' . $this->type 
        . ' health '. $this->health 
        . ' strenght ' . $this->strenght 
        . ' defence ' . $this->defence 
        . ' speed ' . $this->speed
        . ' rapid_strike ' . $this->rapid_strike
        . ' magic_shield ' . $this->magic_shield;
    }
    
}