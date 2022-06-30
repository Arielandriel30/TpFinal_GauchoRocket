<?php

class ReportesController
{
    private $printer;
    private $ReportesModel;
    private $session;

    public function __construct($printer, $ReportesModel, $session){
        $this->printer = $printer;
        $this->ReportesModel = $ReportesModel;
        $this->session = $session;
    }

    public function execute(){
        $this->printer->generateView('Admin.html');
    }
}