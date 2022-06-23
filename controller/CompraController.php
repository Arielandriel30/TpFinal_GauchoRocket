<?php

class CompraController
{
    private $printer;
    private $CompraModel;
    private $qr;
    private $session;


    public function __construct($printer, $CompraModel,$qr, $session)
    {
        $this->printer = $printer;
        $this->CompraModel = $CompraModel;
        $this->qr=$qr;
        $this->session=$session;
    }

    public function execute() {
        if ($this->session->sessionShow('usuario') == null) {
           
            header("location:/");
        }else {
            $user = $this->session->sessionShow('usuario');
            $data = array("user"=>$user);
        $this->printer->generateView('Compra.html', $user);
     }
    }
    public function confirmarCompra() {

        $this->printer->generateView('Confirmacion.html');
    }
    public function generarQr() {
        $this->qr->crearQr('Recibo de pago $ 8500 vuelo gaucho rcoket SA.');
    }

}