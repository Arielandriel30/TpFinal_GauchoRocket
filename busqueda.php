<?php
include_once("helper/ConfigurationBusqueda.php");
$valid = new ConfigurationBusqueda();


$controller = $valid->getBusquedaController();

$controller->validate();

