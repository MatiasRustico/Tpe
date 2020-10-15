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

    function getCategories(){
        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();
        // 3. Obtengo la respuesta con un fetchAll (porque son muchos)
        $categories = $query->fetchAll(PDO::FETCH_OBJ); // arreglo de categorias

        return $categories;
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