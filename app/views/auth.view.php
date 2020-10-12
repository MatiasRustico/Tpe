<?php
require_once ('libs/smarty/libs/Smarty.class.php');
class AuthView {

    function showLogIn($error = null) {

        $smarty = New Smarty();
        $smarty->assign('error', $error);
        $smarty->display('templates/showLogIn.tpl');
  
    }

    function showError($ms){
        echo ($ms);
    }
}