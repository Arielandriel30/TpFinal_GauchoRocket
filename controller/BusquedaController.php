<?php

class BusquedaController
{
  
    private $printer;
    private $busquedaModel;

    public function __construct($busquedaModel,$printer) {
        $this->printer = $printer;
        $this->busquedaModel=$busquedaModel;
     
    }

    public function searchFlight()
    {
        $busquedaOrigen = $_POST["viajeOrigen"];
        $busquedaDestino = $_POST["viajeDestino"];

        $input_date=$_POST['dateViaje'];
//        var_dump($input_date);
        $date=date("Y-m-d",strtotime($input_date));
//        var_dump($date);
        $result  = $this->busquedaModel->getSpaceFlight($busquedaOrigen,$busquedaDestino,$date);
        /*var_dump($result);*/
        if (!$result){
                header("location:/");
        /*    $this->printer->generateView('Busqueda.html');*/
            exit();
        } else {
            $data=array("flight"=>$result);
            $this->printer->generateView('Busqueda.html',$data);
            //return $result;
        }

    }

    public function execute() {

            $this->printer->generateView('Busqueda.html');
    }

    public function getOrbitales()
    {


             $result  = $this->busquedaModel->getOrbitales();

             if (!$result){
                 header("location:/");
                 exit();
             } else {

              $data=array("Orbital"=>$result);
                 $this->printer->generateView('BusquedaOrbitales.html',$data);
             }

    }
    public function getSubOrbitales()
    {
             $result  = $this->busquedaModel-> getSubOrbitales();

             if (!$result){
                 header("location:/");
                 exit();
             } else {
                 date_default_timezone_set("America/Argentina/San_Luis");
                 $semana=["L" =>1 ,"M" => 2,"X" => 3,"J" => 4,"V" => 5,"S" =>6,"D" =>7];
                 $hoy = date("Y-m-d H:i:s", time());
                 $diaSemanal=date("N");
                 for ($i=0;$i<count($result);$i++)
                 {
                     if($diaSemanal==$semana[$result[$i]["day"]]){

                         $result[$i]+=array("fechaSalida"=>date("d-m-Y",strtotime($hoy."+ 7 days")));
                     }
                     elseif ($diaSemanal>$semana[$result[$i]["day"]]){
                         $diferencia=7-($diaSemanal-$semana[$result[$i]["day"]]);
                         $result[$i]+=array("fechaSalida"=>date("d-m-Y",strtotime($hoy."+  ".$diferencia." days")));
                     }
                     else{
                         $diferencia=$diaSemanal-$semana[$result[$i]["day"]];
                         $result[$i]+=array("fechaSalida"=>date("d-m-Y",strtotime($hoy."+  ".$diferencia." days")));
                       }

                 }
              /*  foreach ($result as $unico){
                    echo "<br>--------------------<br>";
                    var_dump($unico["day"]);
                    var_dump($unico);
                    var_dump($hoy);
                    var_dump( $diaSemanal);
                     var_dump($semana[$unico["day"]]);;
                     echo "<br>--------------------<br>";
                    if($diaSemanal==$semana[$unico["day"]]){
                       $fechaDeSalida+=array(count($fechaDeSalida)=>[$unico["code"]=>date("d-m-Y",strtotime($hoy."+ 7 days"))]);
                         echo date("d-m-Y",strtotime($hoy."+ 7 days"));
                        $unico["day"]=date("d-m-Y",strtotime($hoy."+ 7 days"));
                     }
                    elseif ($diaSemanal>$semana[$unico["day"]]){
                        $diferencia=7-($diaSemanal-$semana[$unico["day"]]);
                        echo date("d-m-Y",strtotime($hoy."+  ".$diferencia." days"));
                        $unico["day"]=date("d-m-Y",strtotime($hoy."+  ".$diferencia." days"));
                         $fechaDeSalida+=array(count($fechaDeSalida)=>[$unico["code"]=>date("d-m-Y",strtotime($hoy."+  ".$diferencia." days"))]);
                    }
                    else{
                        $diferencia=$diaSemanal-$semana[$unico["day"]];
                        echo date("d-m-Y",strtotime($hoy."+  ".$diferencia." days"));
                        $unico["day"]=date("d-m-Y",strtotime($hoy."+  ".$diferencia." days"));
                        $fechaDeSalida+=array(count($fechaDeSalida)=>[$unico["code"]=>date("d-m-Y",strtotime($hoy."+  ".$diferencia." days"))]);
                    }
                 }*/
//                 echo "<br>--------------------<br>";
//                 var_dump($result[0]);
//                 echo "<br>--------------------<br>";
//                 var_dump($result[1]);
                 $data=array("SubOrbital"=>$result);
                 $this->printer->generateView('BusquedaSubOrbitales.html',$data);
         }
    }

    public function getCircuitos()
    {
        $result  = $this->busquedaModel-> getCircuitos();

        if (!$result){
            header("location:/");
            exit();
        } else {
            $data=array("Orbital"=>$result);
            $this->printer->generateView('BusquedaOrbitales.html',$data);
        }
    }

    public function getTours()
    {

             $result  = $this->busquedaModel->getTours();
             if (!$result){
                 header("location:/");
                 exit();
             } else {
                 $data=array("Tours"=>$result);
                 $this->printer->generateView('BusquedaTours.html',$data);

         }

    }
}