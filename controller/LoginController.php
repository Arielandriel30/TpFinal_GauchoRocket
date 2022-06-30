<?php

class LoginController
{
 
    private $loginModel;
    private $printer;
    private $logueadoController;
    private $validador;
   

  public function __construct($loginModel, $printer, $logueadoController, $session,$validador)
  {

    $this->loginModel = $loginModel;
    $this->printer = $printer;
    $this->logueadoController = $logueadoController;
    $this->session = $session;
    $this->validador=$validador;

  }  


  public function validate()
  {
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
    $result  = $this->loginModel->getLogin($usuario,$pass);
    $nivel = $this->loginModel->ResultadoChequeo($usuario, $pass);
    if(isset($_POST['submitLogin'])){
        if(!empty($this->validador->validarLogin($usuario,$pass))){
              $error= $this->validador->validarLogin($usuario,$pass);
              $errorJunto = implode(", ", $error);
              $devolverErrores=["errores"=>$errorJunto];
              $data = ["login" => $devolverErrores];
              $this->printer->generateView('Login.html',$data);
        }else {

            $this->session->execute('usuario', $usuario);
            $this->session->execute('resultLogueado', $result);
            
            $this->session->execute('nivel', $nivel);
            //header("location:../logueado");
            $this->logueadoController->execute();

        }
    }
  }

  public function execute() {
    $this->printer->generateView('Login.html');
}
}







?>