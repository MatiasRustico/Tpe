<?php

class GamesModel { 

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
    function getGames($parametros = null){

        if ($parametros){

            $sql = 'SELECT * FROM juegos';


            if(isset($parametros['order'])){ 
                $sql .= ' ORDER BY '.$parametros['order'];

                if(isset($parametros['sort'])){ 
                    $sql .= ' '.$parametros['sort'];
        
                }
            }

            echo($sql);
        
            die(__FILE__); 
        }

        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM juegos');
        $query->execute();
        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $games = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de juegos

        return $games;
    }

    function getOneGame($id){
        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM juegos WHERE id = ?');
        $query->execute([$id]);
        $game = $query->fetch(PDO::FETCH_OBJ); // arreglo de juego
    
        return $game;

    }

    function remove($id){
        $query = $this->db->prepare('DELETE FROM juegos WHERE id = ?');
        $query->execute([$id]);

        return $query->rowCount();
    }

    function addGame($nombre, $precio,  $categoria, $descripcion, $valoracion, $imagen = null){
        
        if($imagen){//con imagen
            $sql = 'INSERT INTO juegos (nombre, precio, id_categoria, descripcion, valoracion, imagen) VALUES (?,?,?,?,?,?)';
            $params = [$nombre, $precio,  $categoria, $descripcion, $valoracion, $imagen];
        }else{//sin imagen
            $sql = 'INSERT INTO juegos (nombre, precio, id_categoria, descripcion, valoracion) VALUES (?,?,?,?,?)';
            $params = [$nombre, $precio,  $categoria, $descripcion, $valoracion];
        }
        
        //agregar a la base de datos
        $query = $this->db->prepare($sql);
        $query->execute($params);

        return $this->db->lastInsertId();
    }



    function editGame($id, $nombre, $precio, $categoria, $descripcion, $valoracion){
        //agregar a la base de datos
        
        $query = $this->db->prepare('UPDATE `juegos` SET `id`=?,`nombre`=?,`precio`=?,`id_categoria`=?,`descripcion`=?,`valoracion`=? WHERE id = ?');
        $query->execute([$id, $nombre, $precio,  $categoria, $descripcion, $valoracion, $id]);

     
    }



    function editGameAPI($id, $nombre, $precio, $categoria, $descripcion, $valoracion){
        //agregar a la base de datos
        
        $query = $this->db->prepare('UPDATE `juegos` SET `id`=?,`nombre`=?,`precio`=?,`id_categoria`=?,`descripcion`=?,`valoracion`=? WHERE id = ?');
        $result = $query->execute([$id, $nombre, $precio,  $categoria, $descripcion, $valoracion, $id]);

        return $result;
    }



    function removeGame($id){
        $query = $this->db->prepare('DELETE FROM juegos WHERE id = ?');
        $query->execute([$id]);

    }

}