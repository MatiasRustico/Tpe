<?php

require_once ('libs/smarty/libs/Smarty.class.php');

class AdminView {
    
    function showAdmin($games, $categories){

        $smarty = New Smarty();

        $smarty->assign('games', $games);

        $smarty->assign('categories', $categories);

        $smarty->display('templates/showAdmin.tpl');

    }

    function showError($ms){
        echo ($ms);
    }

}