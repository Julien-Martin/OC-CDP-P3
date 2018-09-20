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

/**
 * Class AdminController
 * @package Controllers
 */
class AdminController {

    private $userManager;
    private $postManager;
    private $commentManager;

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
    }

    /**
     * Get data and passing to HomeView
     */
    function home(){
        $postNumber = count($this->postManager->getPosts()->fetchAll());
        $commentsNumber = count($this->commentManager->getAllComments()->fetchAll());
        $reportedNumber = $this->commentManager->countReported()->fetch()['reportedNumber'];
        require 'views/back/home.php';
    }

    /**
     * Get all users and passing to Users View
     */
    function getUsers(){
        $users = $this->userManager->getUsers();
        require 'views/back/users.php';
    }

    /**
     * Get data from post and passing to model
     * @throws \Exception
     */
    function createUser(){
        $newUser = $this->userManager->createUser($_POST['username'], hash('sha256', $_POST['password']));
        if($newUser === false){
            throw new \Exception("Impossible d'ajouter l'utilisateur");
        } else {
            header('Location: /admin/users');
        }
    }

    /**
     * Send action to model to remove user
     * @param $id
     * @throws \Exception
     */
    function removeUser($id){
        $deleteUser = $this->userManager->removeUser($id);
        if($deleteUser === false){
            throw new \Exception("Impossible de supprimer l'utilisateur");
        } else {
            header('Location: /admin/users');
        }
    }


    /**
     * Get all posts and passing data to posts view
     */
    function getPosts(){
        $posts = $this->postManager->getPosts()->fetchAll();
        require 'views/back/posts.php';
    }

    /**
     * Get one post to edit
     * @param $id
     */
    function getPost($id){
        $post = $this->postManager->getPost($id);
        require 'views/back/single.php';
    }

    /**
     *  Redirect to view for creating user
     */
    function newPost(){
        require 'views/back/create.php';
    }

    /**
     * Get TinyMCE data and send to Model (INSERT)
     * @throws \Exception
     */
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

    /**
     * Get TinyMCE data and send to Model (UPDATE)
     * @param $id
     * @throws \Exception
     */
    function editPost($id){
        $allowTags = '<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
        $allowTags .= '<li><ol><ul><span><div><br><ins><del>';
        $episode = $this->postManager->updatePost($id, $_POST['title'], strip_tags(stripslashes($_POST['content']), $allowTags));
        if($episode === false){
            throw new \Exception("Impossible d'éditer l'épisode l'épisode");
        } else {
            header('Location: /admin/posts/'.$id);
        }
    }

    /**
     * Get post deleted and send to Model (DELETE)
     * @param $id
     * @throws \Exception
     */
    function removePost($id){
        $deletePost = $this->postManager->removePost($id);
        if($deletePost === false){
            throw new \Exception("Impossible de supprimer le post");
        } else {
            header('Location: /admin/posts');
        }
    }


    /**
     * Get all comments and passing data to comments view
     */
    function getComments(){
        $comments = $this->commentManager->getAllComments();
        require 'views/back/comments.php';
    }

    /**
     * Remove comment action and send to Model (DELETE)
     * @param $comment_id
     * @throws \Exception
     */
    function removeComment($comment_id){
        $deleteComment = $this->commentManager->removeComment($comment_id);
        if($deleteComment === false){
            throw new \Exception("Impossible de supprimer le commentaire");
        } else {
            header('Location: /admin/comments');
        }
    }

    /**
     * Change state of reported to false (Comment is not reported)
     * @param $commentId
     * @throws \Exception
     */
    function unreportComment($commentId){
        $unreportComment = $this->commentManager->reportComment(0, $commentId);
        if($unreportComment === false){
            throw new \Exception("Impossible de signaler le commentaire");
        } else {
            header('Location: /admin/comments');
        }
    }
}