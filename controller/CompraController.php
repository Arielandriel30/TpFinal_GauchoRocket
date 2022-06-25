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
        if(isset($_POST['submit'])){
            if(!empty($_POST['total']))
            $total=$_POST['total'];
        }
        /*aca iria un model para convertir creditos a moneda*/
        $dineroLocal=$total*2.59;
        $data = array("valor"=>$total,"dinero"=>$dineroLocal);
        $this->printer->generateView('Confirmacion.html',$data);
    }
    public function generarQr() {
        $this->qr->crearQr('Recibo de pago $ 8500 vuelo gaucho rcoket SA.');
    }

    public function mostrarVuelosReservados(){
        if(isset($_POST['submit'])){
            if(!empty($_POST['vuelos'])){
                $vuelos=$_POST['vuelos'];

            }
        }
        $valorTotal=sizeof($vuelos)*1000;
        $data = array("vuelo"=>$vuelos,"valor"=>1000,"total"=>$valorTotal);
        $this->printer->generateView('Compra.html',$data);
    }
}