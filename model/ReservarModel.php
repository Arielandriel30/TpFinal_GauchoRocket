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

    public  function  getNivelMedico(){
        return 1;
    }
}