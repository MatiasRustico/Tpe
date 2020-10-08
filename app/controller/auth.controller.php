<?php

include_once "app/views/auth.view.php";
include_once "app/models/games.model.php";
include_once "app/models/categories.model.php";

class authController {

    
    private $view;
    

    function __construct() {
        $this->view = new AuthView ();
    }

    function showLogIn(){
        $this->view->showLogIn();
        
    }


}