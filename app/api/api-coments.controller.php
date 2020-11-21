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

    public function getAllComents(){
     
        $coments = $this->model->getComents();
        
        if ($coments){
            $this->view->response($coments, 200);
        }else {
            $this->view->response("el comentario con el id:$id no existe", 404);
        }
    }

    

    public function addComent($params = null) {

        $body = $this->getData();

        $comentario  = $body->comentario;
        $valoracion    = $body->valoracion;

        $id = $this->model->addComent($comentario, $valoracion);

        if ($id > 0) {
            $coment = $this->model->get($id);
            $this->view->response($coment, 200);
        }
        else { 
            $this->view->response("No se pudo insertar", 500);
        }
    }


    public function show404($params = null){
        $this->view->response("El recurso solicitado no existe", 404);    
    }


}


