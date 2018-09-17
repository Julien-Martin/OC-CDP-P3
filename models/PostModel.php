<?php

namespace Models;

class PostModel extends Manager {

    public function createPost($title, $content){
        $db = $this->dbConnection();
        $req = $db->prepare('INSERT INTO posts (title, content, creation_date) VALUES (?, ?, NOW())');
        $req->execute(array($title, $content));
        return $req;
    }

    public function getPosts(){
        $db = $this->dbConnection();
        $req = $db->query('SELECT * FROM posts ORDER BY creation_date DESC');
        return $req;
    }

    public function getPost($postId){
        $db = $this->dbConnection();
        $req = $db->prepare('SELECT id, title, content, creation_date FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function removePost($postId){
        $db = $this->dbConnection();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($postId));
        return $req;
    }

    public function updatePost($postId, $title, $content){
        $db = $this->dbConnection();
        $req = $db->prepare('UPDATE posts SET title=?, content=? WHERE id=?');
        $req->execute(array($title, $content, $postId));
        return $req;
    }

}