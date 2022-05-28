<?php
include_once("MySqlDatabase.php");
include_once("Printer.php");
include_once("Router.php");
include_once("controller/LoginController.php");
include_once("controller/LogueadoController.php");
include_once("model/LoginModel.php");
include_once("controller/PrincipalController.php");
include_once("controller/RegisterController.php");
include_once("model/RegisterModel.php");
include_once("controller/BusquedaController.php");
include_once("model/BusquedaModel.php");


class Configuration
{
    public function getLoginController()
    {
        return new LoginController (
           $this->getLoginModel(),
           $this->getPrinter(),
           $this->getLogueadoController()
        );
    }

    public function getLoginModel()
    {
       return new LoginModel($this->getDatabase());
    }

    public function getLogueadoController() {
        return new LogueadoController($this->getPrinter());

    }

//////////////////////

    public function getPrincipalController() {
        return new PrincipalController($this->getPrinter());

    }
    ////////////////busqueda/////////
    public function getBusquedaController()
    {
        return new BusquedaController(
            
            $this->getBusquedaModel(),
            $this->getPrinter()
        );
    }

    public function getBusquedaModel()
    {
        $Model = new BusquedaModel($this->getDatabase());
        return $Model;
    }
///////////////////registro//////
public function getRegisterController()
{
    return new RegisterController (

       $this->getPrinter(),
       $this->getRegisterModel(),
       $this->getLogueadoController()
    );
}

public function getRegisterModel()
{
   return new RegisterModel($this->getDatabase());
}



///////////////////////conexion//////////
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
         return parse_ini_file("configuration/conexiondatabase.ini");
     }

////////Router//////
public function getRouter()
{
    return new Router($this, "getPrincipalController", "execute");
}


}
?>
