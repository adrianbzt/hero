<?php

class View {

    public function render($toDisplay){

        echo '<pre> <br/>';
        print_r($toDisplay);
        echo '<br/>';

    }
}