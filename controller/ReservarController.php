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
//            var_dump($nivelMedico);
//            var_dump($user);
//            var_dump($nivelMedico[0]["id_flight_level"]);
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

//        echo "datos de vuelos ingresados";
//        echo "<br>id/codigo";
//        var_dump( $vuelos);
//        echo "<br>Level";
//        var_dump( $level);
//        echo "<br>Dia De Vuelo";
//        var_dump( $dia );
//        echo "<br>--------------";

        if ($vuelos!=null && $nivelMedico[0]['id_flight_level'] == 3)
        {   $this->RealizarReserva($dia,$vuelos[0]);
            exit();
            $valorTotal=sizeof($vuelos)*1000;
            $data = array("vuelo"=>$vuelos,"valor"=>1000,"total"=>$valorTotal);
            $this->printer->generateView('Compra.html',$data);

        }else if($vuelos!=null && $level!=null && $nivelMedico[0]['id_flight_level'] == $level[0])
        {   $this->RealizarReserva($dia,$vuelos[0]);
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
        var_dump($datos);
        $data = array("vuelo"=>$vuelos,"Datos"=>$datos);
        $this->printer->generateView('Reserva.html',$data);
    }

}