<?php
/**
 * Created by IntelliJ IDEA.
 * User: Marti
 * Date: 18/09/2018
 * Time: 19:23
 */

namespace Controllers;

use Models\CommentModel;
use Models\EpisodeModel;
use Models\UserModel;
use Models\BookModel;

class AdminController {

    private $userManager;
    private $bookManager;
    private $episodeManager;
    private $commentManager;
    private $view;

    /**
     * AdminController constructor.
     * @param $userManager
     * @param $bookManager
     * @param $commentManager
     */
    public function __construct()
    {
        $this->userManager = new UserModel();
        $this->bookManager = new BookModel();
        $this->commentManager = new CommentModel();
        $this->episodeManager = new EpisodeModel();
    }


    function home(){
        $booksNumber = count($this->bookManager->getBooks()->fetchAll());
        $commentsNumber = count($this->commentManager->getAllComments()->fetchAll());
        require 'views/back/home.php';
    }

    function getBooks(){
        $books = $this->bookManager->getBooks();
        require_once 'views/back/books.php';
    }

    function getComments(){
        $comments = $this->commentManager->getAllComments();
        require 'views/back/comments.php';
    }

    function getEpisodes($bookId){
        $book = $this->bookManager->getBook($bookId);
        $episodes = $this->episodeManager->getEpisodes($bookId);
        require 'views/back/episodes.php';
    }

    function getEpisode($bookId, $episodeId){
        $book = $this->bookManager->getBook($bookId);
        $episode = $this->episodeManager->getEpisode($bookId, $episodeId);
        require 'views/back/single.php';
    }

    function newEpisode($bookId){
        $book = $this->bookManager->getBook($bookId);
        require 'views/back/create.php';
    }

    function postEpisode($bookId){
        $episodeId = count($this->episodeManager->getEpisodes($bookId)->fetchAll())+1;
        $allowTags = '<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
        $allowTags .= '<li><ol><ul><span><div><br><ins><del>';
        $episode = $this->episodeManager->createEpisode($episodeId, $_POST['title'], strip_tags(stripslashes($_POST['content']), $allowTags), $bookId);
        if($episode === false){
            throw new \Exception("Impossible d'ajouter l'épisode");
        } else {
            header('Location: /admin/episodes/'.$bookId.'/'.$episodeId);
        }
    }

    function editEpisode($bookId, $episodeId){
        $allowTags = '<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
        $allowTags .= '<li><ol><ul><span><div><br><ins><del>';
        $episode = $this->episodeManager->updateEpisode($episodeId, $_POST['title'], strip_tags(stripslashes($_POST['content']), $allowTags), $bookId);
        if($episode === false){
            throw new \Exception("Impossible d'ajouter l'épisode");
        } else {
            header('Location: /admin/episodes/'.$bookId.'/'.$episodeId);
        }
    }

    function removeComment($comment_id){
        $deleteComment = $this->commentManager->removeComment($comment_id);
        if($deleteComment === false){
            throw new \Exception("Impossible d'ajouter le commentaire");
        } else {
            header('Location: /admin/comments');
        }
    }
}