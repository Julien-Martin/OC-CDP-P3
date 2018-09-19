<?php

namespace Models;

class Manager {

    private $_host = 'localhost';
    private $_dbname = 'p3';
    private $_username = 'root';
    private $_password = '';

    protected function dbConnection(){
        $db = new \PDO('mysql:host='.$this->_host.';dbname='.$this->_dbname.';charset=utf8', $this->_username, $this->_password);
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
        return $db;
    }

}