<?php

class CompraModel
{

    private $database;

    public function __construct( $getDatabase)
    {
        $this->database = $getDatabase;
    }

    public function buscarPlanetaPorId($origen){
        $salida=null;
        switch ($origen) {
            case 1:
                $salida="EEI";
                break;
            case 2:
                $salida="OHotel";
                break;
            case 3:
                $salida="Luna";
                break;
            case 4:
                $salida="Marte";
                break;
            case 5:
                $salida="Ganimedes";
                break;
            case 6:
                $salida="Europa";
                break;
            case 7:
                $salida="Io";
                break;
            case 8:
                $salida="Encedalo";
                break;
            case 9:
                $salida="Titan";
                break;
            case 10:
                $salida="Buenos Aires";
                break;
            case 11:
                $salida="Ankara";
                break;
        }
        return $salida;
    }
}