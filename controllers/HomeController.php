<?php

namespace Controllers;

use Models\PostModel;

class HomeController {
    public function getAll(){
        $postManager = new PostModel();
        $posts = $postManager->getPosts();

        require 'views/front/home.php';
    }
}