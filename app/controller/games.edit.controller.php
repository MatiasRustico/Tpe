<?php
include_once "app/views/games.edit.view.php";
include_once "app/models/games.edit.model.php";
include_once "app/models/categories.model.php";


class GamesEditController {

    private $modelGames;
    private $view;
    private $modelCategories;


    function __construct() {
        $this->view = new GamesEditView ();
        $this->modelGames = new GamesEditModel ();
        $this->modelCategories = new CategoriesModel();
        $this->checkLogged();

    }
    
    function showGames(){
        
        $games = $this->modelGames->getGames(); //agarra los datos de la database
        $categories = $this->modelCategories->getCategories(); //agarra los datos de categorias
        $this->view->showGames($games, $categories);   
    }

    
    
    function insertGame(){
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
        $this->modelGames->removeGame($id);
        header("Location: " . BASE_URL . "games/" ); 
    }

    function showCategorieItem($CategorieSelected){
        
        $games = $this->modelGames->getGames();
        $categories = $this->modelCategories->getCategories();
        $this->view->showCategorie($categories, $games, $CategorieSelected);
    }

    function checkLogged(){
        session_start();
        if (!isset($_SESSION['ID_USER'])){
            header("Location: " . BASE_URL . "login"); 
            die();
        }
            
    }
}
