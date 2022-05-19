<?php
include_once('controller/LoginController.php');
include_once('controller/LoginViewController.php');
include_once('controller/LogueadoViewController.php');
include_once('model/LoginModel.php');
include_once('MySqlDatabase.php');
include_once('Printer.php');

class ConfigurationLogin
{
    private function getDatabase() {
        $configDatabase_ini = $this->getConfiguration();
        return new MySqlDatabase(
            $configDatabase_ini["servername"],
            $configDatabase_ini["username"],
            $configDatabase_ini["password"],
            $configDatabase_ini["dbname"]);
             
     }
  
    public function getLoginController()
    {
        return new LoginController (
           $_POST["name"],
           $_POST["pass"],
           $this->getLoginModel(),
           $this->getLogueadoViewController(),
           $this->getLoginViewController()
        );
    }

    public function getLoginModel()
    {
       return new LoginModel($this->getDatabase());
    }

    public function getLogueadoViewController() {
        return new LogueadoViewController($this->getPrinter());

    }

    public function getLoginViewController() {
        return new LoginViewController($this->getPrinter());

    }

    private function getPrinter() {
        return new Printer();
    }

    private  function getConfiguration(){
        return parse_ini_file("configuration/conexiondatabase.ini");
    }
}


?>