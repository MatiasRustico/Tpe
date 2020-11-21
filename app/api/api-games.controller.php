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
        $this->data = file_get_contents("php://input");
    }

    //lee ela variable asociada a la entrada estandar y la convierte en JSON
    function getData(){
        return json_decode($this->data);
    }



    public function getAll($params = null){
        //verifica
        //$this->authHelper->checkLogged();

        $parametros = [];

        if (isset($_GET['sort'])){
            $parametros['sort'] = $_GET['sort'];
            
        }

        if (isset($_GET['order'])){
            $parametros['order'] = $_GET['order'];
            
        }

        

        $games = $this->model->getGames($parametros);

        if ($games){
            $this->view->response($games, 200);
        }else {
            $this->view->response("el juego con el id:$id no existe", 404);
        }
    }

    public function getOne($params = null){ //params es un array asociativo con los parametros de la ruta
        //verifica
        //$this->authHelper->checkLogged();

        $id = $params[':ID']; 
        $game = $this->model->getOneGame($id);
        if ($game){
            $this->view->response($game, 200);
        }
        else{
            $this->view->response("el juego con el id:$id no existe", 404);
        }
        
        
    }

    function deleteOne($params = null){
        //verifica
        //$this->authHelper->checkLogged();

        $id = $params[':ID'];
        $success = $this->model->remove($id);
        if ($success){
            $this->view->response("el juego con el id:$id se borro exitosamente", 200);
        }else{
            $this->view->response("el juego con el id:$id no existe", 404);
        }
        
    }


    public function add($params = null){
        //verifica
        //$this->authHelper->checkLogged();

        $body = $this->getData();

        $nombre         = $body->nombre;
        $precio         = $body->precio;
        $id_categoria   = $body->id_categoria;
        $descripcion    = $body->descripcion;
        $valoracion     = $body->valoracion;
        

        $id = $this->model->addGame($nombre, $precio, $id_categoria, $descripcion, $valoracion);
        
        if ($id > 0){
            $this->view->response("Se agrego el juego con el id:$id exitosamente", 200);
        }else{
            $this->view->response("El juego con el id:$id no se pudo insertar", 500);
        }
        
    }

    public function update($params = null){
        //verifica
        //$this->authHelper->checkLogged();

        $idGame = $params[':ID'];

        $body = $this->getData();

        $nombre         = $body->nombre;
        $precio         = $body->precio;
        $id_categoria   = $body->id_categoria;
        $descripcion    = $body->descripcion;
        $valoracion     = $body->valoracion;
        

        $success = $this->model->editGameAPI($idGame, $nombre, $precio, $id_categoria, $descripcion, $valoracion);
        
        if ($success){
            $this->view->response("Se actualizo  el juego con el id:$idGame exitosamente", 200);
        }else{
            $this->view->response("El juego con el id:$idGame no se pudo editar", 500);
        }
        
    }

 
}