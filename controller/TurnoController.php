<?php

class TurnoController
{
    private $printer;
    private $TurnoModel;
    private $session;

    public function __construct($printer, $TurnoModel, $session){
        $this->printer = $printer;
        $this->TurnoModel = $TurnoModel;
        $this->session = $session;
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
        $centroMedicoElejido=$_POST["centroMedico"];
        $diaTurno = $_POST["dateTurno"];
        $horaTurno = $_POST["timeTurno"];
        $turnosEstablecidos=$this->TurnoModel->getTurnosEstablecidos($centroMedicoElejido, $diaTurno);
        $capacidadmaximaAlDia=$this->TurnoModel->getCapacidadCentroMedico($centroMedicoElejido);
        /*var_dump($turnosEstablecidos[0]["count(distinct id_usuario)"]);
        var_dump($capacidadmaximaAlDia[0]["size"]);
        var_dump($turnosEstablecidos[0]["count(distinct id_usuario)"]<$capacidadmaximaAlDia[0]["size"]);*/
        if($turnosEstablecidos[0]["count(distinct id_usuario)"]<$capacidadmaximaAlDia[0]["size"]){
            $user = $this->session->sessionShow('resultLogueado');
            $idUser= $user[0]["idUsuarios"];
            $this->generarTurno($centroMedicoElejido,  $diaTurno, $horaTurno ,$idUser);
            $this->RealizarChequeo($idUser);
            //header("location:/");
            exit();
        }
        else{
            $result  = $this->TurnoModel->getCentrosMedicos();
            $data=array("medical"=>$result,"Turno Error"=>"No existe la capacidad para este centro medico: -".$centroMedicoElejido."-, en las fechas indicadas");
            $this->printer->generateView('Turno.html',$data);
        }

        //header("location:/");

    }

    private function generarTurno($centroMedicoElejido, $diaTurno, $horaTurno, $idUser)
    {
        $this->TurnoModel->setTurno($centroMedicoElejido, $diaTurno, $horaTurno, $idUser);
    }

    private function RealizarChequeo($idUser)
    {   $resultadoChequeo=$this->generateRandomLevel();
        $this->TurnoModel->GuardarResultadoDelChequeo($idUser,$resultadoChequeo);
        $nivel = $this->TurnoModel->resultadoChequeo($idUser);
        $this->session->execute('nivel', $nivel);
        $result  = $this->TurnoModel->getCentrosMedicos();
        $data=array("medical"=>$result,"Nivel medico"=>"Usted obtuvo el siguiente nivel medico como resultado del chequeo medico: ".$resultadoChequeo."-",
        "nivel", $nivel);
        $this->printer->generateView('Turno.html',$data);
    }
    private function generateRandomLevel(){
        return rand(1,3);
    }
}
