<?php


class RegistroViewController {

    private $printer;

    public function __construct($printer) {
        $this->printer = $printer;
    }

    public function execute() {
        $this->printer->generateView('IngresoRegistro.php');
    }
}

?>