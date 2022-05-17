<?php
include_once ("./helper/Configuration.php");
$configuration = new Configuration();
if(isset($_GET['page'])){
    $page = $_GET["page"]; 
}else{  
$page = 'index';
}

if($page == "login"){
    $controller = $configuration->getLoginViewController();
} else if($page == "registro"){
    $controller = $configuration->getRegistroViewController();
}else{
    $controller = $configuration->getPrincipalController();
}

$controller->execute();


?>

