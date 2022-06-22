<?php

class TurnoModel
{
    private $database;

    /**
     * @param $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getCentrosMedicos(){
        return $this->database->query("select * FROM medical_center ");
    }

    public function getCapacidadCentroMedico($centroMedico){
        return $this->database->query("select size FROM medical_center 
                                        where id='$centroMedico'");
    }

    public function getTurnosEstablecidos(int $centroMedico,string $fechaelejida){
        return $this->database->query("select count(distinct id_usuario) from turno
                                       where id_centro_medico='$centroMedico' and dia_turno='$fechaelejida'");
    }

    public function setTurno( $centroMedicoElejido, $diaTurno, $horaTurno, $idUser){
        $this->database->queryExecute("INSERT INTO turno (`dia_turno`, `id_centro_medico`, `id_usuario`)
                                        VALUES
                                        ('$diaTurno', '$centroMedicoElejido', '$idUser')");
    }

    public function GuardarResultadoDelChequeo($idUser,$resultadoiChequeo){
        $this->database->queryExecute("UPDATE usuario SET `id_flight_level` = '$resultadoiChequeo'
                                                    WHERE (`idUsuarios` = '$idUser')");
    }

}