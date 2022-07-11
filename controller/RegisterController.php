<?php

class RegisterController
{

    private $printer;
    private $registerModel;
    private $logueadoController;
    private $hash;
    private $session;
    private $validador;

    public function __construct($printer, $registerModel, $logueadoController, $session,$validador)
    {

      $this->printer = $printer;
      $this->registerModel = $registerModel;
      $this->logueadoController =  $logueadoController;
      $this->session = $session;
      $this->validador=$validador;
    }

    public function execute() {
      $this->printer->generateView('Registro.html');
    }

    public function register()
    {
        $type = $_POST["type"];
        $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
        $pass = isset($_POST["pass"]) ? $_POST["pass"] : "";
        $email = isset($_POST["email"]) ? $_POST["email"] : "";

        if(isset($_POST['submitRegistrar'])){
            if(!empty($this->validador->validarRegistro($email,$usuario,$pass))){
                $error= $this->validador->validarRegistro($email,$usuario,$pass);
                $errorJunto = implode(", ", $error);
                $devolverErrores=["errores"=>$errorJunto];
                $data = ["registro" => $devolverErrores];
                $this->printer->generateView('Registro.html',$data);
            }else{
                $this->registerModel->getRegister($usuario, $pass, $type, $email);
                $messageVerifyEmail = "Verifique la casilla '$email' para continuar con la activación";
                $data = array("messageVerifyEmail"=>$messageVerifyEmail);
                $this->printer->generateView('Registro.html', $data);
                exit();
            }
        }
    }

    public function verify(){
        $hash = $_GET["hash"] ?? "";
        $data=array("hash"=>$hash);
        $this->printer->generateView('Activar.html', $data);
    }

    public function activate(){
        $usuario = $_POST["usuario"];
        $pass = $_POST["pass"];
        $hash = $_POST["hash"];
        $result  = $this->registerModel->getRegisteredUser($usuario,$pass,$hash);
        if ($result){
            $this->registerModel->activatedUser($usuario,$pass,$hash);
            $this->session->execute("usuario", $usuario);
            $this->session->execute('nivel', null);
            $this->logueadoController->execute();
            exit();
        } else {
            $this->execute();
            exit();
        }
    }

    public function resetPassword(){
        $usuario = $_POST["usuario"]?? null;
        if($usuario!=null){
            $this->registerModel->resetPassword($usuario);
            $this->printer->generateView('Principal.html');
            exit();
        }
        $this->printer->generateView('ResetPassword.html');
        exit();
    }

    public function newPassword(){
        $hash = $_GET["hash"] ?? "";
        $data=array("hash"=>$hash);
        $this->printer->generateView('NewPassword.html', $data);
    }

    public function updatePassword(){
        $usuario = $_POST["usuario"]?? null;
        $pass = $_POST["pass"]?? null;
        $pass1 = $_POST["pass1"]?? null;
        $hash = $_POST["hash"]?? null;
        if ($usuario!=null && $pass!=null && $hash!=null){
            $this->registerModel->updatePassword($usuario,$pass,$hash);
            $this->session->execute("usuario", $usuario);
            $this->logueadoController->execute();
            exit();
        } else {
            $this->execute();
            exit();
        }
    }

}









?>