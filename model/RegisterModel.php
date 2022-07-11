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
        $this->generateRandomHash();
        $encryptedPass =  $this->encryptedPass($pass);
        $this->sendMailer($usuario, $this->getRegisterMessage(), $email);
        return $this->database->queryExecute("INSERT INTO `usuario`(nameU,passwordU,email,isAdminU,is_blocked,hash) VALUES 
        ('$usuario', '$encryptedPass' ,'$email','$type', '1' , '$this->hash')");
    }

    public function  getRegisteredUser($usuario, $pass, $hash){
        $pass = $this->encryptedPass($pass);
        $query = "SELECT * FROM usuario 
        WHERE nameU = '$usuario' AND passwordU = '$pass' AND hash = '$hash'";
        return $this->database->query($query);
    }

    public function  activatedUser($usuario, $pass, $hash){
        $user = $this->getUsuario($usuario);
        $pass = $this->encryptedPass($pass);
        $query = "UPDATE `usuario` SET is_blocked = 0
         WHERE nameU = '$usuario' AND passwordU = '$pass' AND hash = '$hash'";
        $this->database->queryExecute($query);
        $mailer = new Mailer($this->getMessageSubject($usuario), $this->getActivatedUserMessage(), $user[0]["email"]);
        $mailer->sendMessage();
    }

    public function  updatePassword($usuario, $pass, $hash){
        $pass = $this->encryptedPass($pass);
        $query = "UPDATE `usuario` SET is_blocked = 0, passwordU = '$pass'
         WHERE nameU = '$usuario' AND hash = '$hash'";
        $this->database->queryExecute($query);
    }

    public function resetPassword($usuario){
        $user = $this->getUsuario($usuario);
        if($user){
            $userID = $user[0]["idUsuarios"];
            $this->generateRandomHash();
            $mailer = new Mailer($this->getMessageSubject($usuario), $this->getResetPasswordMessage(), $user[0]["email"]);
            $mailer->sendMessage();
            $query = "UPDATE `usuario` SET is_blocked = 1, hash = '$this->hash' WHERE idUsuarios = '$userID'";
            $this->database->queryExecute($query);
        }
    }

    public function sendMailer($usuario, $message,$email){
        $mailer = new Mailer($this->getMessageSubject($usuario), $message, $email);
        $mailer->sendMessage();
    }

    private function generateRandomHash(){
        $this->hash = bin2hex(random_bytes(18));
    }

    private function encryptedPass($pass){
        return md5($pass);
    }

    private function getMessageSubject($usuario){
        return "Bienvenido $usuario a Gaucho Rocket";
    }

    private function getRegisterMessage(){
        return "Para terminar con la activación dirigirse al siguiente link http://localhost/register/verify?hash=".$this->hash;
    }

    private function getResetPasswordMessage(){
        return "Para terminar obtener una nueva contraseña dirigirse al siguiente link http://localhost/register/newPassword?hash=".$this->hash;
    }

    private function getActivatedUserMessage(){
        return "Felicitaciones su cuenta está activa. Por favor no se olvide de relizar el chequeo médico para poder disfrutar de los vuelos";
    }

}




?>