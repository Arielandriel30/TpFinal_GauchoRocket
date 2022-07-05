<?php

class CompraController
{
    private $printer;
    private $CompraModel;
    private $qr;
    private $session;
    private $conversor;
    private $pdf;
    private $reservaModl;

    public function __construct($printer, $reservaModel,$CompraModel,$qr, $session,$conversor,$pdf)
    {
        $this->printer = $printer;
        $this->CompraModel = $CompraModel;
        $this->reservaModl = $reservaModel;
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
            $servicio = isset($_POST["servicio"]) ? $_POST["servicio"] : "";

            $data = array("valor"=>$total,"dinero"=>$dineroLocal,"fecha"=>$fechaActual,'date'=>$fecha,'destino'=>$destino,'origen'=>$origen,'cabina'=>$cabina,'servicio'=>$servicio);
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
        $servicio = isset($_POST["servicio"]) ? $_POST["servicio"] : "";

        $usuario=$this->session->sessionShow('usuario');

        $this->pdf->armarPdf($usuario,$origen,$destino,$cabina,$servicio,$valor,$fechaCompra,"Vuelo desde $origen hasta $destino el día $fecha con codigo 41545");
    }

    public function mostrarVuelosReservados(){
        $vuelos=$_POST['vuelos'];
        $space_flight_id = isset($_POST["space_flight_id"]) ? $_POST["space_flight_id"] : "";
        $salida = isset($_POST["departure_date"]) ? $_POST["departure_date"] : "";
        $horario = isset($_POST["departure_time"]) ? $_POST["departure_time"] : "";
        $duracion = isset($_POST["duration"]) ? $_POST["duration"] : "";
        $destino = isset($_POST["destination"]) ? $_POST["destination"] : "";
        $origen = isset($_POST["origen"]) ? $_POST["origen"] : "";
        $cohete = isset($_POST["cohete"]) ? $_POST["cohete"] : "";
        $idcabina = isset($_POST["cabina"]) ? $_POST["cabina"] : "";
        $servicio = isset($_POST["servicio"]) ? $_POST["servicio"] : "";
        $rocket_id = isset($_POST["idTipoRocket"]) ? $_POST["idTipoRocket"] : "";
        $Tipo = isset($_POST["TipoDeReserva"]) ? $_POST["TipoDeReserva"] : "";

        if($idcabina=='1'){
            $cabina='Turista';
        }
        if($idcabina=='2'){
            $cabina='Ejecutiva';
        }
        if($idcabina=='3'){
            $cabina='Primera clase';
        }
        if($servicio=='0'){
            $servicio='Standard';
        }
        if($servicio=='1'){
            $servicio='Gourmet';
        }
        if($servicio=='2'){
            $servicio='Spa';
        }

        //$idServicio=$_POST['servicio'];
        //$idCabina=$_POST['cabina'];
        //$inicialDia=$_POST["diaVuelo"];
        //$fechaDESalida=$_POST["diaSalida"];
        //$horaDESalida=$_POST["HoraSalida"];

        //Como fiferenciosi es sub tour o entre destinos?
        if($Tipo=="SubOrbital"){
            $reservation_quantity=1;
            $user=$this->session->sessionShow('resultLogueado');
            var_dump($vuelos[0]);
            $idsalida=null;
            var_dump($origen);
            var_dump(  $salida);
            var_dump( $horario);
            var_dump( $duracion);
            var_dump(  $rocket_id);
            var_dump(  $space_flight_id);
            var_dump( $reservation_quantity);
            var_dump($idcabina);
            var_dump($user[0]["idUsuarios"]);
            if($salida=="Buenos Aires"){
                $idsalida='10';
            }
            /*if($salida=="Shanghái"){
                $idsalida='Gourmet';
            }*/
            if($salida=="Ankara"){
                $idsalida='11';
            }

            $this->reservaModl->SetReservaSubOrbital($vuelos[0],$origen, $idsalida, $horario,  $duracion , $rocket_id, $space_flight_id,$reservation_quantity, $idcabina, $user[0]["idUsuarios"]);
        }

        $valorTotal=sizeof($vuelos)*1000;
        $data = array("vuelo"=>$vuelos,'cohete'=>$cohete,'cabina'=>$cabina,'servicio'=>$servicio,'origen'=>$origen,'salida'=>$salida,'horario'=>$horario,'duracion'=>$duracion,'destino'=>$destino,"valor"=>1000,"total"=>$valorTotal,"TipoDeReserva"=>$Tipo);
        $this->printer->generateView('Compra.html',$data);
    }
}