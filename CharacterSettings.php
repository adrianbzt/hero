<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class CharacterSettings {

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


    public function getAttribute($characterType, $attribute) {
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

    private function setvalue($ranges){

        return rand($ranges['min'], $ranges['max']);

    }
    
}