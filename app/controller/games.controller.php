<?php
include_once "app/views/games.view.php";
include_once "app/models/algo.php";


class GamesController {

    private $model;
    private $view;

    function __construct() {
        $this->view = new GamesView ();
        $this->model = new GamesModel ();
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
        $games = $this->model->getGames();
        $this->view->showGames($games);
        
    }
    
}