<?php

namespace Models;

class Comment extends Manager {

    public function postComment($postId, $author, $comment){
        $db = $this->dbConnection();
        $req = $db->prepare('INSERT INTO comments (post_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
        $newComments = $req->execute(array($postId, $author, $comment));
        return $newComments;
    }

    public function getComments($postId){
        $db = $this->dbConnection();
        $comments = $db->prepare('SELECT id, author, comment, comment_date FROM comments WHERE post_id=?');
        $comments->execute(array($postId));
        return $comments;
    }

    public function removeComment($commentId){
        $db = $this->dbConnection();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        return $req;
    }

}