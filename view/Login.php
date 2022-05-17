<?php
include_once("../helper/ConfigurationLogin.php");
$valid = new ConfigurationLogin;


$controller = $valid->getLoginController();

$controller->validate();


?>