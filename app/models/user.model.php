<?php

class UserModel {

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

    function getByUser($user){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE user= ?');

        $query->execute([$user]);
        
        $user = $query->fetch(PDO::FETCH_OBJ); 

        return $user;
    }

    function addUser($nombre, $pass, $email){
        
        //Agregar a la base de datos
        $query = $this->db->prepare('INSERT INTO usuarios (user, pass, email) VALUES (?,?,?)');
        $query->execute([$nombre, $pass,  $email]);

        return $this->db->lastInsertId();
    }

    function getUsers(){

        $query = $this->db->prepare('SELECT * FROM usuarios');

        $query->execute();

        $users = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $users;
    }

    function getOneUser($id){
        // 2. Enviar la consulta (2 sub-pasos: prepare y execute)
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE id = ?');
        $query->execute([$id]);
        $user = $query->fetch(PDO::FETCH_OBJ); // arreglo de usuario
    
        return $user;

    }

    function removeUser($id){
        $query = $this->db->prepare('DELETE FROM usuarios WHERE id = ?');
        $query->execute([$id]);

    }

    function userPermits($id, $permit){

        $query = $this->db->prepare('UPDATE `usuarios` SET `id`=?,`permisos`=? WHERE id = ?');
        $query->execute([$id, $permit, $id]);
    }
    

}