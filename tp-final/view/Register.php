<?php
include_once("../helper/ConfigurationRegister.php");
$valid = new ConfigurationRegister;


$controller = $valid->getRegisterController();

$controller->validate();


?>