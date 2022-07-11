<?php
require_once 'helper/Mailer.php';

class CompraController
{
    private $printer;
    private $CompraModel;
    private $qr;
    private $session;
    private $conversor;
    private $pdf;
    private $reservaModl;
    private $mailer;

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
            $codigo = isset($_POST["codigo"]) ? $_POST["codigo"] : "";

            $usuario=$this->session->sessionShow('resultLogueado');

            $data = array("valor"=>$total,"dinero"=>$dineroLocal,"fecha"=>$fechaActual,'date'=>$fecha,'destino'=>$destino,'origen'=>$origen,'cabina'=>$cabina,'servicio'=>$servicio,'codigo'=>$codigo);
            $this->printer->generateView('Confirmacion.html',$data);
            $filePDF= $this->pdf->armarPdf($usuario[0]["nameU"],$origen,$destino,$cabina,$servicio,$dineroLocal,$fechaActual,$codigo,"Vuelo desde $origen el día $fecha con codigo $codigo");
            $mailer = new Mailer($this->getMessageSubject($usuario[0]["nameU"]), "Generaste una reserva", $usuario[0]["email"]);
            $mailer->addAttachment($filePDF, "reserva.pdf", "base64");
            $mailer->sendMessage();
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
        $codigo = isset($_POST["codigo"]) ? $_POST["codigo"] : "";
        $usuario=$this->session->sessionShow('usuario');
        $filePDF= $this->pdf->armarPdf($usuario,$origen,$destino,$cabina,$servicio,$valor,$fechaCompra);
        $filePDF->Output("","comprobanteVuelo");
    }
    private function getMessageSubject($usuario){
        return "Gracias $usuario por confiar en Gaucho Rocket";
    }
    public function generarPdfReserva() {
        $id=isset($_POST["id"]) ? $_POST["id"] : "";;

        $reserva=$this->reservaModl->getReservaPorId($id);
        $usuario=$this->session->sessionShow('usuario');
        $origen=$reserva[0]['origen'];
        $cabina=$reserva[0]['cabina'];
        $servicio=$reserva[0]['servicio'];
        $precio=$reserva[0]['precio'];
        $fechaVUuelo=$reserva[0]['fecha_vuelo'];
        $codigo=$reserva[0]['codigo'];
        $equipo=$reserva[0]['equipo'];
        $asiento=isset($_POST["asiento"]) ? $_POST["asiento"] : "";
        $destino=$reserva[0]['destino'];

        $filePDF = $this->pdf->armarPdfReserva($usuario,$origen,$destino,$cabina,$servicio,$precio,$fechaVUuelo,$codigo,$equipo,$asiento,"Vuelo desde $origen el día $fechaVUuelo con codigo $codigo");
        $filePDF->Output("","comprobanteVuelo");
        $this->reservaModl->hacerCheckIn($id);
    }

    public function mostrarVuelosReservados(){
        $vuelos=$_POST['vuelos'];
        $idvuelos=$_POST["idVuelo"];

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
        $equipo = isset($_POST["equipo"]) ? $_POST["equipo"] : "";

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

            $reservation_quantity=1;
            $user=$this->session->sessionShow('resultLogueado');
            //$origenVuelo=$this->reservaModl->getStation($origen);
            $fechaVuelo=date("Y-m-d",strtotime($salida));
            $lugarSalida=$this->CompraModel->buscarPlanetaPorId($origen);
            $precio=1000;
            $reservationCode=$vuelos[0].'-'.rand().time();
            $dineroLocal=$this->conversor->convertirCreditoAMoneda($precio);
            $this->reservaModl->SetReserva($reservationCode,$origen,  $salida, $horario,  $duracion , $idvuelos, $space_flight_id,$reservation_quantity, $idcabina, $user[0]["idUsuarios"]);
            $fechaCompra=date('Y-m-d H:i');
            $idVuelo=$this->reservaModl->getIdFlightBooking($reservationCode,$user[0]["idUsuarios"]);

        $valorTotal=sizeof($vuelos)*1000;
        $data = array("vuelo"=>$vuelos,'cohete'=>$cohete,'cabina'=>$cabina,'servicio'=>$servicio,'origen'=>$origen,'salida'=>$salida,'horario'=>$horario,'duracion'=>$duracion,'destino'=>$destino,"valor"=>1000,"total"=>$valorTotal,"TipoDeReserva"=>$Tipo);
        $this->printer->generateView('Compra.html',$data);
        $this->reservaModl->guardarReserva($idVuelo[0]['id'],$fechaCompra,$dineroLocal ,$user[0]["idUsuarios"],$origen,$destino,$fechaVuelo,$equipo,$duracion,$cabina,$servicio,$reservationCode);

    }
}