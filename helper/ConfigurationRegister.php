<?php
include_once('../controller/RegisterController.php');
include_once('../model/RegisterModel.php');
include_once('MySqlDatabase.php');

class ConfigurationRegister
{
    private function getDatabase() {
        $configDatabase_ini = $this->getConfiguration();
        return new MySqlDatabase(
            $configDatabase_ini["servername"],
            $configDatabase_ini["username"],
            $configDatabase_ini["password"],
            $configDatabase_ini["dbname"]);
             
     }
    //////////////////ver donde se pone////////
    public function getRegisterController()
    {
        return new RegisterController (
           $_POST["name"],
           $_POST["pass"],
           $_POST["type"],
           $this->getRegisterModel()
        );
    }

    public function getRegisterModel()
    {
       return new RegisterModel($this->getDatabase());
    }
//////////////////////////
///
    private  function getConfiguration(){
        return parse_ini_file("../configuration/conexiondatabase.ini");
    }
}


?>