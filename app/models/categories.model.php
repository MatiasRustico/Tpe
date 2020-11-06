<?php

class CategoriesModel {

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

    function getCategorie($id = null){
        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)

        if($id){
            //preparamos el pedido
            $query = $this->db->prepare('SELECT * FROM categoria WHERE id = ?');
            //lo ejecutamos con la id correspondiente 
            $query->execute([$id]);
            //busca esa id
            $categorie = $query->fetch(PDO::FETCH_OBJ);
        }else{
            //preparamos para traer todo
            $query = $this->db->prepare('SELECT * FROM categoria');
            //ejecutamos
            $query->execute();
            //fetchAll para traer todos
            $categorie = $query->fetchAll(PDO::FETCH_OBJ);
        }

        return $categorie;
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