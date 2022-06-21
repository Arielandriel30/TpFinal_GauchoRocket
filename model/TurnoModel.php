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

    private function generateRandomLevel(){
        return rand(1,3);
    }
}