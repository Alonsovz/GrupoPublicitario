<?php 

//error_reporting(0);
require_once 'dAutoload.php';

$exec = new Exec();

$controller = $exec->getController();
$method = $exec->getMethod();

$exec->callMethod($controller, $method);