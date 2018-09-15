<?php

namespace Models;

class Post extends Manager {

    public function getPosts(){
        $db = $this->dbConnection();
        $req = $db->query('SELECT id, title, content, creation_date FROM posts ORDER BY creation_date DESC');
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
    }

    public function updatePost($postId, $title, $content){
        $db = $this->dbConnection();
        $req = $db->prepare('UPDATE posts SET title=:title, content=:content WHERE id=:id');
        $req->execute(array("title" => $title, "content" => $content, "id" => $postId));
    }

}