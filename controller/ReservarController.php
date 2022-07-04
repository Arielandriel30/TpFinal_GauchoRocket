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
        $vuelos = null;
        $level = null;
        $dia=null;
        $fechaSalida=null;
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
            if (!empty($_POST['diaSalida'])) {
                $fechaSalida=$_POST['diaSalida'];
            }
        }
            $user = $this->session->sessionShow('resultLogueado');
            $nivelMedico= $this->ReservaModel->getNivelMedico($user[0]["idUsuarios"]);
            if(empty($nivelMedico[0]["id_flight_level"])){
                 $this->generalTurno();
//                 exit(0);
            }
            else{
             $respuesta=$this->validarNivelMedico($vuelos,$level,$nivelMedico);
             if($respuesta){
                 echo "se puede reservar";
                 $this->RealizarReserva($dia,$vuelos[0],$fechaSalida);
             }
             else
             {   echo  "no se puede reservar";
                 $nMedico = $nivelMedico[0]['id_flight_level'];
                 $errorMessage = "Su nivel medico es '$nMedico' y no condice con la reserva que desea realizar. La reserva es nivel '$level[0]'";
                 $this->session->execute("errorReservation", $errorMessage);
                 header("location:/logueado/execute");
                 exit();
             }

         }

    }

    private function validarNivelMedico($vuelos,$level,$nivelMedico)
    {

        if ($vuelos!=null && $nivelMedico[0]['id_flight_level'] == 3)
        {   return true;

        }else if($vuelos!=null && $level!=null && $nivelMedico[0]['id_flight_level'] == $level[0])
        {
            return true;
        }else{
            return false;

        }

    }

    public function execute() {

        $this->printer->generateView('Reserva.html');
    }

    private function generalTurno()
    {
        header("location:/turno");
    }

    private function RealizarChequeo()
    {
        exit();
    }

    private function RealizarReserva($dia,$vuelos,$fechaSalida)
    {

        $datos=$this->BusquedaModel->getSubOrbitalParaReservar($dia,$vuelos);
        $cabinas=$this->BusquedaModel->getCabinas();
        //      var_dump($datos[0]["RocketTypeID"]);
        $cabinaDelAvion=$this->BusquedaModel->getCabinaDelAvion($datos[0]["RocketTypeID"]);
    /*    var_dump($cabinaDelAvion);
        var_dump($vuelos);
        var_dump($datos);*/
        $idVuelo=$vuelos;
        $cab=array();
//        $datos[0]["departure_time"]
        $horaSalida =$datos[0]["departure_time"];
        if($cabinaDelAvion[0]["capacity_type_1"]!=null){
            $esta_disponible=$this->verficarEspacioLibre( $cabinaDelAvion[0]["capacity_type_1"],$idVuelo,$fechaSalida,$horaSalida,1);
            if($esta_disponible){
                $cab+=array(count($cab)=>["id"=>$cabinas[0]["id"],"description"=>$cabinas[0]["description"]]);}


        }

        if($cabinaDelAvion[0]["capacity_type_2"]!=null){

        $esta_disponible=$this->verficarEspacioLibre( $cabinaDelAvion[0]["capacity_type_2"],$idVuelo,$fechaSalida,$horaSalida,2);
            if($esta_disponible){
                $cab+=array(count($cab)=>["id"=>$cabinas[1]["id"],"description"=>$cabinas[1]["description"]]);}
        }

        if($cabinaDelAvion[0]["capacity_type_3"]!=null){

            $esta_disponible=$this->verficarEspacioLibre( $cabinaDelAvion[0]["capacity_type_3"],$idVuelo,$fechaSalida,$horaSalida,3);
            if($esta_disponible){
                $cab+=array(count($cab)=>["id"=>$cabinas[2]["id"],"description"=>$cabinas[2]["description"]]);
            }
        }

        $data = array("vuelo"=>$vuelos,"Datos"=>$datos,"cabines"=>$cab,"departure_date"=>$fechaSalida,);
      /*  echo "<br>------------------------------------<br>";
        var_dump($vuelos );
        echo "<br>------------------------------------<br>";
        var_dump($datos );
        echo "<br>------------------------------------<br>";
        var_dump($cab);
        echo "<br>---- -<br>";
        var_dump($fechaSalida);
        echo "<br>------------------------------------<br>";
        var_dump($data);*/
        $this->printer->generateView('Reserva.html',$data);
    }

    private function verficarEspacioLibre($capacidadDeLaCabina,$idVuelo, $fechaDeSalida, $horaSalida, $idCabina)
    {
        $espaciosusados=$this->ReservaModel->getCabinasDeVuelosReservadas($idVuelo,$fechaDeSalida,$horaSalida,$idCabina);
    var_dump($espaciosusados);
    var_dump($capacidadDeLaCabina);
        if($espaciosusados=null)
        return true;
        if($espaciosusados<$capacidadDeLaCabina){
        return true;
        }
        else{
        return false;
         }
    }

}