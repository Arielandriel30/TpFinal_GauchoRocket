<?php
include_once('MySqlDatabase.php');
include_once('Printer.php');
include_once('controller/LoginViewController.php');
include_once('controller/PrincipalController.php');
include_once('controller/RegistroViewController.php');
include_once('controller/BusquedaViewController.php');

class Configuration
{
    public function getLoginViewController() {
        return new LoginViewController($this->getPrinter());

    }
    public function getRegistroViewController() {
        return new RegistroViewController($this->getPrinter());

    }

    public function getBusquedaViewController() {
        return new BusquedaViewController($this->getPrinter());

    }

    public function getPrincipalController() {
        return new PrincipalController($this->getPrinter());

    }
    private function getDatabase() {
        $configDatabase_ini = $this->getConfiguration();

        return new MySqlDatabase(
            $configDatabase_ini["servername"],
            $configDatabase_ini["username"],
            $configDatabase_ini["password"],
            $configDatabase_ini["dbname"]);
             #echo 'estas conectado';
     }
 

     private function getPrinter() {
         return new Printer();
     }
     private  function getConfiguration(){
         return parse_ini_file("../configuration/conexiondatabase.ini");
     }
}





?>
