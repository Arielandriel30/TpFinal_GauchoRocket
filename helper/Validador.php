<?php

class Validador
{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }
    function validarRegistro($email,$user,$password)
    {
        $errores = array();

        $password = $_POST['pass'];
        $user =trim(strtolower($_POST['usuario']));
        $email = $_POST['email'];

        if (empty($email)) {
            array_push($errores, "El email es requerido");
        }

        if($this->validaEmail($email) == false && !empty($password)){
            array_push($errores,"Debe ingresar un email valido");
        }

        if(!empty($this->getEmail($email))&& (!empty($email))){
            array_push($errores,"El email ya está registrado");
        }
        if($this->getUserName($user) == true && !empty($user)){
            array_push($errores,"Este nombre de usuario ya existe");
        }

        if (empty($user)) {
            array_push($errores, "El usuario es requerido");
        }
       if (empty($password)) {
        array_push($errores, "La contraseña es requerida");
    }


        return $errores;
    }
    function validaEmail($valor){
        if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
            return false;
        }else{
            return true;
        }
    }
    function getEmail($email){
        $sql="SELECT email from usuario where email='$email'";
        return $this->database->query($sql);

    }
    function validarUsuario($usuario, $password){
        $passwordCodificada=md5($password);
        $sql="SELECT nameU from usuario where nameU='$usuario'";
        $sql1="SELECT passwordU from usuario where passwordU='$passwordCodificada'";
        $usuarioDevuelto=$this->database->query($sql);
        $passwordDevuelto=$this->database->query($sql1);

        if(!empty($usuarioDevuelto) && !empty($passwordDevuelto)){
            return true;
        }else{
            return false;
        }

    }

    public function validarLogin($user,$password)
    {
        $errores = array();

        if (empty($user)) {
            array_push($errores, "El usuario es requerido");
        }
        if($this->validarUsuario($user,$password)==false && ((!empty($password)&&(!empty($user))))){
            array_push($errores,"Usuario y/o contraseña invalidos");
        }
        if (empty($password)) {
            array_push($errores, "La password es requerida");
        }

        return $errores;
    }
    public function getUserName($user){
       $result= $this->database->query("SELECT nameU FROM usuario WHERE nameU='$user'");
       if(!empty($result)){
           return true;
       }else{
           return false;
       }
    }


}