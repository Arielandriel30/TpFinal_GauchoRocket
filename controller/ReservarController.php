<?php

class ReservarController
{

    private $printer;
    private $ReservaModel;

    /**
     * @param $printer
     * @param $ReservaModel
     */
    public function __construct($printer, $ReservaModel)
    {
        $this->printer = $printer;
        $this->ReservaModel = $ReservaModel;
    }

    public  function validate(){
     $nivelMedico= $this->ReservaModel->getNivelMedico();
     if(!$nivelMedico){

         $this->generalTurno();
         $this->RealizarChequeo();
     }
     else{
         $this->ReservaModel->getNivelMedico();
         $this->validarNivelMedico();
     }
            $this->RealizarReserva();


    }

    public function execute() {

        $this->printer->generateView('Reserva.html');
    }

    private function generalTurno()
    {
    }

    private function validarNivelMedico()
    {
    }

    private function RealizarChequeo()
    {
    }

    private function RealizarReserva()
    {
    }

}