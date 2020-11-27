<?php

include_once "app/views/admin.view.php";
include_once "app/helpers/auth.helper.php";
include_once "app/models/categories.model.php";
include_once "app/models/games.model.php";
include_once "app/models/user.model.php";

class AdminController {

    private $authHelper;
    private $view;
    private $modelGames;
    private $modelCategories;
    private $modelUsers;
    

    function __construct() {
        $this->view = new AdminView ();
        $this->authHelper = new AuthHelper();
        $this->modelGames = new GamesModel ();
        $this->modelCategories = new CategoriesModel();
        $this->modelUsers = new UserModel();

    }

    function showAdmin(){
        //Verifica
        $this->authHelper->checkPermit();
        $games = $this->modelGames->getGames(); //agarra los datos de la database
        $categories = $this->modelCategories->getCategorie(); //agarra los datos de categorias
        $users = $this->modelUsers->getUsers(); //agarra los datos de usuarios
        $this->view->showAdmin($games, $categories, $users);
        
    }

    function deleteUser($id){//maneja la db
        //Verifica
        $this->authHelper->checkPermit();

        $this->modelUsers->removeUser($id);
        
        header("Location: " . BASE_URL . "admin" ); 
    }

    function confirmDeleteUser($id){//pregunta por el confirmado

        $user = $this->modelUsers->getOneUser($id);
        $nameUser = $user->user;
        $this->view->showConfirmDeleteUser($id, $nameUser);  
    }

    function addPermit($id){
        //Verifica
        $this->authHelper->checkPermit();

        $users = $this->modelUsers->getUsers();
        $total = 0;
        $permit = $_POST['permit'];
        
        foreach($users as $user){
            if($user->permisos == 1){
                $total++;
            }
        }

        if ($permit == "on"){
            $this->modelUsers->userPermits($id, 1); 
        }
        else{
            if($total > 1){
                $this->modelUsers->userPermits($id, 0); 
            }
            
        }
        $total = 0;
        
        header("Location: " . BASE_URL . "admin"); 

    }
   

}