<?php

namespace Core;

/**
 * Class Autoloader
 * @package Core
 */
class Autoloader{


    /**
     * Use php autload system
     */
    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Get class with namesplaces
     * @param $class
     */
    public static function autoload($class){
        $nameSpace = explode('\\', $class);
        $nameSpace[0] = strtolower($nameSpace[0]);
        $i = count($nameSpace) - 1;
        $nameSpace[$i] = ucfirst($nameSpace[$i]);
        $class = implode('/', $nameSpace);
        require $class.'.php';
    }

}