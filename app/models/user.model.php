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
        
        $games = $query->fetch(PDO::FETCH_OBJ); 

        return $games;
    }

}