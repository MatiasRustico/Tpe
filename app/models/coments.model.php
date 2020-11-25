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
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id_juego = ?');

        //ejecutamos
        $query->execute([$id]);
        
        //fetchAll para traer todos
        $coments = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $coments;
     
    }


    function deleteComent($id){
        $query = $this->db->prepare('DELETE FROM comentarios WHERE id = ?');
        $success = $query->execute([$id]);

        return $success;
    }

    function addComent($comentario, $valoracion, $idjuego){
        
        

        if(isset($_SESSION['ID_USER'])){
            
            $id_usuario = $_SESSION['ID_USER'];
            
            $id_juego = $idjuego;

           
            //agregar a la base de datos
            $query = $this->db->prepare('INSERT INTO comentarios (id_usuario, id_juego, comentario, valoracion) VALUES (?,?,?,?)');
            $query->execute([$id_usuario, $id_juego, $comentario, $valoracion]);
     
            return $this->db->lastInsertId();
        }
    }



    /*function deleteComent($id){
        $query = $this->db->prepare('DELETE FROM comentarios WHERE id = ?');
        $query->execute([$id]);
    }*/



    function get($id) {
        $query = $this->db->prepare('SELECT * FROM comentarios WHERE id = ?');
        $query->execute([$id]);
        $coment = $query->fetch(PDO::FETCH_OBJ);
        return $coment;
    }



}