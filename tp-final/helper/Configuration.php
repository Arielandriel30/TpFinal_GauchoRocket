<?php
include_once('helper/MySqlDatabase.php');
include_once('helper/Printer.php');
include_once('controller/LoginViewController.php');
include_once('controller/PrincipalController.php');
include_once('controller/RegistroViewController.php');


class Configuration
{
    public function getLoginViewController() {
        return new LoginViewController($this->getPrinter());

    }
    public function getRegistroViewController() {
        return new RegistroViewController($this->getPrinter());

    }

    public function getPrincipalController() {
        return new PrincipalController($this->getPrinter());

    }
    private function getDatabase() {
        return new MySqlDatabase(
             'localhost',
             'root',
             'Ariel3009',
             'gauchorocket');
             echo 'estas conectado';
     }
 

     private function getPrinter() {
         return new Printer();
     }
}





?>
