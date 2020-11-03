<?php
require_once 'libs/Router.php';
require_once 'app/api/api-games.controller.php';

//creo router

$router = new Router();

//armo la tabla de ruteo
$router->addRoute('games', 'GET', 'ApiGamesController', 'getAll'); 
$router->addRoute('games/:ID', 'GET', 'ApiGamesController', 'getOne'); 


//rutea
$router->route($_GET["resourse"], $_SERVER['REQUEST_METHOD']);
