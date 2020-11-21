<?php

class ComentsModel { 

    private $db;

    function __construct() {
        // 1. Abro la conexión
       $this->db = $this->connect();
    }

    private function connect(){
        //abro conexion
        $db = new PDO('mysql:host=localhost;'.'dbname=db_juegos;charset=utf8', 'root', '');
        return $db;
    }

    //devuelve los juegos de la base de datos
    function getComents($id = null){

        //preparamos para traer todo
        $query = $this->db->prepare('SELECT * FROM comentarios');

        //ejecutamos
        $query->execute();
        
        //fetchAll para traer todos
        $coments = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $coments;
     
    }


    function remove($id){
        $query = $this->db->prepare('DELETE FROM comentarios WHERE id = ?');
        $query->execute([$id]);

        return $query->rowCount();
    }

    function addComent($comentario, $valoracion){
        
        if(isset($_SESSION['ID_USER'])){

            $id_usuario = $_SESSION['ID_USER'];
            $id_juego = $params[1];
        
            //agregar a la base de datos
            $query = $this->db->prepare('INSERT INTO comentarios (id_usuario, id_juego, comentario, valoracion) VALUES (?,?,?,?)');
            $query->execute([$id_usuario, $id_juego, $comentario, $valoracion]);

            return $this->db->lastInsertId();
        }
    }

    function get($id) {
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id = ?');
        $query->execute([$id]);
        $coment = $query->fetch(PDO::FETCH_OBJ);
        return $coment;
    }



}