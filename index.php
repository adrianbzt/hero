<?php

include_once 'Character.php';
include_once 'Actions.php';
include_once 'View.php';

$view = new View();
$properties = new CharacterProperties();

$player1 = new Character('Kevin', $properties->getHero());
$player2 = new Character('Patricia', $properties->getEnemy());

$actions = new Actions( $player1, $player2 );

$view->render($player1->toString());
$view->render($player2->toString());

$attacker = $actions->getFirstAttacker($player1, $player2);
$defener = $actions->switchPlayers($attacker, $player1, $player2);

while(True) {
  
  $actions->attack( $attacker, $defener);

  if( $actions->isGameOver( $attacker, $defener)) {
    $view->render( $attacker->toString());
    $view->render( $defener->toString());
    $view->render('The winner is: ' . $actions->getWinner($attacker, $defener));
    break;
  }

  $attacker = $defener;
  $defener = $attacker;

}






