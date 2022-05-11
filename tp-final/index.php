<?php
include_once ("helper/Configuration.php");
$configuration = new Configuration();
if(isset($_GET['page'])){
    $page = $_GET["page"]; 
}else{  
$page = 'index';
}

if($page == "ingreso"){
    $controller = $configuration->getLoginController();
} else{
    $controller = $configuration->getPrincipalController();
}

$controller->execute();


?>

