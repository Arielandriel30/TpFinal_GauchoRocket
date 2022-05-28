<?php
//cmd ubicarse en la carpeta c:\xampp\htdocs\TpFinal_GauchoRocket
//correr el siguiente comando composer require phpmailer/phpmailer
//Link de la biblioteca https://github.com/PHPMailer/PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);


try{
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug  = true;
    $mail->Username   = 'gaucho.rocket.w2@gmail.com';
    $mail->Password   = 'G4uCh@R0cK$';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('gaucho.rocket.w2@gmail.com', 'Gaucho Rocket');
    $mail->addAddress('mi_mail@gmail.com');//email de la persona a activar la cuenta

    $mail->isHTML(true);
    $mail->Subject  = 'Bienvenido a Gaucho Rocket';
    $mail->Body = 'Para terminar con la activación dirigirse al siguiente link http://localhost/Tpfinal_GauchoRocket/index.php';
    $mail->send();

    echo 'Message has been sent';
}catch (Exception $e){
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}