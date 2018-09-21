<?php

namespace Models;

/**
 * Class PostModel
 * @package Models
 */
class PostModel extends Manager {

    private $db;

    /**
     * PostModel constructor.
     */
    public function __construct(){
        $this->db = $this->dbConnection();
    }

    /**
     * Create a new post in database
     * @param $title
     * @param $content
     * @return bool|\PDOStatement
     */
    public function createPost($title, $content){
        $req = $this->db->prepare('INSERT INTO posts (title, content, creation_date) VALUES (?, ?, NOW())');
        $req->execute(array($title, $content));
        return $req;
    }

    /**
     * Get all posts from database
     * @return bool|\PDOStatement
     */
    public function getPosts(){
        $req = $this->db->query('SELECT * FROM posts ORDER BY id ASC');
        return $req;
    }

    /**
     * Get one post by id from database
     * @param $id
     * @return mixed
     */
    public function getPost($id){
        $req = $this->db->prepare('SELECT * FROM posts WHERE id=?');
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }

    /**
     * Delete one post from database
     * @param $id
     * @return bool|\PDOStatement
     */
    public function removePost($id){
        $req = $this->db->prepare('DELETE FROM posts WHERE id=?');
        $req->execute(array($id));
        return $req;
    }

    /**
     * Update one post from database
     * @param $id
     * @param $title
     * @param $content
     * @return bool|\PDOStatement
     */
    public function updatePost($id, $title, $content){
        $req = $this->db->prepare('UPDATE posts SET title=?, content=? WHERE id=?');
        $req->execute(array($title, $content, $id));
        return $req;
    }
}