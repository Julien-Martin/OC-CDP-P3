<?php

namespace Controllers;

use Models\PostModel;
use Models\CommentModel;

/**
 * Class SingleController
 * @package Controllers
 */
class SingleController {

    private $postManager;
    private $commentManager;

    /**
     * SingleController constructor.
     */
    public function __construct(){
        $this->postManager = new PostModel();
        $this->commentManager = new CommentModel();
    }

    /**
     * Get return data from data to get one post and passing data to view
     * @param $id
     */
    function getPost($id){
        $posts = $this->postManager->getPosts()->fetchAll();
        $post = $this->postManager->getPost($id);
        $comments = $this->commentManager->getComments($id)->fetchAll();
        $commentsNumber = count($comments);
        $total = count($this->postManager->getPosts()->fetchAll());
        $key = array_search($post['id'], array_column($posts, 'id'));
        require 'views/front/single.php';
    }

    /**
     * Add comment and redirect
     * @param $id
     * @throws \Exception
     */
    function addComment($id){
        $newComment = $this->commentManager->postComment($id, $_POST['author'], $_POST['comment']);
        if($newComment === false){
            throw new \Exception("Impossible d'ajouter le commentaire");
        } else {
            header('Location: /episode/'.$id);
        }
    }

    /**
     * Report comment and redirect
     * @param $episodeId
     * @param $commentId
     * @throws \Exception
     */
    function reportComment($episodeId, $commentId){
        $reportComment = $this->commentManager->reportComment(1, $commentId);
        if($reportComment === false){
            throw new \Exception("Impossible de signaler le commentaire");
        } else {
            header('Location: /episode/'.$episodeId);
        }
    }
}