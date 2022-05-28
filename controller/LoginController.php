<?php

class LoginController
{
 
    private $loginModel;
    private $printer;
    private $LogueadoController;
   

  public function __construct($loginModel, $printer, $LogueadoController)
  {

    $this->loginModel = $loginModel;
    $this->printer = $printer;
    $this->LogueadoController = $LogueadoController;
    

  }  


  public function validate()
  {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
    $result  = $this->loginModel->getLogin($usuario,$pass);
    
    if (!$result){
      $this->execute();
      exit();
  } else {
    $this->LogueadoController->execute();
  }
  }

  public function execute() {
    $this->printer->generateView('Login.php');
}
}







?>