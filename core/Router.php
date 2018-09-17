<?php

namespace Core;

use Controllers\HomeController;
use Controllers\SingleController;

class Router {

    public function __construct()
    {
        $homeController = new HomeController();
        $singleController = new SingleController();
        try {
            if(isset($_GET['action'])){
                if($_GET['action'] == 'posts'){
                    $homeController->getAll();
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
                $homeController->getAll();
            }
        } catch (\Exception $exception){
            $errorMessage = $exception->getMessage();
            require 'views/front/error.php';
        }
    }
}