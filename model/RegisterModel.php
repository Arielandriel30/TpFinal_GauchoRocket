<?php
require_once 'helper/Mailer.php';

class RegisterModel {

    private $database;
    private $hash;
    private $encryptedPass;

    public function __construct($database) {
        $this->database = $database;
    }

    public function  getUsuario($usuario){
        return $this->database->query("SELECT * FROM usuario 
        where nameU = '$usuario'");
    }

    public function  getRegister($usuario, $pass, $type, $email){
        $mailer = new Mailer($this->getMessageSubject(), $this->getRegisterMessage(), $email);
        $mailer->sendMessage();
        $this->generateRandomHash();
        $encryptedPass =  $this->encryptedPass($pass);
        return $this->database->queryRegister("INSERT INTO `usuario`(nameU,passwordU,email,isAdminU,is_blocked,hash) VALUES 
        ('$usuario', '$encryptedPass' ,'$email','$type', '1' , '$this->hash')");
    }

    public function  getRegisteredUser($usuario, $pass, $hash){
        return $this->database->query("SELECT * FROM usuario 
        WHERE nameU = '$usuario' AND passwordU = '$pass' AND hash = '$hash'");
    }

    public function  activatedUser($usuario, $pass, $hash){
        return $this->database->queryRegister("UPDATE `usuario` SET is_blocked = 0
         WHERE nameU = '$usuario' AND passwordU = '$pass' AND hash = '$hash'");
    }

    private function generateRandomHash(){
        $this->hash = bin2hex(random_bytes(18));
    }

    private function encryptedPass($pass){
        return md5($pass);
    }

    private function getMessageSubject(){
        return 'Bienvenido a Gaucho Rocket';
    }
    private function getRegisterMessage(){
        return "Para terminar con la activación dirigirse al siguiente link http://localhost/Registro.php?".$this->hash;
    }


}




?>