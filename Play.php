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

    public function run() {
        $hero = new Character('Adrian', 'Hero');
        $enemy = new Character('Lazyness', 'Enemy');

        echo '<pre>';
        print_r($this->view);
        die;
        
        $this->view->render($hero->toString());
        $this->view->render($enemy->toString());
        
        $this->actions->attack($hero, $enemy);
        
        $this->view->render($hero->toString());
        $this->view->render($enemy->toString());
    }
}

$play = new Play();
$play->run();