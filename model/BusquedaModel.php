<?php

class BusquedaModel{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function  getUsuario($usuario){
        return $this->database->query("SELECT * FROM usuario 
        where nameU = '$usuario'");
    }


}
?>