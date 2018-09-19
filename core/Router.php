<?php

namespace Core;

use Controllers\HomeController;
use Controllers\SingleController;
use Controllers\PostController;

class Router {

    private $routes = [];
    private $url;
    private $namedRoutes = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    /*public function __construct()
    {
        $homeController = new HomeController();
        $singleController = new SingleController();
        $episodeController = new PostController();
        try {
            if(isset($_GET['action'])){
                if($_GET['action'] == 'books'){
                    $homeController->getBooks();
                } elseif ($_GET['action'] == 'book'){
                    if(isset($_GET['bookId']) && $_GET['bookId'] > 0){
                        $episodeController->getAll();
                    } else {
                        throw new \Exception('Aucun identifiant de livre envoyé');
                    }
                } elseif($_GET['action'] == 'episode'){
                    if(isset($_GET['bookId']) && $_GET['bookId'] > 0){
                        if(isset($_GET['episodeId']) && $_GET['episodeId'] > 0){
                            $singleController->getEpisode();
                        } else {
                            throw new \Exception('Aucun identifiant de chapitre envoyé');
                        }
                    } else {
                        throw new \Exception('Aucun identifiant de livre envoyé');
                    }

                } elseif($_GET['action'] == 'post'){
                    if(isset($_GET['id']) && $_GET['id'] > 0){
                        $singleController->getPost();
                    } else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }
                } elseif($_GET['action'] == 'addComment'){
                    if(isset($_GET['id']) && $_GET['id'] > 0){
                        if(!empty($_POST['author']) && !empty($_POST['comment'])){
                            $singleController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        } else {
                            throw new \Exception('Tous les champs ne sont pas remplis');
                        }
                    } else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }
                }
            } else {
                $homeController->getBooks();
            }
        } catch (\Exception $exception){
            $errorMessage = $exception->getMessage();
            require 'views/front/error.php';
        }
    }*/

    public function get($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'POST');
    }

    public function add($path, $callable, $name, $method){
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if(is_string($callable) && $name === null){
            $name = $callable;
        }
        if($name){
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new \ExceptionHandler('REQUEST_METHOD does not exist');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
    }

    public function url($name, $params = []){
        if(!isset($this->namedRoutes[$name])){
            throw new \ExceptionHandler('No route matches this name');
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }

}