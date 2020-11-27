<?php
require_once ('libs/smarty/libs/Smarty.class.php');
class AuthView {

    function showLogIn($error = null) {

        $smarty = New Smarty();
        $smarty->assign('error', $error);
        $smarty->display('templates/show/showLogIn.tpl');
  
    }

    function showRegister($error = null) {

        $smarty = New Smarty();
        $smarty->assign('error', $error);
        $smarty->display('templates/show/showRegister.tpl');
  
    }

    function showError($ms){
        echo ($ms);
    }
}