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

    public function guardarReserva($idVuelo,$fechaCompra,$precio,$idUser,$origen,$fechaVuelo,$duracion,$cabina,$servicio,$codigo){
        $this->database->queryExecute(
            "INSERT INTO compra(id_vuelo, fecha_compra,precio, id_user,origen,fecha_vuelo,duracion,cabina,servicio,codigo) 
            VALUES ('$idVuelo','$fechaCompra','$precio','$idUser','$origen','$fechaVuelo','$duracion','$cabina','$servicio','$codigo')"
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
    public function getReservaPorId($id){
        return $this->database->query(
            "SELECT * FROM compra WHERE  id='$id'"
        );
    }

    public function hacerCheckIn($id){
        return $this->database->query(
            "UPDATE compra SET check_in='1' WHERE id='$id'"
        );
    }
    public function getAllCheckIn($idUser){
        return $this->database->query(
            "SELECT check_in FROM compra WHERE  id_user='$idUser'"
        );
    }
    public function isCheckIn($id){
        $sql= $this->database->query("SELECT  check_in FROM compra WHERE id='$id'");

        if(isset($sql[0]["check_in"])){
            if($sql[0]["check_in"]=="1"){
                return true;
            }else{
                return "";
            }}
    }

    public function check_in_range($date_start, $date_end, $date_now) {
        $date_start = strtotime($date_start);
        $date_end = strtotime($date_end);
        $date_now = strtotime($date_now);
        if (($date_now >= $date_start) && ($date_now <= $date_end))
            return true;
        return false;
    }

    public function conversorDeFechasAArray($fechas){
        $sePuedeCheckIn=array();

        foreach ($fechas as $valor){
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $date_now = date('Y-m-d H:i');
           // $fechaDeViaje=$fechas[0];
            $date=date("Y-m-d H:i",strtotime($valor));
            $date_start=date("Y-m-d H:i",strtotime($date."- 2 days"));
            $date_end=date("Y-m-d H:i",strtotime($date."- 2 hours"));
            $devuelto=$this->check_in_range($date_start,$date_end,$date_now);
            array_push($sePuedeCheckIn,$devuelto);
        }
        return $sePuedeCheckIn;
    }
}