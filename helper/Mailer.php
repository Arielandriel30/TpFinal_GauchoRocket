<?php
//cmd ubicarse en la carpeta c:\xampp\htdocs\TpFinal_GauchoRocket
//correr el siguiente comando composer require phpmailer/phpmailer
//Link de la biblioteca https://github.com/PHPMailer/PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'third-party/vendor/autoload.php';

class Mailer
{
    private $mail;

    public function __construct($subject, $message, $address)
    {
        $mailerConfiguration = $this->readConfiguration();
        $this->createConfiguration($mailerConfiguration, $subject, $message, $address);
    }

    private function createConfiguration($mailerConfiguration, $subject, $message, $address){
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        //$this->mail->SMTPDebug  = true;
        $this->mail->Host = $mailerConfiguration["hostName"];
        $this->mail->Username = $mailerConfiguration["userName"];
        $this->mail->Password = $mailerConfiguration["passwordApp"];
        $this->mail->Port = $mailerConfiguration["port"];
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->setFrom($mailerConfiguration["fromMail"], $mailerConfiguration["fromName"]);
        $this->mail->addAddress($address);
        $this->mail->isHTML(true);
        $this->mail->Subject =$subject;
        $this->mail->Body = $message;
    }

    public function sendMessage(){
        try{
        $this->mail->send();
        }catch (Exception $e){
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    private function readConfiguration(){
        return parse_ini_file("configuration/conexionmailer.ini");
    }
}