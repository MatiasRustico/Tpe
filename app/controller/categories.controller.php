<?php
include_once "app/views/games.view.php";
include_once "app/views/admin.view.php";
include_once "app/models/games.model.php";
include_once "app/models/categories.model.php";
include_once "app/models/games.model.php";
include_once "app/helpers/auth.helper.php";

class CategoriesController {
    private $view;
    private $adminView;
    private $modelCategories;
    private $modelGames;
    private $authHelper;

    function __construct() {
        $this->view = new GamesView ();
        $this->adminView = new AdminView ();
        $this->modelCategories = new CategoriesModel();
        $this->modelGames = new GamesModel();
        $this->authHelper = new AuthHelper ();
        session_start();

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

        $id = $this->modelCategories->addCategorie($categorie, $descripcion);

        header("Location: " . BASE_URL . "admin"); 
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

        $this->modelCategories->editCategorie($id, $nombre, $descripcion);

        header("Location: " . BASE_URL . "admin" ); 

    }

    function showCategorieItem($id){
        $games = $this->modelGames->getGames($id);

        $categories = $this->modelCategories->getCategorie();

        $categorie = $this->modelCategories->getCategorie($id);

        $this->view->showCategorie($categories, $categorie, $games, $id);
    }

    function deleteCategorie($id){
        //veririca
        $this->authHelper->checkLogged();

        $this->modelCategories->removeCategorie($id);
        header("Location: " . BASE_URL . "admin" ); 
    }

    function confirmDeleteCategorie($id){

        $this->adminView->showConfirmDeleteCategorie($id);    
    }

}