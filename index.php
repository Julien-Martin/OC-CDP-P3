<?php

use Core\Autoloader;
use Core\Router;
use Controllers\HomeController;
use Controllers\SingleController;
use Controllers\EpisodeController;


error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__).DS);


require_once 'core/Autoloader.php';
Autoloader::register();


$router = new Router($_GET['url']);
$router->get('/', 'Home#getBooks');
$router->get('/book/:bookId', 'Episode#getEpisodes');
$router->get('/book/:bookId/episode/:episodeId', 'Single#getEpisode');
//$router->post('/book/:title', function($title){});
$router->post('/book/:bookId/episode/:episodeId/addcomment', 'Single#addComment');
$router->run();