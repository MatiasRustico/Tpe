<?php
require_once ('libs/smarty/libs/Smarty.class.php');
class AuthView {

    function showLogIn() {

        $smarty = New Smarty();

        $smarty->display('templates/showLogIn.tpl');

             
    }
}