<?php

use Core\Autoloader;
use Core\Router;

// Print all error
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Load and initialize autoloader
require_once 'core/Autoloader.php';
Autoloader::register();


$router = new Router($_GET['url']);

/**
 * FRONT ROUTING
 */

//GET METHOD
$router->get('/', 'Home#getPosts');
$router->get('/episode/:id', 'Single#getPost');
$router->get('/episode/reportComment/:episodeId/:commentId', 'Single#reportComment');

//POST METHOD
$router->post('/episode/:episodeId/addcomment', 'Single#addComment');

/**
 * LOGIN AND LOGOUT ROUTES
 */
$router->get('/login', 'User#loginPage');
$router->get('/logout', 'User#logout');
$router->post('/login', 'User#validateLogin');
$router->get('/error/:errorMsg', function($errorMsg){
    require 'views/front/error.php';
});

/**
 * BACK ROUTING
 */

session_start();
if(isset($_SESSION['login'])){
    //GET METHOD
    $router->get('/admin', 'Admin#home');

    $router->get('/admin/posts/newPost', 'Admin#newPost');
    $router->get('/admin/posts', 'Admin#getPosts');
    $router->get('/admin/posts/:id', 'Admin#getPost');

    //POST METHOD
    $router->post('/admin/posts/createPost', 'Admin#createPost');
    $router->post('/admin/posts/:id/editPost', 'Admin#editPost');
    $router->post('/admin/posts/:id/removePost', 'Admin#removePost');

    $router->get('/admin/comments', 'Admin#getComments');
    $router->post('/admin/comments/:comment_id/unreported', 'Admin#unreportComment');
    $router->post('/admin/comments/:comment_id', 'Admin#removeComment');

    $router->get('/admin/users', 'Admin#getUsers');
    $router->post('/admin/users/createUser', 'Admin#createUser');
    $router->post('/admin/users/:id', 'Admin#removeUser');
}


//Start the routing
try {
    $router->run();
} catch (Exception $e){
    if($e->getMessage() == "e404"){
        header('Location: /error/'.$e->getMessage());
    }
}