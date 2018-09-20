<?php

use Core\Autoloader;
use Core\Router;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'core/Autoloader.php';
Autoloader::register();


$router = new Router($_GET['url']);

/**
 * FRONT ROUTING
 */
$router->get('/', 'Home#getPosts');
$router->get('/login', 'User#loginPage');
$router->post('/login', 'User#validateLogin');
$router->get('/episode/:id', 'Single#getPost');
$router->post('/episode/:episodeId/addcomment', 'Single#addComment');

/**
 * BACK ROUTING
 */
$router->get('/admin', 'Admin#home');
$router->get('/logout', 'User#logout');

$router->get('/admin/users', 'Admin#getUsers');
$router->post('/admin/users/createUser', 'Admin#createUser');
$router->get('/admin/users/:id', 'Admin#removeUser');
$router->get('/admin/comments', 'Admin#getComments');
$router->get('/admin/comments/:comment_id', 'Admin#removeComment');

$router->get('/admin/posts', 'Admin#getPosts');
$router->get('/admin/posts/:id/removePost', 'Admin#removePost');
$router->get('/admin/posts/newPost', 'Admin#newPost');
$router->get('/admin/posts/:id', 'Admin#getPost');
$router->post('/admin/posts/createPost', 'Admin#createPost');
$router->post('/admin/posts/:id/editPost', 'Admin#editPost');
$router->run();
