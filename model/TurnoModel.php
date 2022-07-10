<?php

require_once 'helper/Mailer.php';

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

    
    public function resultadoChequeo($idUser){
        return $this->database->query("SELECT id_flight_level FROM usuario
         WHERE idUsuarios = '$idUser'");
     }

    public function sendMailer($usuario, $message,$email){
        $mailer = new Mailer($this->getMessageSubject($usuario), $message, $email);
        $mailer->sendMessage();
    }

    private function getMessageSubject($usuario){
        return "Bienvenido $usuario a Gaucho Rocket";
    }

    public function enviarEmailDeConfimacionDelTurno($usuario,$centroMedico,$diaTurno,$horaDeTurno){
        var_dump($usuario);
        $this->sendMailer( $usuario[0]["nameU"],$this->getMessageTurno($usuario[0]["nameU"],$centroMedico,$diaTurno,$horaDeTurno),$usuario[0]["email"]);
    }
    private function getMessageTurno($usuario,$centroMedico,$diaTurno,$horaDeTurno){
        return "Estimado Usuario: $usuario,\n El Turno fue generado correctamente,
                    Usted Elijio En Centro medico de: $centroMedico,\n 
                    Para el dia: $diaTurno, a la hora:$horaDeTurno";
    }

    private function getMessageResult($usuario,$level){
        return "Estimado $usuario; El resultado de su examenes medico le dieron una resultado de nivel correspondiente al NIVLE $level, Co n el Cual podra realizar Las reservas para los vuelos interezados";
    }
}