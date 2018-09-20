<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marti
 * Date: 18/09/2018
 * Time: 19:23
 */

namespace Controllers;

use Models\CommentModel;
use Models\PostModel;
use Models\UserModel;

class AdminController {

    private $userManager;
    private $postManager;
    private $commentManager;
    private $view;

    /**
     * AdminController constructor.
     * @param $userManager
     * @param $commentManager
     */
    public function __construct()
    {
        $this->userManager = new UserModel();
        $this->commentManager = new CommentModel();
        $this->postManager = new PostModel();
        session_start();
        if(!isset($_SESSION['login'])){header('Location: /');}
    }

    function home(){
        $postNumber = count($this->postManager->getPosts()->fetchAll());
        $commentsNumber = count($this->commentManager->getAllComments()->fetchAll());
        require 'views/back/home.php';
    }

    function getUsers(){
        $users = $this->userManager->getUsers();
        require 'views/back/users.php';
    }

    function createUser(){
        $newUser = $this->userManager->createUser($_POST['username'], hash('sha256', $_POST['password']));
        if($newUser === false){
            throw new \Exception("Impossible d'ajouter l'utilisateur");
        } else {
            header('Location: /admin/users');
        }
    }

    function removeUser($id){
        $deleteUser = $this->userManager->removeUser($id);
        if($deleteUser === false){
            throw new \Exception("Impossible de supprimer l'utilisateur");
        } else {
            header('Location: /admin/users');
        }
    }

    /**
     * POSTS
     */
    function getPosts(){
        $posts = $this->postManager->getPosts()->fetchAll();
        require 'views/back/posts.php';
    }

    function getPost($id){
        $post = $this->postManager->getPost($id);
        require 'views/back/single.php';
    }

    function newPost(){
        require 'views/back/create.php';
    }

    function createPost(){
        $allowTags = '<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
        $allowTags .= '<li><ol><ul><span><div><br><ins><del>';
        $episode = $this->postManager->createPost($_POST['title'], strip_tags(stripslashes($_POST['content']), $allowTags));
        if($episode === false){
            throw new \Exception("Impossible d'ajouter l'épisode");
        } else {
            header('Location: /admin/posts');
        }
    }

    function editPost($id){
        $allowTags = '<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
        $allowTags .= '<li><ol><ul><span><div><br><ins><del>';
        $episode = $this->postManager->updatePost($id, $_POST['title'], strip_tags(stripslashes($_POST['content']), $allowTags), $id);
        if($episode === false){
            throw new \Exception("Impossible d'ajouter l'épisode");
        } else {
            header('Location: /admin/posts/'.$id);
        }
    }

    function removePost($id){
        $deletePost = $this->postManager->removePost($id);
        if($deletePost === false){
            throw new \Exception("Impossible de supprimer le post");
        } else {
            header('Location: /admin/posts');
        }
    }


    /**
     * COMMENTS
     */
    function getComments(){
        $comments = $this->commentManager->getAllComments();
        require 'views/back/comments.php';
    }

    function removeComment($comment_id){
        $deleteComment = $this->commentManager->removeComment($comment_id);
        if($deleteComment === false){
            throw new \Exception("Impossible de supprimer le commentaire");
        } else {
            header('Location: /admin/comments');
        }
    }

    function unreportComment($commentId){
        $this->commentManager = new CommentModel();
        $unreportComment = $this->commentManager->reportComment(0, $commentId);
        if($unreportComment === false){
            throw new \Exception("Impossible de signaler le commentaire");
        } else {
            header('Location: /admin/comments');
        }
    }
}