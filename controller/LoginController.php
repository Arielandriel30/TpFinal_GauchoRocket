<?php

class LoginController
{
 
    private $loginModel;
    private $printer;
    private $logueadoController;
   

  public function __construct($loginModel, $printer, $logueadoController, $session)
  {

    $this->loginModel = $loginModel;
    $this->printer = $printer;
    $this->logueadoController = $logueadoController;
    $this->session = $session;

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
    
    $this->session->execute('usuario', $usuario);
    $this->session->execute('resultLogueado', $result);
    //header("location:../logueado");
    $this->logueadoController->execute();
    
  }
  }

  public function execute() {
    $this->printer->generateView('Login.html');
}
}







?>