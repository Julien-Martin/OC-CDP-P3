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
$router->addGetRoute('/', 'Home#getPosts');
$router->addGetRoute('/a-propos', 'Home#about');
$router->addGetRoute('/episode/:id', 'Single#getPost');
$router->addGetRoute('/episode/reportComment/:episodeId/:commentId', 'Single#reportComment');

//POST METHOD
$router->addPostRoute('/episode/:episodeId/addcomment', 'Single#addComment');

/**
 * LOGIN AND LOGOUT ROUTES
 */
$router->addGetRoute('/login', 'User#loginPage');
$router->addGetRoute('/logout', 'User#logout');
$router->addPostRoute('/login', 'User#validateLogin');

/**
 * BACK ROUTING
 */
session_start();
if(isset($_SESSION['login'])){
    //GET METHOD
    $router->addGetRoute('/admin', 'Admin#home');

    $router->addGetRoute('/admin/about', 'Admin#about');
    $router->addGetRoute('/admin/posts/newPost', 'Admin#newPost');
    $router->addGetRoute('/admin/posts', 'Admin#getPosts');
    $router->addGetRoute('/admin/posts/:id', 'Admin#getPost');

    //POST METHOD
    $router->addPostRoute('/admin/about', 'Admin#editAbout');

    $router->addPostRoute('/admin/posts/createPost', 'Admin#createPost');
    $router->addPostRoute('/admin/posts/:id/editPost', 'Admin#editPost');
    $router->addPostRoute('/admin/posts/:id/removePost', 'Admin#removePost');

    $router->addGetRoute('/admin/comments', 'Admin#getComments');
    $router->addPostRoute('/admin/comments/:comment_id/unreported', 'Admin#unreportComment');
    $router->addPostRoute('/admin/comments/:comment_id', 'Admin#removeComment');

    $router->addGetRoute('/admin/users', 'Admin#getUsers');
    $router->addPostRoute('/admin/users/createUser', 'Admin#createUser');
    $router->addPostRoute('/admin/users/:id', 'Admin#removeUser');
}

$router->addGetRoute('/error/:errorMsg', function($errorMsg){
    require 'views/front/error.php';
});

//Start the routing
try {
    $router->run();
} catch (Exception $e){
    if($e->getMessage() == "e404"){
        header('Location: /error/'.$e->getMessage());
    }
}