<?php


class LogueadoController {

    private $printer;
    private $session;

    public function __construct($printer, $session) {
        $this->printer = $printer;
        $this->session = $session;
    }

    public function execute() {
        $user = $this->session->sessionShow("usuario");
        $data = array("user"=>$user);
        $this->printer->generateView('Logueado.html', $data);
    }
}

?>