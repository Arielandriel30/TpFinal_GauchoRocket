<?php

class TurnoController
{
    private $printer;
    private $TurnoModel;

    public function __construct($printer, $TurnoModel){
        $this->printer = $printer;
        $this->TurnoModel = $TurnoModel;
    }
    
    public function execute() {
        $result  = $this->TurnoModel->getCentrosMedicos();
        if (!$result){
            header("location:/");
            exit();
        } else {
            $data=array("medical"=>$result);
            $this->printer->generateView('Turno.html',$data);
        }
    }

    public function validate(){
        var_dump($_POST);
        $centroMedicoElejido=$_POST["centroMedico"];
        $diaTurno = $_POST["dateTurno"];
        $horaTurno = $_POST["timeTurno"];
        var_dump($centroMedicoElejido);
        var_dump($diaTurno);
        var_dump($horaTurno);
        $data=array("medical"=>$centroMedicoElejido);
        $this->printer->generateView('Turno.html',$data);
    }
}