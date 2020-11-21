<?php
require_once 'libs/Router.php';
require_once 'app/api/api-games.controller.php';
require_once 'app/api/api-coments.controller.php';

//creo router

$router = new Router();

//armo la tabla de ruteo

$router->addRoute('comentarios', 'GET', 'ApiComentsController', 'getAllComents'); 
$router->addRoute('comentarios', 'POST', 'ApiComentsController', 'addComent');

$router->addRoute('games', 'GET', 'ApiGamesController', 'getAll'); 
$router->addRoute('games/:ID', 'GET', 'ApiGamesController', 'getOne'); 
$router->addRoute('games/:ID', 'DELETE', 'ApiGamesController', 'deleteOne');

$router->addRoute('games', 'POST', 'ApiGamesController', 'add'); 

$router->addRoute('games/:ID', 'PUT', 'ApiGamesController', 'update');  

$router->setDefaultRoute('ApiComentsController','show404');


//rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
