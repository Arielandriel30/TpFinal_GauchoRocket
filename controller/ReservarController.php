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

    public function execute() {

        $this->printer->generateView('Reserva.html');
    }

}