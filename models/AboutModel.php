<?php

namespace Models;

/**
 * Class AboutModel
 * @package Models
 */
class AboutModel extends Manager {

    private $db;

    /**
     * PostModel constructor.
     */
    public function __construct(){
        $this->db = $this->dbConnection();
    }

    /**
     * Get all about section from database
     * @return bool|\PDOStatement
     */
    public function getContent(){
        $req = $this->db->query('SELECT * FROM about ORDER BY id ASC');
        return $req;
    }

    /**
     * Update about page from database
     * @param $id
     * @param $title
     * @param $content
     * @return bool|\PDOStatement
     */
    public function updatePost($id, $content){
        $req = $this->db->prepare('UPDATE about SET content=? WHERE id=?');
        $req->execute(array($content, $id));
        return $req;
    }
}