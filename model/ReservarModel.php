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

    public  function  SetReserva($id, $code, $from_id,  $departure_date, $departure_time, $duration, $rocket_id, $space_flight_id, $reservation_quantity, $cabin_type_id, $user_id)
    {
        $this->database->queryExecute("
                                            INSERT INTO flight_booking ('id', 'code', 'from_id',  'departure_date', 'departure_time','duration', 'rocket_id', 'space_flight_id', 'reservation_quantity',  'cabin_type_id ', 'user_id' ) 
                                            VALUES 
                                                ('$id','$code', '$from_id','$departure_date','$departure_time','$duration','$rocket_id','$space_flight_id','$reservation_quantity', '$cabin_type_id', '$user_id')                                 
                                        ");
    }
    public  function  SetReservaSubOrbital( $code, $from_id,  $departure_date, $departure_time, $duration, $rocket_id, $space_flight_id, $reservation_quantity, $cabin_type_id, $user_id)
    {
        $this->database->queryExecute("INSERT INTO flight_booking ( code, from_id,  departure_date, departure_time, duration, rocket_id, space_flight_id, reservation_quantity, cabin_type_id, user_id) 
                                        VALUES 
                                        ('$code', '$from_id','$departure_date','$departure_time','$duration','$rocket_id','$space_flight_id','$reservation_quantity', '$cabin_type_id', '$user_id')");
        var_dump("INSERT INTO flight_booking ( code, from_id,  departure_date, departure_time, duration, rocket_id, space_flight_id, reservation_quantity, cabin_type_id, user_id)
                                        VALUES
                                        ('$code', '$from_id','$departure_date','$departure_time','$duration','$rocket_id','$space_flight_id','$reservation_quantity', '$cabin_type_id', '$user_id')");
    }
    /**INSERT INTO `gauchorocket`.`flight_booking` (`id`, `code`, `from_id`,  `departure_date`, `departure_time`, `duration`, `rocket_id`, `space_flight_id`, `reservation_quantity`, `cabin_type_id`, `user_id`) VALUES ('6', 'ed', '0', '0', 'awfa', 'aaf', 'aa', 'a', 'a', 'a', 'a', 'a');*/
}