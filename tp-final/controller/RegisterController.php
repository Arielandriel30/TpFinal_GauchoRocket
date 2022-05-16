<?php

class RegisterController
{
    private $usuario;
    private $pass;
    private $type;
    private $RegisterModel;

    public function __construct($usuario, $pass, $type, $RegisterModel)
    {
      $this->usuario = $usuario;
      $this->pass = $pass;
      $this->type = $type;
      $this->RegisterModel = $RegisterModel;
    }  

    public function validate()
    {
      $result  = $this->RegisterModel->getUsuario($this->usuario);
      
      if (!$result){
        $this->RegisterModel->getRegister($this->usuario,$this->pass,$this->type);
        header("location:../registrado.php");
    } else {
        header("location:../index.php");
        exit();
    }
    }
}







?>