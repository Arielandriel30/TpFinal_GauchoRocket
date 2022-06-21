<?php

class CompraController
{
    private $printer;
    private $CompraModel;


    public function __construct($printer, $CompraModel)
    {
        $this->printer = $printer;
        $this->CompraModel = $CompraModel;
    }

    public function execute() {

        $this->printer->generateView('Compra.html');
    }
    public function confirmarCompra() {

        $this->printer->generateView('Confirmacion.html');
    }

}