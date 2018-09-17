<?php

namespace Models;

class EpisodeModel extends Manager {

    public function createEpisode($title, $content, $bookId){
        $db = $this->dbConnection();
        $req = $db->prepare('INSERT INTO episodes (title, content, book_id, creation_date) VALUES (?, ?, ?, NOW())');
        $req->execute(array($title, $content, $bookId));
        return $req;
    }

    public function getEpisodes($bookId){
        $db = $this->dbConnection();
        $req = $db->prepare('SELECT * FROM episodes WHERE book_id=? ORDER BY creation_date DESC');
        $req->execute(array($bookId));
        return $req;
    }

    public function getEpisode($bookId, $episodeId){
        $db = $this->dbConnection();
        $req = $db->prepare('SELECT * FROM episodes WHERE book_id=? AND id=?');
        $req->execute(array($bookId, $episodeId));
        $episode = $req->fetch();
        return $episode;
    }

    public function removeEpisode($episodeId){
        $db = $this->dbConnection();
        $req = $db->prepare('DELETE FROM episodes WHERE id=?');
        $req->execute(array($episodeId));
        return $req;
    }

    public function updateEpisode($episodeId, $title, $content, $book_id){
        $db = $this->dbConnection();
        $req = $db->prepare('UPDATE episodes SET title=?, content=?, book_id=? WHERE id=?');
        $req->execute(array($title, $content, $book_id, $episodeId));
        return $req;
    }

}