<?php
require_once 'libs/Router.php';
require_once 'app/api/api-games.controller.php';

//creo router

$router = new Router();

//armo la tabla de ruteo
$router->addRoute('games', 'GET', 'ApiGamesController', 'getAll'); 
$router->addRoute('games/:ID', 'GET', 'ApiGamesController', 'getOne'); 
$router->addRoute('games/:ID', 'DELETE', 'ApiGamesController', 'deleteOne');

$router->addRoute('games', 'POST', 'ApiGamesController', 'add'); 

$router->addRoute('games/:ID', 'PUT', 'ApiGamesController', 'update');  


//rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
