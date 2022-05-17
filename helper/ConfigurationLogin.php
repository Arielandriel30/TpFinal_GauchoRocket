<?php
include_once('../controller/LoginController.php');
include_once('../model/LoginModel.php');
include_once('MySqlDatabase.php');

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
    //////////////////ver donde se pone////////
    public function getLoginController()
    {
        return new LoginController (
           $_POST["name"],
           $_POST["pass"],
           $this->getLoginModel()
        );
    }

    public function getLoginModel()
    {
       return new LoginModel($this->getDatabase());
    }

//////////////////////////
///

    private  function getConfiguration(){
        return parse_ini_file("../configuration/conexiondatabase.ini");
    }
}


?>