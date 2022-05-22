<?php

class BusquedaModel{
    private $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function  getUsuario($usuario){
        return $this->database->query("SELECT * FROM usuario 
        where nameU = '$usuario'");
    }

    public function  getSpaceFligh($station){
        return $this->database->query(sprintf("Select code, so.name, sd.name , departure_date, departure_time, duration, side, sft.short_name, plate
        FROM space_flight sf
        JOIN station so ON sf.from_id = so.id
        JOIN station sd ON sf.to_id = sd.id
        JOIN rocket r ON sf.rocket_id=r.id
        JOIN rocket_type rt ON rt.id = r.rocket_type_id
        JOIN space_flight_type sft ON rt.flight_type_id=sft.id
        WHERE UPPER(so.name) like CONCAT('%%$station%%') OR UPPER(sd.name) like CONCAT('%%$station%%')"));
    }
}
?>