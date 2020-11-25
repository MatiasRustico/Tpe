<?php
include_once "app/models/coments.model.php";
include_once "app/api/api.view.php";


class ApiComentsController {
    
    private $model;
    private $view;
    

    function __construct(){
        $this->model = new ComentsModel();
        $this->view = new APIview();
        $this->data = file_get_contents("php://input");
    }

    function getData(){
        return json_decode($this->data);
    }

    //obtenemos por parametro la id del juego del cual queremos mostrar los comentaios
    public function getComents($params = null){

        //agarramos la id
        $id = $params[':ID'];

        //llamamos al modelo para buscarlos
        $coments = $this->model->getComents($id);
        
        //manejo el codigo respuesta
        if ($coments){
            if ($coments){
                $this->view->response($coments, 200);
            }else {
                $this->view->response("no existen comentarios", 404);
            }
        }
    }

    

    public function addComent($params = null) {

        session_start();

        $body = $this->getData();
   
        
        
        $comentario  = $body->comentario;
        $valoracion    = $body->valoracion;
        $idjuego = $body->idjuego;//js
        


        $id = $this->model->addComent($comentario, $valoracion, $idjuego);

        if ($id > 0) {
            $coment = $this->model->get($id);
            $this->view->response($coment, 200);
            
        }
        else { 
            $this->view->response("No se pudo insertar", 500);
        }
    }


    function deleteComent($params){
        
        $id = $params[':ID'];
        echo($id);
        $success = $this->model->deleteComent($id);
        if ($success){
            $this->view->response("el comentario con el id:$id se borro exitosamente", 200);
        }else{
            $this->view->response("el comentario con el id:$id no existe", 404);
        }
    }
    
    public function show404($params = null){
        $this->view->response("El recurso solicitado no existe", 404);    
    }


}


