<?php
include_once "app/views/games.view.php";
include_once "app/models/games.model.php";
include_once "app/models/categories.model.php";
include_once "app/helpers/auth.helper.php";

class GamesController {

    private $modelGames;
    private $view;
    private $modelCategories;
    private $authHelper;

    function __construct() {
        $this->view = new GamesView ();
        $this->modelGames = new GamesModel ();
        $this->modelCategories = new CategoriesModel();
        $this->authHelper = new AuthHelper ();
        session_start();

    }
    
    function showGames(){
        
        $games = $this->modelGames->getGames(); //agarra los datos de la database
        $categories = $this->modelCategories->getCategories(); //agarra los datos de categorias
        $this->view->showGames($games, $categories);   

    }

    function showOneGame($id){

        $games = $this->modelGames->getGames(); //agarra los datos de la database
        $categories = $this->modelCategories->getCategories(); //agarra los datos de categorias
        $this->view->showOneGame($games, $categories, $id);   

    }



    function showCategorieItem($CategorieSelected){
        $games = $this->modelGames->getGames();
        $categories = $this->modelCategories->getCategories();
        $this->view->showCategorie($categories, $games, $CategorieSelected);
    }


    

}
