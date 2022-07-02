<?php

class Qr
{

    public function __construct()
    {
    }

    public function crearQr($contenido){

        $dir='public/temp/';
        if(!file_exists($dir)){
            mkdir($dir);
        }
        $fileName=$dir.'qr.png';
        $tamanio=10;
        $level='M';
        $frameSize=3;

        QRcode::png($contenido,$fileName,$level,$tamanio,$frameSize);

    }
}