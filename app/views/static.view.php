<?php

require_once ('libs/smarty/libs/Smarty.class.php');

class StaticView {
    
    function showHome() {

        $smarty = New Smarty();

        $smarty->display('templates/showHome.tpl');

    }

    function showMarket() {

        $smarty = New Smarty();

        $smarty->display('templates/showMarket.tpl');
       
    }


    function showError($ms){
        echo ($ms);
    }
    



}