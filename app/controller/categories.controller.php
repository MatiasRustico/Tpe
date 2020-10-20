<?php
include_once "app/views/games.view.php";
include_once "app/models/games.model.php";
include_once "app/models/categories.model.php";
include_once "app/helpers/auth.helper.php";

class CategoriesController {
    private $view;
    private $modelCategories;
    private $authHelper;

    function __construct() {
        $this->view = new GamesView ();
        $this->modelCategories = new CategoriesModel();
        $this->authHelper = new AuthHelper ();
        session_start();

    }


}