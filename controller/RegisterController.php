<?php

class RegisterController
{

    private $printer;
    private $RegisterModel;
    private $LogueadoController;

    public function __construct($printer, $RegisterModel, $LogueadoController)
    {

      $this->printer = $printer;
      $this->RegisterModel = $RegisterModel;
      $this->LogueadoController =  $LogueadoController;
    }  

    public function execute() {
      $this->printer->generateView('Registro.php');
    }

    public function validate()
    {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
    $type = $_POST["type"];
    $result  = $this->RegisterModel->getUsuario($usuario);
    if (!$result){
        $this->RegisterModel->getRegister($usuario, $pass, $type);
        $this->LogueadoController->execute();
        exit();
    } else {
      $this->execute();
        exit();
    }
    }
}







?>