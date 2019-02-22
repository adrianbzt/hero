<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class CharacterSettings
{
    private $health;
    private $strenght;
    private $defence;
    private $speed;
    private $luck;
    private $rapid_strike;
    private $magic_shield;

    private $heroRanges = array(
        "health" => array(
            'min' => 70,
            'max' => 100,
        ),
        "strength" => array(
            'min' => 70,
            'max' => 80,
        ),  
        "defence" => array(
            'min' => 45,
            'max' => 55,
        ), 
        "speed" => array(
            'min' => 40,
            'max' => 50,
        ), 
        "luck" => array(
            'min' => 10,
            'max' => 30,
        ),  
        "rapid_strike" => array(
            'min' => 10,
            'max' => 10,
        ),   
        "magic_shield" => array(
            'min' => 20,
            'max' => 20,
        ),                                        
    );

    private $enemyRanges = array(
        "health" => array(
            'min' => 60,
            'max' => 90,
        ),
        "strength" => array(
            'min' => 60,
            'max' => 90,
        ),  
        "defence" => array(
            'min' => 40,
            'max' => 60,
        ), 
        "speed" => array(
            'min' => 40,
            'max' => 60,
        ), 
        "luck" => array(
            'min' => 25,
            'max' => 40,
        ),  
        "rapid_strike" => array(
            'min' => 0,
            'max' => 0,
        ),   
        "magic_shield" => array(
            'min' => 0,
            'max' => 0,
        ),                                        
    );    

    public function __construct( $type)
    {
        $this->health = $this->getInitialValue($type, 'health');
        $this->strenght =  $this-> getInitialValue($type, 'strength');
        $this->defence = $this-> getInitialValue($type, 'defence');
        $this->speed = $this-> getInitialValue($type, 'speed');
        $this->luck = $this-> getInitialValue($type, 'luck');
        $this->rapid_strike = $this-> getInitialValue($type, 'rapid_strike');
        $this->magic_shield = $this-> getInitialValue($type, 'magic_shield');
    }

    public function getInitialValue($characterType, $attribute) {
        switch($characterType) {
            case 'Hero':
                $ranges = $this->heroRanges[$attribute];
            break;
            case 'Enemy':
                $ranges = $this->enemyRanges[$attribute];
            break;
            default:
            break;
        }

       return $this->setvalue($ranges);
    }

    public function sethealth($health){
   
         $this->health = $health;
    }

    public function gethealth()
    {
        return $this->health;
    }

    public function setstrenght($strenght){
   
         $this->strenght = $strenght;
    }

    public function getstrenght()
    {
        return $this->strenght;
    }

    public function setdefence($defence){
   
         $this->defence = $defence;
    }

    public function getdefence()
    {
        return $this->defence;
    }

    public function setspeed($speed){
   
         $this->speed = $speed;
    }

    public function getspeed()
    {
        return $this->speed;
    }

    public function setluck($luck){
   
         $this->luck = $luck;
    }

    public function getluck()
    {
        return $this->luck;
    }

    public function setrapid_strike($rapid_strike){
   
         $this->rapid_strike = $rapid_strike;
    }

    public function getrapid_strike()
    {
        return $this->rapid_strike;
    }

    public function setmagic_shield($magic_shield){
   
         $this->magic_shield = $magic_shield;
    }

    public function getmagic_shield()
    {
        return $this->magic_shield;
    }    

    private function setvalue($ranges){

        return rand($ranges['min'], $ranges['max']);

    }
    
}