<?php

include_once "app/views/admin.view.php";
include_once "app/models/admin.model.php";
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
        $this->modelAdmin = new AdminModel ();

    }

    function showAdmin(){
        //veririca
        $this->authHelper->checkLogged();
        $games = $this->modelGames->getGames(); //agarra los datos de la database
        $categories = $this->modelCategories->getCategories(); //agarra los datos de categorias
        $this->view->showAdmin($games, $categories);
        
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

        $id = $this->modelAdmin->addGame($nombre, $precio,  $categoria, $descripcion, $valoracion);

        header("Location: " . BASE_URL . "admin"); 
    }

    function deleteGame($id){
        //veririca
        $this->authHelper->checkLogged();
        $this->modelAdmin->removeGame($id);
        header("Location: " . BASE_URL . "games" ); 
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

        $this->modelAdmin->editGame($id, $nombre, $precio,  $categoria, $descripcion, $valoracion);

        header("Location: " . BASE_URL . "games" ); 
    }

    function insertCategorie(){
        //veririca
        $this->authHelper->checkLogged();
        $categorie = $_POST['categorie'];
        $descripcion = $_POST['descripcion'];
        

        if (empty($categorie)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $id = $this->modelAdmin->addCategorie($categorie, $descripcion);

        header("Location: " . BASE_URL . "admin"); 
    }



    function deleteCategorie($id){
        //veririca
        $this->authHelper->checkLogged();
        $this->modelAdmin->removeCategorie($id);
        header("Location: " . BASE_URL . "admin" ); 
    }

    function editCategorie(){
        //veririca
        $this->authHelper->checkLogged();
        $id = $_POST['categorie_id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        
        if (empty($nombre)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $this->modelAdmin->editCategorie($id, $nombre, $descripcion);

        header("Location: " . BASE_URL . "admin" ); 

    }

    function confirmDeleteGame($id){
        //veririca
        $this->authHelper->checkLogged();
        $this->view->showConfirmDelete($id);    
    }
}