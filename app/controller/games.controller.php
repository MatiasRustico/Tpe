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


    
    
    function insertGame(){
        $this->authHelper->checkLogged();
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];
        $valoracion = $_POST['valoracion'];
        $descripcion = $_POST['descripcion'];

        if (empty($nombre) || empty($precio) || empty($categoria) || empty($valoracion)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $id = $this->modelGames->addGame($nombre, $precio,  $categoria, $descripcion, $valoracion);

        header("Location: " . BASE_URL . "games"); 
    }

    function deleteGame($id){
        $this->authHelper->checkLogged();
        $this->modelGames->removeGame($id);
        header("Location: " . BASE_URL . "games/" ); 
    }

    function editGame(){
        $this->authHelper->checkLogged();
        $id = $_POST['game_id'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];
        $valoracion = $_POST['valoracion'];
        $descripcion = $_POST['descripcion'];

        if (empty($nombre) || empty($precio) || empty($categoria) || empty($valoracion)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $this->modelGames->editGame($id, $nombre, $precio,  $categoria, $descripcion, $valoracion);

        header("Location: " . BASE_URL . "games/" ); 
    }


    function showCategorieItem($CategorieSelected){
        $games = $this->modelGames->getGames();
        $categories = $this->modelCategories->getCategories();
        $this->view->showCategorie($categories, $games, $CategorieSelected);
    }


    

}
