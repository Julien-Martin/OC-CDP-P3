<?php

namespace Controllers;

use Models\PostModel;

class PostController {

    public function getEpisodes($bookId){
        $episodeManager = new PostModel();
        $episodes = $episodeManager->getEpisodes($bookId);

        require 'views/front/posts.php';
    }
}