<?php
include_once "app/views/static.view.php";

class StaticController {
    
    private $view;

    function __construct() {
        $this->view = new StaticView ();
        session_start();
        
    }

    function showMarket(){
        $this->view->showMarket();
    }

    function showHome(){
        $this->view->showHome();
    } 
}