<?php

class LoginController
{
    private $usuario;
    private $pass;
    private $loginModel;
    private $LogueadoViewController;
    private $LoginViewController;

  public function __construct($usuario,$pass, $loginModel, $LogueadoViewController, $LoginViewController)
  {
    $this->usuario = $usuario;
    $this->pass = $pass;
    $this->loginModel = $loginModel;
    $this->LogueadoViewController = $LogueadoViewController;
    $this->LoginViewController = $LoginViewController;
  }  

  public function validate()
  {
    $result  = $this->loginModel->getLogin($this->usuario,$this->pass);
    
    if (!$result){
      $this->LoginViewController->execute();
      exit();
  } else {
    $this->LogueadoViewController->execute();
  }
  }
}







?>