<?php

include_once 'Character.php';
include_once 'Actions.php';
include_once 'View.php';

$view = new View();
$actionsObj = new Actions();

$player1 = new Character('Adrian', 'Hero');
$player2 = new Character('Glass', 'Enemy');


while( $player1->getCharacterSettings()->gethealth() > 0 || $player2->getCharacterSettings()->gethealth() > 0) {

  $actionsObj->attack($player1, $player2);
  $actionsObj->attack( $player2, $player1);

  $view->render($player1->toString());
  $view->render($player2->toString());

}




