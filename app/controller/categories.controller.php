<?php
include_once "app/views/games.view.php";
include_once "app/models/games.model.php";
include_once "app/models/categories.model.php";
include_once "app/helpers/auth.helper.php";

class CategoriesController {
    private $view;
    private $modelCategories;
    private $authHelper;

    function __construct() {
        $this->view = new GamesView ();
        $this->modelCategories = new CategoriesModel();
        session_start();

    }

    
    function insertCategorie(){
        $categorie = $_POST['categorie'];
        $descripcion = $_POST['descripcion'];
        

        if (empty($categorie)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $id = $this->modelCategories->addCategorie($categorie, $descripcion);

        header("Location: " . BASE_URL . "games"); 
    }



    function deleteCategorie($id){
        $this->modelCategories->removeCategorie($id);
        header("Location: " . BASE_URL . "games/" ); 
    }
}