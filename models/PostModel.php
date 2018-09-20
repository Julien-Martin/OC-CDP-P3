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
        $req = $db->query('SELECT * FROM posts ORDER BY id ASC');
        return $req;
    }

    public function getPost($id){
        $db = $this->dbConnection();
        $req = $db->prepare('SELECT * FROM posts WHERE id=?');
        $req->execute(array($id));
        $post = $req->fetch();
        return $post;
    }

    public function removePost($id){
        $db = $this->dbConnection();
        $req = $db->prepare('DELETE FROM posts WHERE id=?');
        $req->execute(array($id));

        return $req;
    }

    public function updatePost($id, $title, $content){
        $db = $this->dbConnection();
        $req = $db->prepare('UPDATE posts SET title=?, content=? WHERE id=?');
        $req->execute(array($title, $content, $id));
        return $req;
    }
}