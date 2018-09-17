<?php

namespace Core;

use Controllers\HomeController;
use Controllers\SingleController;
use Controllers\EpisodeController;

class Router {

    public function __construct()
    {
        $homeController = new HomeController();
        $singleController = new SingleController();
        $episodeController = new EpisodeController();
        try {
            if(isset($_GET['action'])){
                if($_GET['action'] == 'books'){
                    $homeController->getBooks();
                } elseif ($_GET['action'] == 'book'){
                    if(isset($_GET['bookId']) && $_GET['bookId'] > 0){
                        $episodeController->getAll();
                    } else {
                        throw new \Exception('Aucun identifiant de livre envoyé');
                    }
                } elseif($_GET['action'] == 'episode'){
                    if(isset($_GET['bookId']) && $_GET['bookId'] > 0){
                        if(isset($_GET['episodeId']) && $_GET['episodeId'] > 0){
                            $singleController->getEpisode();
                        } else {
                            throw new \Exception('Aucun identifiant de chapitre envoyé');
                        }
                    } else {
                        throw new \Exception('Aucun identifiant de livre envoyé');
                    }

                } elseif($_GET['action'] == 'post'){
                    if(isset($_GET['id']) && $_GET['id'] > 0){
                        $singleController->getPost();
                    } else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }
                } elseif($_GET['action'] == 'addComment'){
                    if(isset($_GET['id']) && $_GET['id'] > 0){
                        if(!empty($_POST['author']) && !empty($_POST['comment'])){
                            $singleController->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        } else {
                            throw new \Exception('Tous les champs ne sont pas remplis');
                        }
                    } else {
                        throw new \Exception('Aucun identifiant de billet envoyé');
                    }
                }
            } else {
                $homeController->getBooks();
            }
        } catch (\Exception $exception){
            $errorMessage = $exception->getMessage();
            require 'views/front/error.php';
        }
    }
}