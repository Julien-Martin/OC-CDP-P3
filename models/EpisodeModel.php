<?php

namespace Models;

class EpisodeModel extends Manager {

    public function createEpisode($episodeId, $title, $content, $bookId){
        $db = $this->dbConnection();
        $req = $db->prepare('INSERT INTO episodes (episode_id, title, content, book_id, creation_date) VALUES (?, ?, ?, ?, NOW())');
        $req->execute(array($episodeId, $title, $content, $bookId));
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
        $req = $db->prepare('SELECT * FROM episodes WHERE book_id=? AND episode_id=?');
        $req->execute(array($bookId, $episodeId));
        $episode = $req->fetch();
        return $episode;
    }

    public function removeEpisode($episodeId){
        $db = $this->dbConnection();
        $req = $db->prepare('DELETE FROM episodes WHERE episode_id=?');
        $req->execute(array($episodeId));
        return $req;
    }

    public function updateEpisode($episodeId, $title, $content, $book_id){
        $db = $this->dbConnection();
        $req = $db->prepare('UPDATE episodes SET title=?, content=?, book_id=? WHERE episode_id=?');
        $req->execute(array($title, $content, $book_id, $episodeId));
        return $req;
    }
}