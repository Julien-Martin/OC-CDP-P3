<?php

namespace Controllers;

use Models\PostModel;
use Models\EpisodeModel;
use Models\CommentModel;

class SingleController {

    public $postManager;
    public $episodeManager;
    public $commentManager;

    function getEpisode(){
        $this->episodeManager = new EpisodeModel();
        $this->commentManager = new CommentModel();

        $episode = $this->episodeManager->getEpisode($_GET['bookId'], $_GET['episodeId']);
        $comments = $this->commentManager->getComments($_GET['episodeId']);
        $total = count($this->episodeManager->getEpisodes($_GET['bookId'])->fetchAll());
        require 'views/front/single.php';
    }

    function addComment($postId, $author, $comment){
        $this->commentManager = new CommentModel();
        $newComment = $this->commentManager->postComment($postId, $author, $comment);
        var_dump($newComment);
        if($newComment === false){
            throw new \Exception("Impossible d'ajouter le commentaire");
        } else {
            header('Location: index.php?action=post&id='.$postId);
        }
    }
}