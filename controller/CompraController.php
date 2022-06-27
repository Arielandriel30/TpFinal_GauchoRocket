<?php

class CompraController
{
    private $printer;
    private $CompraModel;
    private $qr;
    private $session;
    private $conversor;


    public function __construct($printer, $CompraModel,$qr, $session,$conversor)
    {
        $this->printer = $printer;
        $this->CompraModel = $CompraModel;
        $this->qr=$qr;
        $this->session=$session;
        $this->conversor=$conversor;
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
        /*se convierte de credito a moneda local*/
        $dineroLocal=$this->conversor->convertirCreditoAMoneda($total);
        /*se configura el horario actual de buenos aires*/
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fechaActual=date('d/m/Y H:i:s',time());

        $data = array("valor"=>$total,"dinero"=>$dineroLocal,"fecha"=>$fechaActual);
        $this->printer->generateView('Confirmacion.html',$data);
    }
    public function generarQr() {
        $this->qr->crearQr('Recibo de pago de vuelo gaucho rcoket SA.');
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