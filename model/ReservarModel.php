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

//    public  function  SetReserva($code, $from_id,  $departure_date, $departure_time, $duration, $rocket_id, $space_flight_id, $reservation_quantity, $cabin_type_id, $user_id)
//    {
//        $this->database->queryExecute("INSERT INTO flight_booking ('code', 'from_id',  'departure_date', 'departure_time','duration', 'rocket_id', 'space_flight_id', 'reservation_quantity',  'cabin_type_id ', 'user_id' )
//                                        VALUES ('$code', '$from_id','$departure_date','$departure_time','$duration','$rocket_id','$space_flight_id','$reservation_quantity', '$cabin_type_id', '$user_id')");
//    }
    public  function  SetReserva( $code, $from_id,  $departure_date, $departure_time, $duration, $rocket_id, $space_flight_id, $reservation_quantity, $cabin_type_id, $user_id)
    {
//        var_dump("INSERT INTO flight_booking (code, from_id,  departure_date, departure_time, duration, rocket_id, space_flight_id, reservation_quantity, cabin_type_id, user_id)
//                                        VALUES ('$code', '$from_id','$departure_date','$departure_time','$duration','$rocket_id','$space_flight_id','$reservation_quantity', '$cabin_type_id', '$user_id')");
        $this->database->queryExecute("INSERT INTO flight_booking ( code, from_id, departure_date, departure_time, duration, rocket_id, space_flight_id, reservation_quantity, cabin_type_id, user_id) 
                                        VALUES ('$code', '$from_id','$departure_date','$departure_time','$duration','$rocket_id','$space_flight_id','$reservation_quantity', '$cabin_type_id', '$user_id')");
    }

    /**INSERT INTO `gauchorocket`.`flight_booking` (`id`, `code`, `from_id`,  `departure_date`, `departure_time`, `duration`, `rocket_id`, `space_flight_id`, `reservation_quantity`, `cabin_type_id`, `user_id`) VALUES ('6', 'ed', '0', '0', 'awfa', 'aaf', 'aa', 'a', 'a', 'a', 'a', 'a');*/

    public function guardarReserva($idVuelo,$fechaCompra,$idUser,$origen,$fechaVuelo,$cabina,$servicio){
        $this->database->queryExecute(
            "INSERT INTO compra(id_vuelo, fecha_compra, id_user,origen,fecha_vuelo,cabina,servicio) VALUES ('$idVuelo','$fechaCompra','$idUser','$origen','$fechaVuelo','$cabina','$servicio')"
        );
    }
    public function getIdFlightBooking($idVuelo,$idUser){
        return $this->database->query(
            "SELECT id FROM flight_booking WHERE code='$idVuelo' AND user_id='$idUser'"
        );
    }
    public function getReservas($idUser){
        return $this->database->query(
            "SELECT * FROM compra WHERE  id_user='$idUser'"
        );
    }
    public function getIdUser($user){
        return $this->database->query(
            "SELECT idUsuarios FROM usuario WHERE  nameU='$user'"
        );
    }
    public function getStation($id){
        return $this->database->query(
            "SELECT name FROM station WHERE  id='$id'"
        );
    }

}