<?php

class Qr
{

    public function __construct()
    {
    }

    public function crearQr($contenido){
        QRcode::png($contenido,false,QR_ECLEVEL_L,8);
    }
}