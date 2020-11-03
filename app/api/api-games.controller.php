<?php
include_once "app/models/games.model.php";
include_once "app/api/api.view.php";
include_once "app/helpers/auth.helper.php";

class ApiGamesController {

    private $model;
    private $view;
    private $authHelper;


    function __construct(){
        $this->model = new GamesModel();
        $this->view = new APIview();
        $this->authHelper = new AuthHelper();

    }

    

    public function getAll($params = null){
        //verifica
        $this->authHelper->checkLogged();

        $games = $this->model->getGames();

        if ($games){
            $this->view->response($games, 200);
        }else {
            $this->view->response("la tarea con el id:$id no existe", 404);
        }
        
    }

    public function getOne($params = null){ //params es un array asociativo con los parametros de la ruta
        //verifica
        $this->authHelper->checkLogged();

        $id = $params[':ID']; 
        $game = $this->model->getOneGame($id);
        if ($game)
            $this->view->response($game, 200);
        else 
            $this->view->response("la tarea con el id:$id no existe", 404);
        
        
    }

}