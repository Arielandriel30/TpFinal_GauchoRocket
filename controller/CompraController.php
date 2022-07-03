<?php

class CompraController
{
    private $printer;
    private $CompraModel;
    private $qr;
    private $session;
    private $conversor;
    private $pdf;

    public function __construct($printer, $CompraModel,$qr, $session,$conversor,$pdf)
    {
        $this->printer = $printer;
        $this->CompraModel = $CompraModel;
        $this->qr=$qr;
        $this->session=$session;
        $this->conversor=$conversor;
        $this->pdf=$pdf;
    }

    public function execute() {
        if ($this->session->sessionShow('usuario') == null) {
           
            header("location:/");
        }else {
            $user = $this->session->sessionShow('usuario');
            $data = array("user"=>$user);
        $this->printer->generateView('Compra.html', $data);
     }
    }
    public function confirmarCompra() {
        if(isset($_POST['submit'])){
            if(!empty($_POST['total']))
            $total=$_POST['total'];
            /*se convierte de credito a moneda local*/
            $dineroLocal=$this->conversor->convertirCreditoAMoneda($total);
            /*se configura el horario actual de buenos aires*/
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $fechaActual=date('d/m/Y H:i:s',time());

            $fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
            $destino = isset($_POST["destino"]) ? $_POST["destino"] : "";
            $origen = isset($_POST["origen"]) ? $_POST["origen"] : "";
            $cabina = isset($_POST["cabina"]) ? $_POST["cabina"] : "";

            $data = array("valor"=>$total,"dinero"=>$dineroLocal,"fecha"=>$fechaActual,'date'=>$fecha,'destino'=>$destino,'origen'=>$origen,'cabina'=>$cabina);
            $this->printer->generateView('Confirmacion.html',$data);
        }
    }

    public function generarPdf() {

        $fechaCompra = isset($_POST["fechaCompra"]) ? $_POST["fechaCompra"] : "";
        $destino = isset($_POST["destino"]) ? $_POST["destino"] : "";
        $origen = isset($_POST["origen"]) ? $_POST["origen"] : "";
        $cabina = isset($_POST["cabina"]) ? $_POST["cabina"] : "";
        $valor = isset($_POST["dinero"]) ? $_POST["dinero"] : "";
        $fecha= isset($_POST["fecha"]) ? $_POST["fecha"] : "";

        $usuario=$this->session->sessionShow('usuario');

        $this->pdf->armarPdf($usuario,$origen,$destino,$cabina,$valor,$fechaCompra,"Vuelo desde $origen hasta $destino el día $fecha con codigo 41545");
    }

    public function mostrarVuelosReservados(){
        $vuelos=$_POST['vuelos'];
        $salida = isset($_POST["departure_date"]) ? $_POST["departure_date"] : "";
        $horario = isset($_POST["departure_time"]) ? $_POST["departure_time"] : "";
        $duracion = isset($_POST["duration"]) ? $_POST["duration"] : "";
        $destino = isset($_POST["destination"]) ? $_POST["destination"] : "";
        $origen = isset($_POST["origen"]) ? $_POST["origen"] : "";
        $cohete = isset($_POST["cohete"]) ? $_POST["cohete"] : "";
        $cabina = isset($_POST["cabina"]) ? $_POST["cabina"] : "";

        $valorTotal=sizeof($vuelos)*1000;
        $data = array("vuelo"=>$vuelos,'cohete'=>$cohete,'cabina'=>$cabina,'origen'=>$origen,'salida'=>$salida,'horario'=>$horario,'duracion'=>$duracion,'destino'=>$destino,"valor"=>1000,"total"=>$valorTotal);
        $this->printer->generateView('Compra.html',$data);
    }
}