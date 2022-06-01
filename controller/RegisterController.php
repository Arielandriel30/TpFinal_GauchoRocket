<?php

class RegisterController
{

    private $printer;
    private $registerModel;
    private $logueadoController;
    private $hash;

    public function __construct($printer, $RegisterModel, $LogueadoController)
    {

      $this->printer = $printer;
      $this->registerModel = $RegisterModel;
      $this->logueadoController =  $LogueadoController;
    }

    public function execute() {
      $this->printer->generateView('Registro.html');
    }

    public function register()
    {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
    $type = $_POST["type"];
    $email = $_POST["email"];
    $result  = $this->registerModel->getUsuario($usuario);
    if (!$result){
        $this->registerModel->getRegister($usuario, $pass, $type, $email);
        exit();
    } else {
      $this->execute();
        exit();
    }
    }

    public function verify(){
        $hash = $_GET["hash"] ?? "";
        $data=array("hash"=>$hash);
        /*var_dump($data);*/
        $this->printer->generateView('Activar.html', $data);
    }

    public function activate(){
        $usuario = $_POST["usuario"];
        $pass = $_POST["pass"];
        $hash = $_POST["hash"];
        var_dump($hash);
        $result  = $this->registerModel->getRegisteredUser($usuario,$pass,$hash);
        if (!$result){
            $this->registerModel->activatedUser($usuario,$pass,$hash);
            $this->logueadoController->execute();
            exit();
        } else {
            $this->execute();
            exit();
        }
    }
}







?>