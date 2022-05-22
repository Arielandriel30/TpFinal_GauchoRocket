<?php
include_once('./controller/BusquedaController.php');
include_once('./model/BusquedaModel.php');
include_once('MySqlDatabase.php');

class ConfigurationBusqueda
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
    public function getBusquedaController()
    {
        return new BusquedaController(
            $_POST["viaje"],
            $this->getBusquedaModel()
        );
    }

    public function getBusquedaModel()
    {
        return new BusquedaModel($this->getDatabase());
    }

//////////////////////////
///

    private  function getConfiguration(){
        return parse_ini_file("./configuration/conexiondatabase.ini");
    }
}