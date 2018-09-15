<?php

namespace Models;

class Manager {

    private $_host = 'localhost';
    private $_dbname = 'p3';
    private $_username = 'root';
    private $_password = 'root';

    protected function dbConnection(){
        try {
            $db = new \PDO('mysql:host='.$this->_host.';dbname='.$this->_dbname.';charset=utf8', $this->_username, $this->_password);
            return $db;
        } catch (\Exception $e){
            echo 'Database error : '.$e->getMessage();
        }
    }

}