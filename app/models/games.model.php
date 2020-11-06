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
        //en teoria por mediante js tendriamos que modificar el order y el sort para filtrar las busquedas en la db
        
        if ($parametros){
            //qsl principal base
            $sql = 'SELECT * FROM juegos';

            if(isset($parametros['order'])){ 
                //le añadimos el filtro order (order=categorias)
                $sql .= ' ORDER BY '.$parametros['order'];
                
                if(isset($parametros['sort'])){ 
                    //le añadimos el filtro de ASC DESC
                    $sql .= ' '.$parametros['sort'];
                    
                    //Enviar la consulta 
                    $query = $this->db->prepare($sql);
                    $query->execute();
                    //Obtengo la respuesta con un fetchAll (porque son muchos)
                    $games = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de juegos
                    return $games;
                }
            }
        }else{
            //Enviar la consulta 
            $query = $this->db->prepare('SELECT * FROM juegos');
            $query->execute();
            //Obtengo la respuesta con un fetchAll (porque son muchos)
            $games = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de juegos

            return $games;
        } 
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