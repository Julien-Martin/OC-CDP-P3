<?php

use Core\Autoloader;
use Core\Router;
use Controllers\HomeController;
use Controllers\SingleController;
use Controllers\EpisodeController;


error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'core/Autoloader.php';
Autoloader::register();


$router = new Router($_GET['url']);

/**
 * FRONT ROUTING
 */
$router->get('/', 'Home#getBooks');
$router->get('/book/:bookId', 'Episode#getEpisodes');
$router->get('/book/:bookId/episode/:episodeId', 'Single#getEpisode');
$router->post('/book/:bookId/episode/:episodeId/addcomment', 'Single#addComment');

/**
 * BACK ROUTING
 */
$router->get('/admin', 'Admin#home');
$router->get('/admin/home', 'Admin#home');
$router->get('/admin/books', 'Admin#getBooks');
$router->get('/admin/comments', 'Admin#getComments');
$router->get('/admin/comments/:comment_id', 'Admin#removeComment');
$router->get('/admin/episodes/:bookId', 'Admin#getEpisodes');
$router->get('/admin/episodes/:bookId/newEpisode', 'Admin#newEpisode');
$router->get('/admin/episodes/:bookId/:episodeId', 'Admin#getEpisode');
$router->post('/admin/episodes/:bookId/postEpisode', 'Admin#postEpisode');
$router->post('/admin/episodes/:bookId/:episodeId/editEpisode', 'Admin#editEpisode');

$router->run();
