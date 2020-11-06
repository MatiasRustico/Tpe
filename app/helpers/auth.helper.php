 <?php

class AuthHelper {
    
    public function __construct() {}


    function checkLogged(){
        session_start();
        if (!isset($_SESSION['ID_USER'])){
            header("Location: " . BASE_URL . "login"); 
            die();
        }
            
    }

    function logOut(){
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "home"); 

    }

    function logIn($user){
        session_start();
            $_SESSION['ID_USER'] = $user->id;
            $_SESSION['USERNAME'] = $user->user;
    }

}