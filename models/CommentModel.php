<?php

namespace Models;

/**
 * Class CommentModel
 * @package Models
 */
class CommentModel extends Manager {

    private $db;

    /**
     * CommentModel constructor.
     */
    public function __construct(){
        $this->db = $this->dbConnection();
    }


    /** Create a new comment in database
     * @param $episodeId
     * @param $author
     * @param $comment
     * @return bool
     */
    public function postComment($episodeId, $author, $comment){
        $req = $this->db->prepare('INSERT INTO comments (episode_id, author, comment, comment_date, reported) VALUES (?, ?, ?, NOW(), 0)');
        $newComment = $req->execute(array($episodeId, $author, $comment));
        return $newComment;
    }

    /**
     * Get All comments from database
     * @return bool|\PDOStatement
     */
    public function getAllComments(){
        $comments = $this->db->query('SELECT * FROM comments');
        return $comments;
    }

    /**
     * Get one comment with id  from database
     * @param $episodeId
     * @return bool|\PDOStatement
     */
    public function getComments($episodeId){
        $comments = $this->db->prepare('SELECT * FROM comments WHERE episode_id=?');
        $comments->execute(array($episodeId));
        return $comments;
    }

    /**
     * Delete comment from database
     * @param $commentId
     * @return bool|\PDOStatement
     */
    public function removeComment($commentId){
        $req = $this->db->prepare('DELETE FROM comments WHERE id = ?');
        $req->execute(array($commentId));
        return $req;
    }

    /**
     * Change if a comment is reported or not
     * @param $reported
     * @param $commentId
     * @return bool|\PDOStatement
     */
    public function reportComment($reported, $commentId){
        $req = $this->db->prepare('UPDATE comments SET reported=? where id=? ');
        $req->execute(array($reported, $commentId));
        return $req;
    }

    public function countReported(){
        $req = $this->db->query('SELECT COUNT(id) as reportedNumber FROM comments WHERE reported=1');
        return $req;
    }

}