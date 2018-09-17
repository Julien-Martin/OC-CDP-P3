<?php

namespace Models;

class CommentModel extends Manager {

    public function postComment($episodeId, $author, $comment){
        $db = $this->dbConnection();
        $req = $db->prepare('INSERT INTO comments (episode_id, author, comment, comment_date) VALUES (?, ?, ?, NOW())');
        $newComment = $req->execute(array($episodeId, $author, $comment));
        return $newComment;
    }

    public function getComments($episodeId){
        $db = $this->dbConnection();
        $comments = $db->prepare('SELECT id, author, comment, comment_date FROM comments WHERE episode_id=?');
        $comments->execute(array($episodeId));
        return $comments;
    }

    public function removeComment($commentId){
        $db = $this->dbConnection();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        return $req;
    }

}