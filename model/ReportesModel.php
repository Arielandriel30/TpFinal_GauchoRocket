<?php

class ReportesModel
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getContadorDatos($column, $table, $alias){
        return $this->database->query("SELECT count($column) AS $alias FROM $table
                                        ");
    }

    public function getSumaDatos($column, $table ){
        return $this->database->query("SELECT SUM('$column') FROM '$table'");
    }

    public function getCentros(){
        return $this->database->query("SELECT name_medical_center m, 
        count(id_centro_medico) AS Cantidad FROM  turno t JOIN medical_center m
        ON t.id_centro_medico = m.id
                       GROUP BY t.id_centro_medico");
    }

    public function getCabinas(){
        return $this->database->query("SELECT c.description AS TIPO, 
        count(f.cabin_type_id) AS Cantidad FROM cabin_type c JOIN flight_booking f
        ON c.id = f.cabin_type_id
                       GROUP BY f.cabin_type_id");
    }


    
}