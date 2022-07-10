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
        return $this->database->query("SELECT  sf.day,COUNT(1), sf.duration, rt.name AS team, s.name AS departure , r.id as code, rt.flight_type_id as fl,rt.id AS RocketTypeID,sf.departure_time
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
        return $this->database->query("SELECT sf.id, sf.day,COUNT(1), sf.duration, rt.name AS team, s.name AS departure , CONCAT(
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
    FLOOR(RAND()*(10-5+r.id)+sf.id)
  ) as code, rt.flight_type_id as fl,rt.id AS RocketTypeID,sf.departure_time, s.id station_id, r.plate, 'I/V' side
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
        return $this->database->query("SELECT sf.day,COUNT(1), sf.duration, rt.name AS team, s.name AS departure , r.id as code, rt.flight_type_id as fl,rt.id AS RocketTypeID,sf.departure_time, r.plate
                                        FROM space_flight sf
                                        JOIN space_flight_type sft  ON sft.id= sf.space_flight_type_id
                                        JOIN rocket r ON r.id = sf.rocket_id
                                        JOIN rocket_type rt ON rt.id = r.rocket_type_id
                                        JOIN station s ON s.id=sf.departure
                                        WHERE sft.short_name='Tour'
                                        GROUP BY sf.day,sf.duration, rt.name, s.name
                                        ORDER BY sf.sort_day asc");
    }

    public function  getToursParaReservar($Day,$code){
        return $this->database->query("SELECT sf.id, sf.day,COUNT(1), sf.duration, rt.name AS team, s.name AS departure , CONCAT(
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
  CHAR( FLOOR(65 + (RAND() * 25))),
    FLOOR(RAND()*(10-5+r.id)+sf.id)
  ) as code, rt.flight_type_id as fl,rt.id AS RocketTypeID,sf.departure_time, s.id station_id, r.plate, 'I/V' side, r.id
                                        FROM space_flight sf
                                        JOIN space_flight_type sft  ON sft.id= sf.space_flight_type_id
                                        JOIN rocket r ON r.id = sf.rocket_id
                                        JOIN rocket_type rt ON rt.id = r.rocket_type_id
                                        JOIN station s ON s.id=sf.departure
                                        WHERE sft.short_name='Tour' 
                                        AND  r.id='$code' and sf.day='$Day'
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
      return $this->database->query(sprintf("SELECT sf.id, CONCAT(SUBSTRING(orig.name,1,1),SUBSTRING(dest.name,1,1),r.plate,'-',sf.id,lorig.id,ldest.id) 'code', orig.name 'departure', dest.name 'destination', DATE_ADD(sf.departure_date, INTERVAL lorig.acum_time HOUR) 'departure_date',DATE_ADD(sf.departure_date, INTERVAL ldest.acum_time HOUR) 'destination_date',ldest.duration 'duration', rsft.short_name 'rTypeName', rt.name 'fType', r.plate 'plate', rt.id 'RocketTypeID'
                                                            FROM space_flight sf
                                                            JOIN route rou ON rou.id=sf.route_id 
                                                            JOIN lane lorig ON lorig.space_flight_id = sf.id
                                                            JOIN station orig ON orig.id = lorig.station_id 
                                                            JOIN lane ldest ON ldest.space_flight_id = sf.id
                                                            JOIN station dest ON dest.id = ldest.station_id 
                                                            JOIN space_flight_type rsft  ON rsft.id= lorig.flight_type_id
                                                            JOIN rocket r ON r.id = sf.rocket_id
                                                            JOIN rocket_type rt ON rt.id = r.rocket_type_id
                                                            WHERE
                                                            orig.name<>dest.name
                                                            AND UPPER(orig.name) LIKE UPPER(CONCAT('%%$stationO%%'))
                                                            AND UPPER(dest.name) LIKE UPPER(CONCAT('%%$stationD%%'))
                                                            AND sf.space_flight_type_id = rsft.id
                                                            AND lorig.space_flight_id = sf.id
                                                            AND lorig.sort_ <= ldest.sort_ 
                                                            GROUP BY sf.id, rou.id, rsft.id, lorig.sort_, lorig.space_flight_id,sf.departure_date,lorig.acum_time
                                                            HAVING departure_date >= $date
                                                            ORDER BY lorig.flight_type_id, lorig.sort_ ASC"));
    }


    public function  getSpaceFlightParaReservar($code,$idvuelos){
        return $this->database->query(sprintf("SELECT
    sf.id,
    CONCAT(
        SUBSTRING(orig.name, 1, 1),
        SUBSTRING(dest.name, 1, 1),
        r.plate,
        '-',
        sf.id,
        lorig.id,
        ldest.id
    ) 'code',
    orig.name 'departure',
    dest.name 'destination',
    DATE_ADD(
        sf.departure_date,
        INTERVAL lorig.acum_time HOUR
    ) 'departure_date',
    DATE_ADD(
        sf.departure_date,
        INTERVAL ldest.acum_time HOUR
    ) 'destination_date',
    ldest.duration 'duration',
    rsft.short_name 'rTypeName',
    rt.name 'team',
    r.plate 'plate',
    r.id 'rocketID',
    rt.id 'RocketTypeID',
    rt.flight_type_id 'fl'
FROM
    space_flight sf
JOIN route rou ON
    rou.id = sf.route_id
JOIN lane lorig ON
    lorig.space_flight_id = sf.id
JOIN station orig ON
    orig.id = lorig.station_id
JOIN lane ldest ON
    ldest.space_flight_id = sf.id
JOIN station dest ON
    dest.id = ldest.station_id
JOIN space_flight_type rsft ON
    rsft.id = lorig.flight_type_id
JOIN rocket r ON
    r.id = sf.rocket_id
JOIN rocket_type rt ON
    rt.id = r.rocket_type_id
WHERE
sf.id = '$idvuelos'
GROUP BY
    sf.id,
    rou.id,
    rsft.id,
    lorig.space_flight_id,
    sf.departure_date,
    lorig.acum_time,
    lorig.id,
    ldest.id,
    r.plate,
    orig.name,
    dest.name
HAVING code = '$code'
ORDER BY
    lorig.flight_type_id, 
    lorig.sort_ ASC"));
    }
     public function  getCabinaDelAvion($idRocketType){
        return $this->database->query(sprintf("SELECT * FROM rocket_type
            where id='$idRocketType'"));
    }
    public function  getCabinas(){
        return $this->database->query("SELECT * FROM cabin_type");
    }
}
?>