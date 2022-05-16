<?php

class LoginController
{
    private $usuario;
    private $pass;
    private $loginModel;

  public function __construct($usuario,$pass, $loginModel)
  {
    $this->usuario = $usuario;
    $this->pass = $pass;
    $this->loginModel = $loginModel;
  }  

  public function validate()
  {
    $result  = $this->loginModel->getLogin($this->usuario,$this->pass);
    
    if (!$result){
      header("location:../index.php");
      exit();
  } else {
    header("location:../logueado.php");
  }
  }
}







?>