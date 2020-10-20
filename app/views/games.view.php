<?php

require_once ('libs/smarty/libs/Smarty.class.php');

class GamesView {
    
    

    function showGames($games, $categories) {

        $smarty = New Smarty();

        $smarty->assign('games', $games);

        $smarty->assign('categories', $categories);

        $smarty->display('templates/showGames.tpl');

    }

    function showGamesEdit($games, $categories) {

        $smarty = New Smarty();

        $smarty->assign('games', $games);

        $smarty->assign('categories', $categories);

        $smarty->display('templates/showGames.tpl');

    }

    function showOneGame($games, $categories, $id) {

        $smarty = New Smarty();

        $smarty->assign('games', $games);

        $smarty->assign('categories', $categories);

        $smarty->assign('id', $id);

        $smarty->display('templates/showOneGame.tpl');

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