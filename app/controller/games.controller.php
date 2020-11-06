<?php
include_once "app/views/games.view.php";
include_once "app/views/admin.view.php";
include_once "app/models/games.model.php";
include_once "app/models/categories.model.php";
include_once "app/helpers/auth.helper.php";

class GamesController {

    private $modelGames;
    private $view;
    private $modelCategories;
    private $authHelper;
    private $adminView;

    function __construct() {
        $this->view = new GamesView ();
        $this->modelGames = new GamesModel ();
        $this->modelCategories = new CategoriesModel();
        $this->authHelper = new AuthHelper ();
        $this->adminView = new AdminView ();
        session_start();

    }
    
    function showGames(){
        
        $games = $this->modelGames->getGames(); //agarra los datos de la database
        $categories = $this->modelCategories->getCategorie(); //agarra los datos de categorias
        $this->view->showGames($games, $categories);   

    }

    function showOneGame($id){

        $game = $this->modelGames->getOneGame($id); //agarra los datos de la database
        $id_cat = $game->id_categoria; //guardamos la id de la categoria
        $categorie = $this->modelCategories->getCategorie($id_cat); //agarra la categoria 
        $categories = $this->modelCategories->getCategorie();
        $this->view->showOneGame($categories, $categorie, $game, $id);   

    }


    //Construye un nombre unico de archivo y ademas lo mueva a mi carpeta de imagenes (images) 
    function uniqueSaveName($realName, $tempName){

        $filePath = "images_db/" . uniqid("", true) . "." 
            . strtolower(pathinfo($realName, PATHINFO_EXTENSION));

        move_uploaded_file($tempName, $filePath);
        
        return $filePath;
    }


    function insertGame(){
        //veririca
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

        if($_FILES['input_name']['type'] == "image/jpg" || 
            $_FILES['input_name']['type'] == "image/jpeg" || 
            $_FILES['input_name']['type'] == "image/png" ) 
        {
            $realName = $this->uniqueSaveName($_FILES['input_name']['name'], $_FILES['input_name']['tmp_name']);
            $id = $this->modelGames->addGame($nombre, $precio,  $categoria, $descripcion, $valoracion, $realName);
        } 
        else{
            $id = $this->modelGames->addGame($nombre, $precio,  $categoria, $descripcion, $valoracion);
        }
        header("Location: " . BASE_URL . "admin"); 
    }

    function editGame($id){
        //veririca
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

        $this->modelGames->editGame($id, $nombre, $precio,  $categoria, $descripcion, $valoracion);

        header("Location: " . BASE_URL . "games" ); 
    }

    function confirmDeleteGame($id){

        $this->adminView->showConfirmDelete($id);    
    }

    function deleteGame($id){

        //Verifica
        $this->authHelper->checkLogged();

        $this->modelGames->removeGame($id);
        header("Location: " . BASE_URL . "games" ); 
    }


    


    

}
