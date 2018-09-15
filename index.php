<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Controllers\HomeController;

define('DS', DIRECTORY_SEPARATOR); // meilleur portabilité sur les différents systeme.
define('ROOT', dirname(__FILE__).DS);


require_once 'core/Autoloader.php';
Autoloader::register();

$controller = new HomeController();
$controller->getAll();