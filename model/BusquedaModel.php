<?php

class BusquedaModel{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function  getOrbitales(){
        return $this->database->query("SELECT sf.day,COUNT(1), sf.duration, rt.name AS team, s.name AS departure
                                        FROM space_flight sf
                                        JOIN space_flight_type sft  ON sft.id= sf.space_flight_type_id
                                        JOIN rocket r ON r.id = sf.rocket_id
                                        JOIN rocket_type rt ON rt.id = r.rocket_type_id
                                        JOIN station s ON s.id=sf.departure
                                        WHERE sft.short_name='Suborbital'
                                        GROUP BY sf.day,sf.duration, rt.name, s.name
                                        ORDER BY sf.sort_day asc");
    }

    public function  getSubOrbitales(){
        return $this->database->query("SELECT  sf.day,COUNT(1), sf.duration, rt.name AS team, s.name AS departure , r.id as code, rt.flight_type_id as fl
                                        FROM space_flight sf
                                        JOIN space_flight_type sft  ON sft.id= sf.space_flight_type_id
                                        JOIN rocket r ON r.id = sf.rocket_id
                                        JOIN rocket_type rt ON rt.id = r.rocket_type_id
                                        JOIN station s ON s.id=sf.departure
                                        WHERE sft.short_name='Suborbital'
                                        GROUP BY sf.day,sf.duration, rt.name, s.name
                                        ORDER BY sf.sort_day asc");
    }

    public function  getSubOrbitalParaReservar($Day,$code){
        return $this->database->query("SELECT  sf.day,COUNT(1), sf.duration, rt.name AS team, s.name AS departure , r.id as code, rt.flight_type_id as fl
                                        FROM space_flight sf
                                        JOIN space_flight_type sft  ON sft.id= sf.space_flight_type_id
                                        JOIN rocket r ON r.id = sf.rocket_id
                                        JOIN rocket_type rt ON rt.id = r.rocket_type_id
                                        JOIN station s ON s.id=sf.departure
                                        WHERE sft.short_name='Suborbital' and  r.id='$code' and sf.day='$Day'
                                        GROUP BY sf.day,sf.duration, rt.name, s.name
                                        ORDER BY sf.sort_day asc");
    }



    public function  getTours(){
        return $this->database->query("SELECT sf.day,COUNT(1), sf.duration, rt.name AS team, s.name AS departure , r.id as code, rt.flight_type_id as fl
                                        FROM space_flight sf
                                        JOIN space_flight_type sft  ON sft.id= sf.space_flight_type_id
                                        JOIN rocket r ON r.id = sf.rocket_id
                                        JOIN rocket_type rt ON rt.id = r.rocket_type_id
                                        JOIN station s ON s.id=sf.departure
                                        WHERE sft.short_name='Tour'
                                        GROUP BY sf.day,sf.duration, rt.name, s.name
                                        ORDER BY sf.sort_day asc");
    }

    public function  getCircuitos(){
        return $this->database->query("select r.name  as Circuitoname, l.duration, s.name,  sft.short_name
                                    FROM route r
                                    JOIN lane l on l.route_id=r.id
                                    join station s on s.id = l.station_id
                                    JOIN space_flight_type sft on sft.id = l.flight_type_id
                                    order by Circuitoname, short_name, sort_ ASC");
    }

    public function  getCircuitoYAceleracion($id_circuito,$aceleracion){
        return $this->database->query("select  r.id ,r.name  as Circuitoname, l.duration, s.name,  sft.short_name
                                    FROM route r
                                    JOIN lane l on l.route_id=r.id
                                    join station s on s.id = l.station_id
                                    JOIN space_flight_type sft on sft.id = l.flight_type_id
                                    where r.id ='$id_circuito' and  UPPER(sft.short_name) like UPPER(CONCAT('%%$aceleracion%%')) 
                                     order by Circuitoname, short_name, l.sort_");
    }

    public function  getCTiposDeVuelo(){
        return $this->database->query("select  short_name , id
	                                    FROM space_flight_type ");
    }

    public function  getRutas(){
        return $this->database->query("SELECT * FROM route;");
    }

    public function  getSpaceFlight($stationO,$stationD,$date){
        return $this->database->query(sprintf("Select sf.id, code, so.name AS departure, sd.name AS destination, departure_date, departure_time, duration, side, sft.short_name, plate
        FROM flight_booking sf
        JOIN station so ON sf.from_id = so.id
        JOIN station sd ON sf.to_id = sd.id
        JOIN rocket r ON sf.rocket_id=r.id
        JOIN rocket_type rt ON rt.id = r.rocket_type_id
        JOIN space_flight_type sft ON rt.flight_type_id=sft.id
        WHERE UPPER(so.name) like UPPER(CONCAT('%%$stationO%%')) and UPPER(sd.name) like UPPER(CONCAT('%%$stationD%%')) and DATE(departure_date)='$date'"));
    }
}
?>