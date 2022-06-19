<?php

class CompraModel
{

    private $database;

    public function __construct( $getDatabase)
    {
        $this->database = $getDatabase;
    }
}