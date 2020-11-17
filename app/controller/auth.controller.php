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
        
        if ($user && password_verify($password, $user->pass)){


            $this->authHelper->logIn($user);
            

            header("Location: " . BASE_URL . "home"); 
        }else{
            $this->view->showLogIn('CREDENCIALES INVALIDAS ⚠');
        }

    }

    function logOut(){
        $this->authHelper->logOut();
    }


    function showRegister(){
        $this->view->showRegister();  
    }

    function verifyRegister(){
        $userForm = $_POST['user'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        
        if (empty($userForm) || empty($password) || empty($email)) {
            $this->view->showRegister('Faltan datos obligatorios ⚠');
            die();
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
       
        $id = $this->model->addUser($userForm, $hash, $email);
        

        $user = $this->model->getByUser($userForm);
        $this->authHelper->logIn($user);

        header("Location: " . BASE_URL . "home"); 
        
    }

}