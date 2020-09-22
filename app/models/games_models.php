<?php

class GamesModel { 

    function connect(){
        //abro conexion
        $db = new PDO('mysql:host=localhost;'.'dbname=db_juegos;charset=utf8', 'root', '');
    }


    //devuelve los juegos de la base de datos
    function getGames(){

        //1
        $db = connect();

        //2
    }
}