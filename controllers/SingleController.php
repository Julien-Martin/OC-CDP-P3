<?php

namespace Controllers;

use Models\PostModel;
use Models\EpisodeModel;
use Models\CommentModel;

class SingleController {

    public $postManager;
    public $episodeManager;
    public $commentManager;

    function getEpisode($bookId, $episodeId){
        $this->episodeManager = new EpisodeModel();
        $this->commentManager = new CommentModel();

        $episode = $this->episodeManager->getEpisode($bookId, $episodeId);
        $comments = $this->commentManager->getComments($episodeId);
        $total = count($this->episodeManager->getEpisodes($bookId)->fetchAll());
        require 'views/front/single.php';
    }

    function addComment($bookId, $episodeId){
        $this->commentManager = new CommentModel();
        var_dump($_POST['author']);
        $newComment = $this->commentManager->postComment($episodeId, $_POST['author'], $_POST['comment']);
        if($newComment === false){
            throw new \Exception("Impossible d'ajouter le commentaire");
        } else {
            header('Location: /book/'.$bookId.'/episode/'.$episodeId);
        }
    }
}