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
            if(!$nivelMedico){
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

    private function validarNivelMedico()
    {
        echo "validando nivel medico";
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