<?php


class LogueadoController {

    private $printer;
    private $session;

    public function __construct($printer, $session) {
        $this->printer = $printer;
        $this->session = $session;
    }

    public function execute() {
        if ($this->session->sessionShow('usuario') == null) {
           
            header("location:/");
        }
        if($this->session->sessionShow('usuario') != null){

            $user = $this->session->sessionShow('usuario');
            $errorReservation = $this->session->sessionShow('errorReservation');
            $nivel = $this->session->sessionShow('nivel');
            $admin=$this->session->sessionShow('admin');
            if($admin==true){
                $data = array("errorReservation"=>$errorReservation, "user"=>$user,"nivel"=>$nivel,"admin"=>$admin);
                $this->printer->generateView('Logueado.html', $data);
                exit();
            }else{
            $data = array("errorReservation"=>$errorReservation, "user"=>$user,"nivel"=>$nivel,"admin"=>$admin);
            $this->printer->generateView('Logueado.html', $data);}
        }

}

}
//(sizeof($admin)==1)
?>