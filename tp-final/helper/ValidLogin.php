<?php
include_once('../controller/LoginController.php');
include_once('../model/LoginModel.php');
include_once('MySqlDatabase.php');

class ValidLogin
{
    private function getDatabase() {
        return new MySqlDatabase(
             'localhost',
             'root',
             'Ariel3009',
             'gauchorocket');
             
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
}


?>