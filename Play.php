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

    public function __constructor() {
        $this->view = new View();
        $this->actions = new Actions();
    }

    public function getCharacterStats($name, $type) {
        $hero = new Character($name, $type);

        $stats['type'] = $hero->gettype();
        $stats['health'] = $hero->gethealth();
        $stats['strength'] = $hero->getstrenght();
        $stats['defence'] = $hero->getdefence();
        $stats['speed'] = $hero->getspeed();
        $stats['luck'] = $hero->getluck();
        $stats['rapid-strike'] = $hero->getrapid_strike();
        $stats['magic-shield'] = $hero->getmagic_shield();

        return $stats;
    }
}


if (isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'start-fight':

            $play = new Play();
            $stats['hero'] = $play->getCharacterStats('Adrian', 'Hero');
            $stats['enemy'] = $play->getCharacterStats('Hades', 'Enemy');

            $success = 200;
            $values = array(
                'health'=> 10,
                'attack' => 50,
                'defence' => 50,
            );
            $response = array(
                'status' => $success, 
                'data' => $stats
            );
            echo json_encode($response);
            break;
        case 'blah':
            echo 'blah';
            break;
        default:
            echo 'default';
            break;
    }
}


