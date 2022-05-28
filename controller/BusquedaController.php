<?php

class BusquedaController
{
  
    private $printer;
    private $busquedaModel;

    public function __construct($busquedaModel,$printer) {
        $this->printer = $printer;
        $this->busquedaModel=$busquedaModel;
     
    }

    public function validate()
    {
        $busqueda = $_POST["viaje"];
        $result  = $this->busquedaModel->getSpaceFligh($busqueda);
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
        $busqueda = $_POST["viaje"];
        $result  = $this->busquedaModel->getUsuario($busqueda);
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