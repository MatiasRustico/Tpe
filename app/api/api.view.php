<?php


//vista para la API REST    clase comun para toda la api rest 
//convertir en JSOn y manejar codigo respuesta.
class APIview {

    public function response($games, $status){
        //le avisamos que es JSON
         header("Content-Type: application/json");

        //le avisamos que codigo respuesta que sea
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));

        //aca vamos a convertir a Json
        echo json_encode($games);
    }

    private function requestStatus($code){
        $status = array(
          200 => "OK",
          404 => "Not found",
          500 => "Internal Server Error"
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
      }
  
}

