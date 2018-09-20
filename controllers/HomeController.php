<?php

namespace Controllers;

use Models\PostModel;

class HomeController {

    function getPosts(){
        $postManager = new PostModel();
        $posts = $postManager->getPosts()->fetchAll();
        require 'views/front/home.php';
    }

}