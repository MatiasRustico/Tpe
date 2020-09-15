<?php
include_once 'app/models/games.models.php';
include_once 'app/views/games.view.php';

class GamesController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new GamesModel();
        $this->view = new GamesView();
    }

    /**
     * Imprime la lista de tareas
     */
    function showTasks() {
        // obtiene las tareas del modelo
        $tasks = $this->model->getAll();

       // actualizo la vista
       $this->view->showTasks($tasks);
    }

    /**
     * Inserta una tarea en el sistema
     */
    function addTask() {
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $prioridad = $_POST['prioridad'];

        // verifico campos obligatorios
        if (empty($titulo) || empty($prioridad)) {
            $this->view->showError('Faltan datos obligatorios');
            die();
        }

        // inserto la tarea en la DB
        $id = $this->model->insert($titulo, $descripcion,  $prioridad);

        // redirigimos al listado
        header("Location: " . BASE_URL); 
    }

    /**
     * Elimina la tarea del sistema
     */
    function deleteTask($id) {
        $this->model->remove($id);
        header("Location: " . BASE_URL); 
    }

    function finalizeTask() {
        echo "TODO: FINALIZAR LA TAREA";
    }

}