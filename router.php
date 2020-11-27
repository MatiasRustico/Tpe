<?php
include_once "app/controller/auth.controller.php";
include_once "app/controller/games.controller.php";
include_once "app/controller/admin.controller.php";
include_once "app/controller/static.controller.php";
include_once "app/controller/categories.controller.php";



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

        /* "Show" Cases */

    case 'login':
        $controller = new AuthController();
        $controller->showLogIn();
        break;
    case 'register':
        $controller = new AuthController();
        $controller->showRegister();
        break;
    case 'home':
        $controller = new StaticController();
        $controller->showHome();
        break;
    case 'market':
        $controller = new StaticController();
        $controller->showMarket();
        break;
    case 'categories':
        $controller = new CategoriesController();
        $id = $params[1];
        $controller->showCategorieItem($id);
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
    case 'admin':
        $controller = new AdminController();
        $controller->showAdmin();
        break;
    
        /* "Acción" Cases */

    case 'logout':
        $controller = new AuthController();
        $controller->logOut();
        break;
    case 'verify':
        $controller = new AuthController();
        $controller->verifyUser();
        break;
    case 'verifyregister':
        $controller = new AuthController();
        $controller->verifyRegister();
        break;
    
        /* "Edit" Cases */

    case 'insert':
        $controller = new GamesController();
        $controller->insertGame();
        break;
    case 'edit':
        $controller = new GamesController();
        $id = $params[1];
        $controller->editGame($id);
        break;
    case 'insertcategorie':
        $controller = new CategoriesController();
        $controller->insertCategorie();
        break;
    case 'editcategorie':
        $controller = new CategoriesController();
        $controller->editCategorie($id);
        break;
    case 'removeimagen':
        $controller = new GamesController();
        $id = $params[1];
        $controller->removeimagen($id);
        break;    
    case 'addpermit':
        $controller = new AdminController();
        $id = $params[1];
        $controller->addPermit($id);
        break;

        /* "Delete" Cases */   

    case 'confirmdeletegame':
        $controller = new GamesController();
        $id = $params[1];
        $controller->confirmDeleteGame($id);
        break;  
    case 'deletegame':
        $controller = new GamesController();
        $id = $params[1];
        $controller->deleteGame($id);
        break;
    case 'confirmdeletecategorie':
        $controller = new CategoriesController();
        $id = $params[1];
        $controller->confirmDeleteCategorie($id);
        break;
    case 'deletecategorie':
        $controller = new CategoriesController();
        $id = $params[1];
        $controller->deleteCategorie($id);
        break;  
    case 'confirmdeleteuser':
        $controller = new AdminController();
        $id = $params[1];
        $controller->confirmDeleteUser($id);
        break;
    case 'deleteuser':
        $controller = new AdminController();
        $id = $params[1];
        $controller->deleteUser($id);
        break;

        /* ... */


    default:
        echo('404 Page not found');
        break;
}
