<?php
include_once "app/models/user.model.php";
include_once "app/api/api.view.php";


class ApiUsersController {
    
    private $model;
    private $view;
    

    function __construct(){
        $this->model = new UserModel();
        $this->view = new APIview();
        $this->data = file_get_contents("php://input");
    }

    function getData(){
        return json_decode($this->data);
    }

    //obtenemos por parametro a los usuarios
    public function getUsers(){

        //llamamos al modelo para buscarlos
        $users = $this->model->getUsers();
        
        //manejo el codigo respuesta
        if ($users){
            $this->view->response($users, 200);
        }else {
            $this->view->response("no existen comentarios", 404);
        }
    }

    public function show404($params = null){
        $this->view->response("El recurso solicitado no existe", 404);    
    }

}