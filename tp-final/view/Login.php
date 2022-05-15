<?php
include_once("../helper/ValidLogin.php");
$valid = new ValidLogin;


$controller = $valid->getLoginController();

$controller->validate();


?>