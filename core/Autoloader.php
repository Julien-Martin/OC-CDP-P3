<?php

class Autoloader{

    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class){
        $nameSpace = explode('\\', $class);
        $nameSpace[0] = strtolower($nameSpace[0]);
        $i = count($nameSpace) - 1;
        $nameSpace[$i] = ucfirst($nameSpace[$i]);
        $class = implode('/', $nameSpace);
        require $class.'.php';
    }

}