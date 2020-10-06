<?php

require_once ('libs/smarty/libs/Smarty.class.php');
class GamesView {
    
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

    function showLogIn() {

        $smarty = New Smarty();

        $smarty->display('templates/showLogIn.tpl');

             
    }


    function showError($ms){
        echo ($ms);
    }





    //Pasar por parametro $categories y $games
    function showCategorie($categories, $games, $CategorieSelected){
        
        $smarty = New Smarty();

        $smarty->assign('games', $games);

        $smarty->assign('categories', $categories);

        $smarty->assign('CategorieSelected', $CategorieSelected);

        $smarty->display('templates/showCategorie.tpl');

    }

    



}