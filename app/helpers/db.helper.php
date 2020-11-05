<?php

class DBHelper {
    
    public function __construct() {
        $this->host = 'mysqldb';
        $this->database = 'db_juegos';
        $this->user = 'admin';
        $this->password = 'admin';
        
    }


    function connect(){
        $db = new PDO("mysql:host={$this->host};"."dbname={$this->database};charset=utf8",
                        $this->user, $this->password);
        return $db;
    }
}
