<?php

class LoginModel {

    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function  getLogin($usuario, $pass){
        return $this->database->query("SELECT * FROM usuario 
        where nameU = '$usuario' AND passwordU = '$pass'");
    }
}