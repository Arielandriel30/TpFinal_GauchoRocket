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
        $busquedaOrigen = $_POST["viajeOrigen"];
        $busquedaDestino = $_POST["viajeDestino"];

        $input_date=$_POST['dateViaje'];
//        var_dump($input_date);
        $date=date("Y-m-d",strtotime($input_date));
//        var_dump($date);
        $result  = $this->busquedaModel->getSpaceFlight($busquedaOrigen,$busquedaDestino,$date);
        /*var_dump($result);*/
        if (!$result){
                header("location:../index.php");
        /*    $this->printer->generateView('Busqueda.html');*/
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

    public function getCircuitos()
    {
        $result  = $this->busquedaModel-> getCircuitos();

        if (!$result){
            header("location:../index.php");
            exit();
        } else {
            $data=array("Orbital"=>$result);
            $this->printer->generateView('BusquedaOrbitales.html',$data);
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

         }

    }
}