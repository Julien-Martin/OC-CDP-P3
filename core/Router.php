<?php

namespace Core;

use Controllers\HomeController;
use Controllers\SingleController;

class Router {

    public function __construct()
    {
        $homeController = new HomeController();
        $singleController = new SingleController();
        if(isset($_GET['action'])){
            if($_GET['action'] == 'posts'){
                $homeController->getAll();
            } elseif ($_GET['action'] == 'post'){
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    $singleController->getPost();
                } else {
                    echo 'Erreur : aucun identifiant de billet envoyé';
                }
            }
        } else {
            $homeController->getAll();
        }
    }
}