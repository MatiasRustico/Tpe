<?php

include_once "app/views/admin.view.php";
include_once "app/helpers/auth.helper.php";

class AdminController {

    
    private $view;
    private $model;
    private $authHelper;

    function __construct() {
        $this->view = new AdminView ();
        $this->authHelper = new AuthHelper();
        $this->modelGames = new GamesModel ();
        $this->modelCategories = new CategoriesModel();

    }

    function showAdmin(){
        //veririca
        $this->authHelper->checkLogged();
        $games = $this->modelGames->getGames(); //agarra los datos de la database
        $categories = $this->modelCategories->getCategories(); //agarra los datos de categorias
        $this->view->showAdmin($games, $categories);
        
    }
   
}