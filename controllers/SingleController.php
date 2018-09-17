<?php

namespace Controllers;

use Models\PostModel;
use Models\CommentModel;

class SingleController {

    public $postManager;
    public $commentManager;

    function getPost(){
        $this->postManager = new PostModel();
        $this->commentManager = new CommentModel();

        $post = $this->postManager->getPost($_GET['id']);
        $comments = $this->commentManager->getComments($_GET['id']);
        $total = count($this->postManager->getPosts()->fetchAll());

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