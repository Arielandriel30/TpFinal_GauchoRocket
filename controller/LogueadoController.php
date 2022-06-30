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
        }else {
            $user = $this->session->sessionShow('usuario');
            $errorReservation = $this->session->sessionShow('errorReservation');
            $nivel = $this->session->sessionShow('nivel');
            $data = array("errorReservation"=>$errorReservation, "user"=>$user,"nivel"=>$nivel);
            $this->printer->generateView('Logueado.html', $data);
        }

}

}
?>