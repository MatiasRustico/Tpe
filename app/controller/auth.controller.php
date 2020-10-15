<?php

include_once "app/views/auth.view.php";
include_once "app/models/user.model.php";
include_once "app/helpers/auth.helper.php";

class AuthController {

    
    private $view;
    private $model;
    private $authHelper;

    function __construct() {
        $this->view = new AuthView ();
        $this->model = new UserModel ();
        $this->authHelper = new AuthHelper();
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


            $this->authHelper->logIn($user);
            

            header("Location: " . BASE_URL . "home"); 
        }else{
            $this->view->showLogIn('CREDENCIALES INVALIDAS ⚠');
        }

    }

    function logOut(){
        $this->authHelper->logOut();
    }

}