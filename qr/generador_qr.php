<?php

include("Conectarbd.php");
include("phpqrcode/qrlib.php");

$datos = "Nombre:Cacho";
QRcode::png($datos,false,QR_ECLEVEL_L,8);


QRcode::png('xdlfjhsdfljghsfd','cacho.png');





?>
