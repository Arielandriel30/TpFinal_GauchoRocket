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

    public function  getTours(){
        return $this->database->query("SELECT sf.day,COUNT(1), sf.duration, rt.name AS team, s.name AS departure
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
                                    JOIN space_flight_type sft on sft.id = l.flight_type_id");
    }

    public function  getSpaceFligh($station){
        return $this->database->query(sprintf("Select code, so.name, sd.name , departure_date, departure_time, duration, side, sft.short_name, plate
        FROM flight_booking sf
        JOIN station so ON sf.from_id = so.id
        JOIN station sd ON sf.to_id = sd.id
        JOIN rocket r ON sf.rocket_id=r.id
        JOIN rocket_type rt ON rt.id = r.rocket_type_id
        JOIN space_flight_type sft ON rt.flight_type_id=sft.id
        WHERE UPPER(so.name) like CONCAT('%%$station%%') OR UPPER(sd.name) like CONCAT('%%$station%%')"));
    }
}
?>