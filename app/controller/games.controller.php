<?php
include_once "app/views/games.view.php";


class GamesController {

    private $model;
    private $view;

    function __construct() {
        $this->view = new GamesView ();
     
    }

    function showHome(){
        $this->view->showHome();
        
    }

    function showLogIn(){
        $this->view->showLogIn();
        
    }

    function showMarket(){
        $this->view->showMarket();
        
    }

    function showGames(){
        $this->view->showGames();
        
    }
    
}