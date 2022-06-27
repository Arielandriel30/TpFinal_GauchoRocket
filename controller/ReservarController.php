<?php

class ReservarController
{

    private $printer;
    private $ReservaModel;
    private $session;

    /**
     * @param $printer
     * @param $ReservaModel
     */
    public function __construct($printer, $ReservaModel,$session)
    {
        $this->printer = $printer;
        $this->ReservaModel = $ReservaModel;
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
        if (isset($_POST['submit'])) {
            if (!empty($_POST['vuelos'])) {
                $vuelos = $_POST['vuelos'];

            }
            if (!empty($_POST['idLevel'])) {
                $level = $_POST['idLevel'];

            }
        }
//      var_dump($vuelos);
//      var_dump($level);
//      var_dump($nivelMedico);

        if ($nivelMedico[0]['id_flight_level'] == 3)
        {   $valorTotal=sizeof($vuelos)*1000;
            $data = array("vuelo"=>$vuelos,"valor"=>1000,"total"=>$valorTotal);
            $this->printer->generateView('Compra.html',$data);
         exit();
        }
        if($nivelMedico[0]['id_flight_level'] == $level[0])
        {      $valorTotal=sizeof($vuelos)*1000;
            $data = array("vuelo"=>$vuelos,"valor"=>1000,"total"=>$valorTotal);
            $this->printer->generateView('Compra.html',$data);
            exit();
        }
        header("location:/");
        exit();
    }

    private function RealizarChequeo()
    {
        exit();
    }

    private function RealizarReserva()
    {
    }

}