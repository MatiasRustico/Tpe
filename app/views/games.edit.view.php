<?php

require_once ('libs/smarty/libs/Smarty.class.php');

class GamesEditView {
    
    function showHome() {

        $smarty = New Smarty();

        $smarty->display('templates/showHome.tpl');

    }

    function showMarket() {

        $smarty = New Smarty();

        $smarty->display('templates/showMarket.tpl');
       
    }

    function showGames($games, $categories) {

        $smarty = New Smarty();

        $smarty->assign('games', $games);

        $smarty->assign('categories', $categories);

        $smarty->display('templates/showGames.tpl');

    }




    function showError($ms){
        echo ($ms);
    }





    //Pasar por parametro $categories y $games
    function showCategorieEditable($categories, $games, $CategorieSelected){
        
        $smarty = New Smarty();

        $smarty->assign('games', $games);

        $smarty->assign('categories', $categories);

        $smarty->assign('CategorieSelected', $CategorieSelected);

        $smarty->display('templates/showCategorieEditable.tpl');

    }

    



}