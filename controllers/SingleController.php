<?php

namespace Controllers;

use Models\PostManager;
use Models\CommentManager;

class SingleController {
    function getPost(){
        $postManager = new PostManager();
        $commentManager = new CommentManager();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require 'view/front/single.php';
    }

    function addComment($postId, $author, $comment){
        $commentManager = new CommentManager();

        $newComment = $commentManager->postComment($postId, $author, $comment);

        if($newComment === false){
            throw new \Exception("Impossible d'ajouter le commentaire");
        } else {
            header('Location: index.php?action=post&id='.$postId);
        }
    }
}