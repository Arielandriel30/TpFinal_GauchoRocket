<?php
include_once("../helper/ValidRegister.php");
$valid = new ValidRegister;


$controller = $valid->getRegisterController();

$controller->validate();


?>