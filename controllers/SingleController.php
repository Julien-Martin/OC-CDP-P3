<?php

namespace Controllers;

use Models\PostModel;
use Models\CommentModel;

class SingleController {
    function getPost(){
        $postManager = new PostModel();
        $commentManager = new CommentModel();

        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        require 'view/front/single.php';
    }

    function addComment($postId, $author, $comment){
        $commentManager = new CommentModel();

        $newComment = $commentManager->postComment($postId, $author, $comment);

        if($newComment === false){
            throw new \Exception("Impossible d'ajouter le commentaire");
        } else {
            header('Location: index.php?action=post&id='.$postId);
        }
    }
}