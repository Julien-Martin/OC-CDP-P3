<?php

namespace Controllers;

use Models\PostManager;

class HomeController {
    function getAll(){
        $postManager = new PostManager();
        $posts = $postManager->getPosts();

        require 'view/front/home.php';
    }
}