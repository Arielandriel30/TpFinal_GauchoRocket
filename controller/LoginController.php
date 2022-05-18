<?php

class LoginController
{
    private $usuario;
    private $pass;
    private $loginModel;
    private $LogueadoViewController;

  public function __construct($usuario,$pass, $loginModel, $LogueadoViewController)
  {
    $this->usuario = $usuario;
    $this->pass = $pass;
    $this->loginModel = $loginModel;
    $this->LogueadoViewController = $LogueadoViewController;
  }  

  public function validate()
  {
    $result  = $this->loginModel->getLogin($this->usuario,$this->pass);
    
    if (!$result){
      header("location:index.php");
      exit();
  } else {
    $this->LogueadoViewController->execute();
  }
  }
}







?>