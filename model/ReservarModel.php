<?php

class ReservarModel
{
    /**
     * @var MySqlDatabase
     */
    private $database;

    /**
     * @param MySqlDatabase $getDatabase
     */
    public function __construct( $getDatabase)
    {
        $this->database = $getDatabase;
    }

    public  function  getNivelMedico(int $id){
        return $this->database->query("SELECT id_flight_level 
                                            FROM usuario
                                        where idUsuarios='$id'");
    } public  function  getCabinasDeVuelosReservadas(int $idVuelo,$fechaDeSalida,$horaSalida,$idCabina){
        return $this->database->query("
                                            SELECT sum(fb.reservation_quantity)
                                            FROM flight_booking fb
                                            WHERE fb.rocket_id='$idVuelo' and 
                                                     fb.departure_date='$fechaDeSalida' and
                                            fb.departure_time='$horaSalida' and 
                                            fb.cabin_type_id='$idCabina'                                  
                                        ");
    }
}