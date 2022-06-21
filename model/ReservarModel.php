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
    }
}