<?php

use Core\Autoloader;
use Core\Router;


error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__).DS);


require_once 'core/Autoloader.php';
Autoloader::register();

new Router();


