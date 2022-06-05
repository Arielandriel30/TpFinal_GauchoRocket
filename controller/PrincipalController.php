<?php


class PrincipalController {

    private $printer;
    private $session;

    public function __construct($printer, $session) {
        $this->printer = $printer;
        $this->session = $session;
    }

    public function execute() {
        $this->printer->generateView('Principal.html');
        $this->session->sessionDestroy();
        
    }
}

?>