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
            $this->view->showLogIn('Faltan datos obligatorios ⚠');
            die();
        }

        $user = $this->model->getByUser($userForm);
        
        if ($user && password_verify($password, $user->password)){

            session_start();
            $_SESSION['ID_USER'] = $user->id;
            $_SESSION['USERNAME'] = $user->user;

            header("Location: " . BASE_URL . "home"); 
        }else{
            $this->view->showLogIn('CREDENCIALES INVALIDAS ⚠');
        }

    }

    function logOut(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "login"); 

    }

}