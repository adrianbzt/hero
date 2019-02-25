<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'CharacterSettings.php';

class Character {
    private $name;
    private $type;
    private $characterSettings;
    private $properties;

    function __construct($name, $type) {

        $this->name = $name;
        $this->type = $type;
        $this->characterSettings = new CharacterSettings($type);
        $this->properties = new CharacterProperties();

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

        $theString = 'N: ' . $this->name . ' T: ' . $this->type;

        foreach( $this->properties as $property) {
            $theString .= ' ' . $property . ': ' . $this->characterSettings->getSetting( $property);
        }
        return $theString;
    }
    
}