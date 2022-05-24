<?php

class BusquedaController
{
    private $viaje;
    private $printer;
    private $busquedaModel;

    public function __construct($viaje,$busquedaModel,$printer) {
        $this->printer = $printer;
        $this->busquedaModel=$busquedaModel;
        $this->viaje=$viaje;
    }

    public function validate()
    {
        $result  = $this->busquedaModel->getUsuario($this->viaje);
        var_dump($result);
        if (!$result){
            header("location:../index.php");
            exit();
        } else {
            header("location:../busqueda.php");
            /*$data=array("usuario"=>$result);
            $this->printer->generateView('Busqueda.php',$data);*/
            return $result;
        }
    }
    public function execute() {
        $result  = $this->busquedaModel->getUsuario($this->viaje);
        var_dump($result);
        if (!$result){
            header("location:../index.php");
            exit();
        } else {
            //header("location:../busqueda.php");
            $data=array("usuario"=>$result);
            $this->printer->generateView('Busqueda.php',$data);
        }

    }
//$this->printer->generateView('Busqueda.php');
}