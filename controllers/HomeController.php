<?php

namespace Controllers;

use Models\PostModel;

class HomeController {
    function getAll(){
        $postManager = new PostModel();
        $posts = $postManager->getPosts();

        require 'view/front/home.php';
    }
}