<?php

class BusquedaController
{
    private $viaje;
    private $busquedaModel;

    public function __construct($viaje, $busquedaModel)
    {
        $this->viaje = $viaje;
        $this->busquedaModel = $busquedaModel;
    }

    public function validate()
    {
        $result  = $this->busquedaModel->getUsuario($this->viaje);

        if (!$result){
            header("location:../index.php");
            exit();
        } else {
            header("location:../busqueda.php");
        }
    }
}