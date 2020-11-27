<?php

require_once ('libs/smarty/libs/Smarty.class.php');

class AdminView {
    
    function showAdmin($games, $categories, $users){

        $smarty = New Smarty();

        $smarty->assign('games', $games);

        $smarty->assign('categories', $categories);

        $smarty->assign('users', $users);

        $smarty->display('templates/show/showAdmin.tpl');

    }


    function showConfirmDeleteUser($id, $user){
    
        $smarty = New Smarty();

        $smarty->assign('id', $id);

        $smarty->assign('user', $user);

        $smarty->display('templates/confirm/confirmationDeleteUser.tpl');

    }

    function showConfirmDelete($id, $game){
    
        $smarty = New Smarty();

        $smarty->assign('id', $id);

        $smarty->assign('game', $game);

        $smarty->display('templates/confirm/confirmationDelete.tpl');

    }

    function showConfirmDeleteCategorie($id, $categorie){
    
        $smarty = New Smarty();

        $smarty->assign('id', $id);

        $smarty->assign('categorie', $categorie);


        $smarty->display('templates/confirm/confirmationDeleteCategorie.tpl');

    }

    function showError($ms){
        echo ($ms);
    }

}