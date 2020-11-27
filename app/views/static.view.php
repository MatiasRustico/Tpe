<?php

require_once ('libs/smarty/libs/Smarty.class.php');

class StaticView {
    
    function showHome() {

        $smarty = New Smarty();

        $smarty->display('templates/show/showHome.tpl');

    }

    function showMarket() {

        $smarty = New Smarty();

        $smarty->display('templates/show/showMarket.tpl');
       
    }

    function showError($ms){
        echo ($ms);
    }
    
}