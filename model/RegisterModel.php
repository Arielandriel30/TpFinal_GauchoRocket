<?php

class RegisterModel {

    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function  getUsuario($usuario){
        return $this->database->query("SELECT * FROM usuario 
        where nameU = '$usuario'");
    }

    public function  getRegister($usuario, $pass, $type){
        return $this->database->queryRegister("INSERT INTO `usuario` VALUES 
        (null,'$usuario',md5('$pass'),'$type');");
    }
}




?>