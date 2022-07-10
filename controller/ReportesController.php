<?php

class ReportesController
{
    private $printer;
    private $ReportesModel;
    private $session;

    public function __construct($printer, $ReportesModel, $session){
        $this->printer = $printer;
        $this->ReportesModel = $ReportesModel;
        $this->session = $session;
    }

    public function execute(){
        if ($this->session->sessionShow('usuario') == null) {
           
            header("location:/");
        }
        if($this->session->sessionShow('usuario') != null){
        $usuarios = $this->ReportesModel->getContadorDatos('idUsuarios', 'usuario', 'cantidad');
        $total = $this->ReportesModel->getAnual();
        
        $data = array("usuarios"=>$usuarios, "total"=>$total);
  
        $this->printer->generateView('Admin.html', $data);
    }
  } 

 public function getCentros()
 {
    $centros = $this->ReportesModel->getCentros();
    echo json_encode($centros);
    die();
    
 }

 public function getCabinas()
 {
    $cabinas = $this->ReportesModel->getCabinas();
    echo json_encode($cabinas);
    die();
    
 }

 public function getVentas()
 {
    $ventas = $this->ReportesModel->getVentas();
    echo json_encode($ventas);
    
    die();
    
 }
}