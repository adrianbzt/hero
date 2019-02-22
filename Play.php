<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'Character.php';
include_once 'Actions.php';
include_once 'View.php';

class Play {

    private $view;
    private $actions;
    private $hero;
    private $enemy;

    public function __constructor() {
        $this->view = new View();
        $this->actions = new Actions();
    }

    public function getCharacterStats($name, $type) {
        $character = new Character($name, $type);

        if($type == 'Hero') {
            $this->hero = $character;
        }

        if ($type == 'Enemy') {
            $this->enemy = $character;
        }        

        $stats['type'] = $character->gettype();
        $stats['health'] = $character->gethealth();
        $stats['strength'] = $character->getstrenght();
        $stats['defence'] = $character->getdefence();
        $stats['speed'] = $character->getspeed();
        $stats['luck'] = $character->getluck();
        $stats['rapid-strike'] = $character->getrapid_strike();
        $stats['magic-shield'] = $character->getmagic_shield();

        return $stats;
    }

    public function getHero() 
    {
        return $this->hero;
    }

    public function getEnemy()
    {
        return $this->enemy;
    }
   
}


