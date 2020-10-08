<?php

include_once "app/views/auth.view.php";
include_once "app/models/user.model.php";

class AuthController {

    
    private $view;
    private $model;

    function __construct() {
        $this->view = new AuthView ();
        $this->model = new UserModel ();
    }

    function showLogIn(){
        $this->view->showLogIn();
        
    }

    function verifyUser(){
        $userForm = $_POST['user'];
        $password = $_POST['password'];
        
        if (empty($userForm) || empty($password)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        $user = $this->model->getByUser($userForm);
        
        if ($user && password_verify($password, $user->password)){
            echo('buen camino tomi segui asi tk');
        }else{
            echo('mi loco dele pa fuera');
        }

    }


}