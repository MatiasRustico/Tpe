<?php
require_once 'libs/Router.php';
require_once 'app/api/api-games.controller.php';
require_once 'app/api/api-coments.controller.php';
require_once 'app/api/api-users.controller.php';


//creo router

$router = new Router();

//armo la tabla de ruteo

//buscar los comentarios de un juego en especifico
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentsController', 'getComents'); //comentarios / id del juego
//subir un comentario
$router->addRoute('comentarios', 'POST', 'ApiComentsController', 'addComent');
//borrar un comentario
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentsController', 'deleteComent');//comentarios / id del comentario




//buscar los usuarios
$router->addRoute('usuarios', 'GET', 'ApiUsersController', 'getUsers'); 


$router->addRoute('games', 'GET', 'ApiGamesController', 'getAll'); 
$router->addRoute('games/:ID', 'GET', 'ApiGamesController', 'getOne'); 
$router->addRoute('games/:ID', 'DELETE', 'ApiGamesController', 'deleteOne');

$router->addRoute('games', 'POST', 'ApiGamesController', 'add'); 

$router->addRoute('games/:ID', 'PUT', 'ApiGamesController', 'update');  

$router->setDefaultRoute('ApiComentsController','show404');


//rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
