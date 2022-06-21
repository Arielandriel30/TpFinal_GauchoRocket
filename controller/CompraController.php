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
        $valorDevuelto= $this->qr->crearQr('primer qr');
        $data=array("qr"=>$valorDevuelto);
        $this->printer->generateView('Confirmacion.html',$data);
    }

}