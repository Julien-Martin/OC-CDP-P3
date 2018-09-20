<?php

namespace Controllers;

use Models\PostModel;
use Models\CommentModel;

class SingleController {

    public $postManager;
    public $episodeManager;
    public $commentManager;

    function getPost($id){
        $this->postManager = new PostModel();
        $this->commentManager = new CommentModel();
        $posts = $this->postManager->getPosts()->fetchAll();
        $post = $this->postManager->getPost($id);
        $comments = $this->commentManager->getComments($id);
        $total = count($this->postManager->getPosts()->fetchAll());
        $key = array_search($post['id'], array_column($posts, 'id'));
        require 'views/front/single.php';
    }

    function addComment($id){
        $this->commentManager = new CommentModel();
        $newComment = $this->commentManager->postComment($id, $_POST['author'], $_POST['comment']);
        if($newComment === false){
            throw new \Exception("Impossible d'ajouter le commentaire");
        } else {
            header('Location: /episode/'.$id);
        }
    }
}