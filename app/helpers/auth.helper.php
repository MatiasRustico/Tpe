 <?php

class AuthHelper {
    
    public function __construct() {}


    function checkPermit(){
        session_start();
        if (!isset($_SESSION['PERMIT'])){
            header("Location: " . BASE_URL . "login"); 
            die();
            
        }
            
    }

    function checkLogged(){
        session_start();
        if (!isset($_SESSION['USERNAME'])){
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
            if($user->permisos == 1){
                $_SESSION['PERMIT'] = $user->permisos;
            }
            
    }

}