<?php

include_once 'Character.php';
include_once 'Actions.php';
include_once 'View.php';

$view = new View();

$player1 = new Character('Adrian', 'Hero');
$player2 = new Character('Glass', 'Enemy');

$actions = new Actions( $player1, $player2 );

$view->render($player1->toString());
$view->render($player2->toString());

while(True) {
  $actions->attack($player1, $player2);
  $actions->attack($player2, $player1);

  if( $actions->isGameOver($player2, $player1)) {
    $view->render($player1->toString());
    $view->render($player2->toString());
    $view->render('The winner is: ' . $actions->getWinner($player1, $player2));
    break;
  }
}





