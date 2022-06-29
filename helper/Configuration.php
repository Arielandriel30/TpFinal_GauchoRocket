<?php
include_once("MySqlDatabase.php");
include_once("Printer.php");
include_once("Router.php");
include_once("Session.php");
include_once ("Qr.php");
require_once("MustachePrinter.php");
include_once("controller/LoginController.php");
include_once("controller/LogueadoController.php");
include_once("model/LoginModel.php");
include_once("controller/PrincipalController.php");
include_once("controller/RegisterController.php");
include_once("controller/CompraController.php");
include_once("model/RegisterModel.php");
include_once("model/CompraModel.php");
include_once("controller/BusquedaController.php");
include_once("model/BusquedaModel.php");
include_once ("controller/ReservarController.php");
include_once ("model/ReservarModel.php");
include_once ("controller/TurnoController.php");
include_once ("model/TurnoModel.php");
require_once('third-party/mustache/src/Mustache/Autoloader.php');
include_once ("qr/phpqrcode/qrlib.php");
include_once("ConversorMoneda.php");


class Configuration
{
    public function getLoginController()
    {
        return new LoginController (
           $this->getLoginModel(),
           $this->getPrinter(),
           $this->getLogueadoController(),
           $this->getSession()
        );
    }

    public function getLoginModel()
    {
       return new LoginModel($this->getDatabase());
    }

    public function getLogueadoController() {
        return new LogueadoController($this->getPrinter(),
                                      $this->getSession());

    }


    ////////////////Principal/index/////////
    public function getPrincipalController() {
        return new PrincipalController($this->getPrinter(),
                                       $this->getSession());

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
       $this->getLogueadoController(),
       $this->getSession()
    );
}

public function getRegisterModel()
{
   return new RegisterModel($this->getDatabase());
}


////////////////Principal/index/////////
    public function getReservarController() {
        return new ReservarController($this->getPrinter(),
                                        $this->getReservarModel(),
                                        $this->getBusquedaModel(),
                                        $this->getSession());
    }

    private function getReservarModel()
    {
        return new ReservarModel($this->getDatabase());
    }
////////////////Compra/////////
    public function getCompraController() {
        return new CompraController($this->getPrinter(),
            $this->getCompraModel(),$this->getQr(),
            $this->getSession(),$this->getConversorMoneda());
    }

    private function getCompraModel()
    {
        return new CompraModel($this->getDatabase());
    }

    ////////////////Turno/////////
    public function getTurnoController() {
        return new TurnoController($this->getPrinter(),
                                    $this->getTurnoModel(),
                                    $this->getSession());
    }

    private function getTurnoModel()
    {
        return new TurnoModel($this->getDatabase());
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

     private  function getConfiguration(){
         return parse_ini_file("configuration/conexiondatabase.ini");
     }
////////qr//////
    public function getQr()
    {
        return new Qr();
    }
////////Router//////
public function getRouter()
{
    return new Router($this, "getPrincipalController", "execute");
}
///////////mustache//////
private function getPrinter() {
    return new MustachePrinter("view");
}
///////////Session//////
public function getSession() {
    return new Session();
}
///////////Conversor de moneda//////
    public function getConversorMoneda() {
        return new ConversorMoneda();
    }

}
?>
