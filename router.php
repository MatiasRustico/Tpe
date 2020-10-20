<?php
include_once "app/controller/static.controller.php";
include_once "app/controller/games.controller.php";
include_once "app/controller/auth.controller.php";
include_once "app/controller/categories.controller.php";
include_once "app/controller/admin.controller.php";


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
        $controller = new StaticController();
        $controller->showHome();
        break;
    case 'market':
        $controller = new StaticController();
        $controller->showMarket();
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogIn();
        break;
    case 'verify':
        $controller = new AuthController();
        $controller->verifyUser();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logOut();
        break;
    case 'games':
        $controller = new GamesController();
        $controller->showGames();
        break;
    case 'game':
        $controller = new GamesController();
        $id = $params[1];
        $controller->showOneGame($id);
        break;
    case 'insert': //se va a ejecutar cuando le des ok al formulario
        $controller = new AdminController();
        $controller->insertGame();
        break;
    case 'delete':
        $controller = new AdminController();
        $id = $params[1];
        $controller->deleteGame($id);
        break;
    case 'confirmdelete':
        $controller = new AdminController();
        $id = $params[1];
        $controller->deleteGame($id);
        break;
    case 'edit':
        $controller = new AdminController();
        $id = $params[1];
        $controller->editGame($id);
        break;
    case 'categories':
        $controller = new GamesController();
        $controller->showCategorieItem($params[1]);
        break;
    case 'insertcategorie':
        $controller = new AdminController();
        $controller->insertCategorie();
        break;
    case 'deletecategorie':
        $controller = new AdminController();
        $id = $params[1];
        $controller->deleteCategorie($params[1]);
        break;
    case 'editcategorie':
        $controller = new AdminController();
        $controller->editCategorie($id);
        break;
    case 'admin':
        $controller = new AdminController();
        $controller->showAdmin();
        break;
        

    default:
        echo('404 Page not found');
        break;
}
