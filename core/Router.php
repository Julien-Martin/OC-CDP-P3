<?php

namespace Core;

/**
 * Class Router
 * @package Core
 */
class Router {

    private $routes = [];
    private $url;
    private $namedRoutes = [];

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url) {
        $this->url = $url;
    }

    /**
     * Get route with Method GET
     * @param $path
     * @param $callable
     * @param null $name
     * @return Route
     */
    public function get($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'GET');
    }

    /**
     * Get route with Method POST
     * @param $path
     * @param $callable
     * @param null $name
     * @return Route
     */
    public function post($path, $callable, $name = null){
        return $this->add($path, $callable, $name, 'POST');
    }

    /**
     * Add route in know route
     * @param $path
     * @param $callable
     * @param $name
     * @param $method
     * @return Route
     */
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

    /**
     * Run the routing system
     * @return mixed
     * @throws \ExceptionHandler
     */
    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new \ExceptionHandler('REQUEST_METHOD does not exist');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }
        return false;
    }
}