<?php
include_once('helper/MySqlDatabase.php');
include_once('helper/Printer.php');
include_once('controller/LoginController.php');
include_once('controller/PrincipalController.php');

class Configuration
{
    public function getLoginController() {
        return new LoginController($this->getPrinter());

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
     }
 
     private function getPrinter() {
         return new Printer();
     }
}





?>
