<?php
include_once('../controller/RegisterController.php');
include_once('../model/RegisterModel.php');
include_once('MySqlDatabase.php');

class ConfigurationRegister
{
    private function getDatabase() {
        return new MySqlDatabase(
             'localhost',
             'root',
             'Ariel3009',
             'gauchorocket');
             
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
}


?>