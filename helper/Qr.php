<?php

class Qr
{
    private $dir;
    private $fileName;
    private $tamanio;
    private $level;
    private $frameSize;
    private $contenido;

    public function __construct()
    {
        $this->dir='../public/temp/';
        $this->fileName=$this->dir.'qr.png';
        $this->tamanio=15;
        $this->level='M';
        $this->frameSize=3;
    }

    public function crearQr($contenido){

        if(file_exists($this->dir)){
            mkdir($this->dir);
        }
        QRcode::png($contenido,$this->fileName,$this->level,$this->tamanio,$this->frameSize);
        return $this->fileName;
    }
}