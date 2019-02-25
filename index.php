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

$players = $actions->getFirstRoundRoles($player1, $player2);


while(True) {
  $actions->attack( $players[ 'attacker'], $players['defender']);

  if( $actions->isGameOver($players['attacker'], $players['defender'])) {
    $view->render($players['attacker']->toString());
    $view->render($players['defender']->toString());
    $view->render('The winner is: ' . $actions->getWinner($players['attacker'], $players['defender']));
    break;
  }

  $players = $actions->switchPlayers($players['attacker'], $players['defender']);

}






