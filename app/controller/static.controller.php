<?php
include_once "app/views/games.view.php";
include_once "app/models/games.model.php";
include_once "app/models/categories.model.php";

class StaticController {
    
    private $modelGames;
    private $view;
    private $modelCategories;

    function __construct() {
        $this->view = new GamesView ();
        $this->modelGames = new GamesModel ();
        $this->modelCategories = new CategoriesModel();
        session_start();
        
    }

    function showMarket(){
        $this->view->showMarket();
    }

    function showHome(){
        $this->view->showHome();
    } 
}