<?php

namespace Models;

class CommentModel extends Manager {

    public function postComment($episodeId, $author, $comment){
        $db = $this->dbConnection();
        $req = $db->prepare('INSERT INTO comments (episode_id, author, comment, comment_date, reported) VALUES (?, ?, ?, NOW(), 0)');
        $newComment = $req->execute(array($episodeId, $author, $comment));
        return $newComment;
    }

    public function getAllComments(){
        $db = $this->dbConnection();
        $comments = $db->query('SELECT * FROM comments');
        return $comments;
    }

    public function getComments($episodeId){
        $db = $this->dbConnection();
        $comments = $db->prepare('SELECT * FROM comments WHERE episode_id=?');
        $comments->execute(array($episodeId));
        return $comments;
    }

    public function removeComment($commentId){
        $db = $this->dbConnection();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        return $req;
    }

    public function reportComment($reported, $commentId){
        $db = $this->dbConnection();
        $req = $db->prepare('UPDATE comments SET reported=? where id=? ');
        $req->execute(array($reported, $commentId));
        return $req;
    }

}