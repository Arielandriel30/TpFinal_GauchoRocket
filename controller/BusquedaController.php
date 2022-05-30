<?php

class BusquedaController
{
  
    private $printer;
    private $busquedaModel;

    public function __construct($busquedaModel,$printer) {
        $this->printer = $printer;
        $this->busquedaModel=$busquedaModel;
     
    }

    public function searchFlight()
    {
        $busqueda = $_POST["viaje"];
        var_dump($busqueda);
        $result  = $this->busquedaModel->getSpaceFlight($busqueda);
        if (!$result){
            header("location:../index.php");
            exit();
        } else {
            $data=array("flight"=>$result);
            $this->printer->generateView('Busqueda.html',$data);
            //return $result;
        }

    }

    public function execute() {

            $this->printer->generateView('Busqueda.html');
    }

    public function getOrbitales()
    {


             $result  = $this->busquedaModel->getOrbitales();

             if (!$result){
                 header("location:../index.php");
                 exit();
             } else {

              $data=array("Orbital"=>$result);
                 $this->printer->generateView('BusquedaOrbitales.html',$data);
             }

    }
    public function getSubOrbitales()
    {
             $result  = $this->busquedaModel-> getSubOrbitales();

             if (!$result){
                 header("location:../index.php");
                 exit();
             } else {
                 $data=array("SubOrbital"=>$result);
                 $this->printer->generateView('BusquedaSubOrbitales.html',$data);
         }
    }

    public function getTours()
    {

             $result  = $this->busquedaModel->getTours();
             if (!$result){
                 header("location:../index.php");
                 exit();
             } else {
                 $data=array("Tours"=>$result);
                 $this->printer->generateView('BusquedaTours.html',$data);
             //                 return $result;
         }

    }
}