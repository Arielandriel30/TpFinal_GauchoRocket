<?php

class LoginModel {

    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function  getLogin($usuario, $pass){
        return $this->database->query("SELECT * FROM usuario 
        where nameU = '$usuario' AND passwordU = md5('$pass')");
    }
    
    public function ResultadoChequeo($usuario, $pass)
    {
        return  $this->database->query("SELECT id_flight_level FROM usuario
        WHERE nameU = '$usuario' AND passwordU = md5('$pass')");
        
        
    }

    public function isAdmin($usuario){
        $sql= $this->database->query("SELECT  isAdminU FROM usuario WHERE nameU='$usuario'");
        if($sql[0]["isAdminU"]=="1"){
            return true;
        }else{
            return "";
        }
    }
}