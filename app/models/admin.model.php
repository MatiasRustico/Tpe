<?php

class AdminModel { 

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


    function addGame($nombre, $precio,  $categoria, $descripcion, $valoracion){
        //agregar a la base de datos
        $query = $this->db->prepare('INSERT INTO juegos (nombre, precio, id_categoria, descripcion, valoracion) VALUES (?,?,?,?,?)');
        
        $query->execute([$nombre, $precio,  $categoria, $descripcion, $valoracion]);

        return $this->db->lastInsertId();
    }

    function editGame($id, $nombre, $precio, $categoria, $descripcion, $valoracion){
        //agregar a la base de datos
        
        $query = $this->db->prepare('UPDATE `juegos` SET `id`=?,`nombre`=?,`precio`=?,`id_categoria`=?,`descripcion`=?,`valoracion`=? WHERE id = ?');
        $query->execute([$id, $nombre, $precio,  $categoria, $descripcion, $valoracion, $id]);

     
    }

    

    function removeGame($id){
        $query = $this->db->prepare('DELETE FROM juegos WHERE id = ?');
        $query->execute([$id]);

    }

    function addCategorie($categorie, $descripcion){
        //agregar a la base de datos
        $query = $this->db->prepare('INSERT INTO categoria (nombre, descripcion) VALUES (?,?)');
        $query->execute([$categorie, $descripcion]);

        return $this->db->lastInsertId();
    }

    function editCategorie($id, $nombre, $descripcion){
        $query = $this->db->prepare('UPDATE `categoria` SET `id`=?,`nombre`=?,`descripcion`=? WHERE id = ?');
        $query->execute([$id, $nombre, $descripcion, $id]);

    }

    function removeCategorie($id){
        $query = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
        $query->execute([$id]);
    }


}