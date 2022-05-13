<?php
include_once("../helper/Valid.php");
$valid = new Valid;


$controller = $valid->getLoginController();

$controller->validate();


?>