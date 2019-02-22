<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'CharacterSettings.php';

class Character {
    private $name;
    private $type;
    private $characterSettings;

    function __construct($name, $type) {

        $this->name = $name;
        $this->type = $type;
        $this->characterSettings = new CharacterSettings($type);

    }

    public function setname($name){
        $this->name = $name;
    }

    public function getname() {
        return $this->name;
    }

    public function getCharacterSettings()
    {
        return $this->characterSettings;
    }    

    public function settype($type){
        $this->type = $type;
    }

    public function gettype() {
        return $this->type;
    } 

    public function toString(){
        return 
        'N: ' . $this->name
        . ' T: ' . $this->type 
        . ' H: '. $this-> characterSettings->gethealth() 
        .' S: ' . $this->characterSettings->getstrenght()
        .' D: ' . $this->characterSettings->getdefence() 
        .' SP: ' . $this->characterSettings->getspeed()
        .' RS: ' . $this->characterSettings->getrapid_strike() 
        .' MS ' . $this->characterSettings->getmagic_shield();
    }
    
}