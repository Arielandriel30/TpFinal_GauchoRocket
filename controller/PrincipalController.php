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
        
    }
    public function logOut() {
        $this->session->sessionDestroy();
        $this->printer->generateView('Principal.html');
    }
}

?>