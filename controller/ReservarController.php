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

    public function completar(){
        if ($this->session->sessionShow('usuario') == null) {
            header("location:/login");
            exit(0);
        }

        $user = $this->session->sessionShow('resultLogueado');
        $nivelMedico= $this->ReservaModel->getNivelMedico($user[0]["idUsuarios"]);

        if(empty($nivelMedico[0]["id_flight_level"])){
            $this->generalTurno();
            exit(0);
        }

        $vuelos = null;
        $level = null;

        if (!empty($_POST['vuelos'])) {
            $vuelos = $_POST['vuelos'];
        }
        if (!empty($_POST['idLevel'])) {
            $level = $_POST['idLevel'];
        }

        $respuesta=$this->validarNivelMedico($vuelos,$level,$nivelMedico);

        if(!$respuesta)
        {
            $nMedico = $nivelMedico[0]['id_flight_level'];
            $errorMessage = "Su nivel medico es '$nMedico' y no condice con la reserva que desea realizar. La reserva es nivel '$level[0]'";
            $this->session->execute("errorReservation", $errorMessage);
            header("location:/logueado/execute");
            exit();
        }

        if($respuesta)
        {
            $dia=null;
            $fechaSalida=null;
            $horaDeSalida=null;
            $idTipoDeVuelo=null;

            if (!empty($_POST['diaVuelo'])) {
                $dia = $_POST['diaVuelo'];
            }
            if (!empty($_POST['departure_date'])) {
                $fechaSalida=$_POST['departure_date'];
            }
            if (!empty($_POST['departure_time'])) {
                $horaDeSalida=$_POST['departure_time'];
            }
            if (!empty($_POST['RocketTypeID'])) {
                $idTipoDeVuelo=$_POST['RocketTypeID'];
            }

           if(isset($_POST['ReservarSubOrbital'])) {

           $this->RealizarReservasSubOrbital($dia, $vuelos[0], $fechaSalida,$idTipoDeVuelo,$horaDeSalida);
           }
           // var_dump($_POST['ReservarTour']);
           if(isset($_POST['ReservarTour'])) {
           //     var_dump($_POST['ReservarTour']);
           $this->RealizarReservasTours($dia, $vuelos[0], $fechaSalida,$idTipoDeVuelo,$horaDeSalida);
           }

           if(isset($_POST['ReservarBusqueda'])) {

           $this->RealizarReservasBusquedas($dia, $vuelos[0], $fechaSalida,$idTipoDeVuelo,$horaDeSalida);
            }
        }


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
        $horaDeSalida=null;
        $idTipoDeVuelo=null;

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

            if (!empty($_POST['departure_time'])) {
                $horaDeSalida=$_POST['departure_time'];
            }
            if (!empty($_POST['RocketTypeID'])) {
                $idTipoDeVuelo=$_POST['RocketTypeID'];
            }

            $user = $this->session->sessionShow('resultLogueado');
            $nivelMedico= $this->ReservaModel->getNivelMedico($user[0]["idUsuarios"]);
            if(empty($nivelMedico[0]["id_flight_level"])){
                 $this->generalTurno();
            //exit(0);
            }
            else{
             $respuesta=$this->validarNivelMedico($vuelos,$level,$nivelMedico);
             if($respuesta){
                //echo "se puede reservar";
                 if(isset($_POST['ReservarSubOrbital'])) {
                     $this->RealizarReservasSubOrbital($dia, $vuelos[0], $fechaSalida,$idTipoDeVuelo,$horaDeSalida);
                 }
                 if(isset($_POST['ReservarTour'])) {
                     $this->realizarReservasTours($dia, $vuelos[0], $fechaSalida,$idTipoDeVuelo,$horaDeSalida);
                 }
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

    private function generalTurno()
    {
        header("location:/turno");
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

    private function RealizarReservasSubOrbital($dia,$vuelos,$fechaSalida,$idTipoDeVuelo,$horaDeSalida)
    {

        //$cab = $this->getCabinasDelAvionDisponibles($datos[0], $vuelos, $fechaSalida);
        $cab = $this->getCabinasDisponiblesDelAvion($vuelos, $fechaSalida,$idTipoDeVuelo,$horaDeSalida);
        $datos=$this->BusquedaModel->getSubOrbitalParaReservar($dia,$vuelos);
        //var_dump($datos);
        $data = array("vuelo"=>$vuelos,"Datos"=>$datos,"cabines"=>$cab,"departure_date"=>$fechaSalida,"Tipo"=>"SubOrbital");

        $this->printer->generateView('Reserva.html',$data);
    }

    /**
     * @param $vuelos
     * @param $fechaSalida
     * @return array|array[]
     */

    public function getCabinasDisponiblesDelAvion($idVuelo, $fechaSalida, $idTipoDeVuelo, $horaSalida): array
    {
        $cabinas = $this->BusquedaModel->getCabinas();

        //$cabinaDelAvion = $this->BusquedaModel->getCabinaDelAvion($datos["RocketTypeID"]);
        $cabinaDelAvion = $this->BusquedaModel->getCabinaDelAvion($idTipoDeVuelo);
        //var_dump($cabinaDelAvion);
        $cab = array();

        if ($cabinaDelAvion[0]["capacity_type_1"] != null) {
            $esta_disponible = $this->verficarEspacioLibre($cabinaDelAvion[0]["capacity_type_1"], $idTipoDeVuelo, $fechaSalida, $horaSalida, 1);
            if ($esta_disponible) {
                $cab += array(count($cab) => ["id" => $cabinas[0]["id"], "description" => $cabinas[0]["description"]]);
            }
        }

        if ($cabinaDelAvion[0]["capacity_type_2"] != null) {

            $esta_disponible = $this->verficarEspacioLibre($cabinaDelAvion[0]["capacity_type_2"],$idTipoDeVuelo, $fechaSalida, $horaSalida, 2);
            if ($esta_disponible) {
                $cab += array(count($cab) => ["id" => $cabinas[1]["id"], "description" => $cabinas[1]["description"]]);
            }
        }

        if ($cabinaDelAvion[0]["capacity_type_3"] != null) {

            $esta_disponible = $this->verficarEspacioLibre($cabinaDelAvion[0]["capacity_type_3"], $idTipoDeVuelo, $fechaSalida, $horaSalida, 3);
            if ($esta_disponible) {
                $cab += array(count($cab) => ["id" => $cabinas[2]["id"], "description" => $cabinas[2]["description"]]);
            }
        }
        return $cab;
    }

    private function verficarEspacioLibre($capacidadDeLaCabina,$idVuelo, $fechaDeSalida, $horaSalida, $idCabina)
    {
        $espaciosusados=$this->ReservaModel->getCabinasDeVuelosReservadas($idVuelo,$fechaDeSalida,$horaSalida,$idCabina);
        if($espaciosusados=null)
            return true;
        if($espaciosusados<$capacidadDeLaCabina){
            return true;
        }
        else{
            return false;
        }
    }

    public function execute() {

        $this->printer->generateView('Reserva.html');
    }

    private function realizarReservasTours($dia,$vuelos,$fechaSalida,$idTipoDeVuelo,$horaDeSalida)
    {
        //$cab = $this->getCabinasDelAvionDisponibles($datos[0], $vuelos, $fechaSalida);
        $cab = $this->getCabinasDisponiblesDelAvion($vuelos, $fechaSalida,$idTipoDeVuelo,$horaDeSalida);
        $datos=$this->BusquedaModel->getToursParaReservar($dia,$vuelos);
        //var_dump($datos);
        $data = array("vuelo"=>$vuelos,"Datos"=>$datos,"cabines"=>$cab,"departure_date"=>$fechaSalida,"Tipo"=>"SubOrbital");

        $this->printer->generateView('Reserva.html',$data);
    }

    public function misReservas(){
        $fechas=array();
        $user=$this->session->sessionShow('usuario');
        $id=$this->ReservaModel->getIdUser($user);
        $reservas=$this->ReservaModel->getReservas($id[0]["idUsuarios"]);

       foreach ($reservas as $valor){
           array_push($fechas,$valor['fecha_vuelo']);
       }

        $devuelto=$this->ReservaModel->conversorDeFechasAArray($fechas);

        for($i=0;$i<count($devuelto);$i++){
               array_push($reservas[$i],$devuelto[$i]);
        }
        for($i=0;$i<count($reservas);$i++){
            if($reservas[$i]['check_in']=="1"){
                $reservas[$i]['check_in']=true;
            }
        }

        $data = array("reservas"=>$reservas);

        $this->printer->generateView('MisReservas.html',$data);
    }

    private function RealizarReservasBusquedas($dia, $vuelos, $fechaSalida, $idTipoDeVuelo, $horaDeSalida)
    {
        if (!empty($_POST['idsf'])) {
            $idsf = $_POST['idsf'];
        }
       // var_dump($idsf);
        //$cab = $this->getCabinasDelAvionDisponibles($datos[0], $vuelos, $fechaSalida);
        $cab = $this->getCabinasDisponiblesDelAvion($vuelos, $fechaSalida, $idTipoDeVuelo, $horaDeSalida);
        //var_dump($cab);
        $datos=$this->BusquedaModel->getSpaceFlightParaReservar($vuelos, $idsf);
        //var_dump($datos);

        $data = array("vuelo"=>$vuelos,"Datos"=>$datos,"cabines"=>$cab,"departure_date"=>$fechaSalida,"Tipo"=>"SubOrbital");
        $this->printer->generateView('Reserva.html',$data);
    }
}