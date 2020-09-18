<?php
include_once "app/controller/games.controller.php";

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían en este caso es el home de la pagina
}

// parsea la accion Ej: suma/1/2 --> ['suma', 1, 2]
$params = explode('/', $action);

// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        $controller = new GamesController();
        $controller->showHome();
        break;
    case 'login':
        $controller = new GamesController();
        $controller->showLogIn();
        break;
    case 'market':
        $controller = new GamesController();
        $controller->showMarket();
        break;
    default:
        echo('404 Page not found');
        break;
}
