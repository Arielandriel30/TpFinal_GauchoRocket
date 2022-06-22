<?php

class CompraController
{
    private $printer;
    private $CompraModel;
    private $qr;


    public function __construct($printer, $CompraModel,$qr)
    {
        $this->printer = $printer;
        $this->CompraModel = $CompraModel;
        $this->qr=$qr;
    }

    public function execute() {

        $this->printer->generateView('Compra.html');
    }
    public function confirmarCompra() {

        $this->printer->generateView('Confirmacion.html');
    }
    public function generarQr() {
        $this->qr->crearQr('Recibo de pago $ 8500 vuelo gaucho rcoket SA.');
    }

}