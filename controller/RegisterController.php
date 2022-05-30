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
      $this->printer->generateView('Registro.html');
    }

    public function validate()
    {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
    $type = $_POST["type"];
    $email = $_POST["email"];
    $result  = $this->RegisterModel->getUsuario($usuario);
    if (!$result){
        $this->RegisterModel->getRegister($usuario, $pass, $type, $email);
        $this->LogueadoController->execute();
        exit();
    } else {
      $this->execute();
        exit();
    }
    }

    public function activate($hash){
        $hash = $hash;
        $usuario = $_POST["usuario"];
        $pass = $_POST["pass"];
        $result  = $this->RegisterModel->getRegisteredUser($usuario,$pass,$hash);
        if (!$result){
            $this->RegisterModel->activatedUser($usuario,$pass,$hash);
            $this->LogueadoController->execute();
            exit();
        } else {
            $this->execute();
            exit();
        }
    }
}







?>