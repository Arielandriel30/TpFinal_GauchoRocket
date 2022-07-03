<?php

class ReservarController
{

    private $printer;
    private $ReservaModel;
    private $session;
    private $BusquedaModel;

    /**
     * @param $printer
     * @param $ReservaModel
     */
    public function __construct($printer, $ReservaModel,$BusquedaModel,$session)
    {
        $this->printer = $printer;
        $this->ReservaModel = $ReservaModel;
        $this->BusquedaModel =$BusquedaModel;
        $this->session = $session;
    }

    public  function validate(){
        if ($this->session->sessionShow('usuario') == null) {
            header("location:/login");
            exit(0);
        }
            $user = $this->session->sessionShow('resultLogueado');
            $nivelMedico= $this->ReservaModel->getNivelMedico($user[0]["idUsuarios"]);

            if(empty($nivelMedico[0]["id_flight_level"])){
                 $this->generalTurno();
            /*exit(0);*/
            }
            else{
             $this->validarNivelMedico($nivelMedico);
             $this->RealizarReserva();
         }

    }

    public function execute() {

        $this->printer->generateView('Reserva.html');
    }

    private function generalTurno()
    {
        header("location:/turno");
    }

    private function validarNivelMedico($nivelMedico)
    {
        $vuelos = null;
        $level = null;
        $dia=null;
        if (isset($_POST['ReservarVuelo'])) {
            if (!empty($_POST['vuelos'])) {
                $vuelos = $_POST['vuelos'];
            }
            if (!empty($_POST['idLevel'])) {
                $level = $_POST['idLevel'];

            }
            if (!empty($_POST['diaVuelo'])) {
                $dia = $_POST['diaVuelo'];
            }
        }

        if ($vuelos!=null && $nivelMedico[0]['id_flight_level'] == 3)
        {   $this->RealizarReserva($dia,$vuelos[0]);
            exit();
            $valorTotal=sizeof($vuelos)*1000;
            $data = array("vuelo"=>$vuelos,"valor"=>1000,"total"=>$valorTotal);
            $this->printer->generateView('Compra.html',$data);

        }else if($vuelos!=null && $level!=null && $nivelMedico[0]['id_flight_level'] == $level[0])
        {   $this->RealizarReserva($dia,$vuelos[0]);
            exit();
            $valorTotal=sizeof($vuelos)*1000;
            $data = array("vuelo"=>$vuelos,"valor"=>1000,"total"=>$valorTotal);
            $this->printer->generateView('Compra.html',$data);
            exit();
        }else{
            $nMedico = $nivelMedico[0]['id_flight_level'];
            $errorMessage = "Su nivel medico es '$nMedico' y no condice con la reserva que desea realizar. La reserva es nivel '$level[0]'";
            $this->session->execute("errorReservation", $errorMessage);
            header("location:/logueado/execute");
            exit();
        }

    }

    private function RealizarChequeo()
    {
        exit();
    }

    private function RealizarReserva($dia,$vuelos)
    {

        $datos=$this->BusquedaModel->getSubOrbitalParaReservar($dia,$vuelos);
        $cabinas=$this->BusquedaModel->getCabinas();

//        var_dump($datos[0]["RocketTypeID"]);
        $cabinaDelAvion=$this->BusquedaModel->getCabinaDelAvion($datos[0]["RocketTypeID"]);

        $cab=array();
        if($cabinaDelAvion[0]["capacity_type_1"]!=null){
            $cab+=array(count($cab)=>["id"=>$cabinas[0]["id"],"description"=>$cabinas[0]["description"]]);
        }if($cabinaDelAvion[0]["capacity_type_2"]!=null){
            $cab+=array(count($cab)=>["id"=>$cabinas[1]["id"],"description"=>$cabinas[1]["description"]]);
        }if($cabinaDelAvion[0]["capacity_type_2"]!=null){
            $cab+=array(count($cab)=>["id"=>$cabinas[2]["id"],"description"=>$cabinas[2]["description"]]);
        }

        $data = array("vuelo"=>$vuelos,"Datos"=>$datos,"cabines"=>$cab);
        var_dump($data );
        $this->printer->generateView('Reserva.html',$data);
    }

}