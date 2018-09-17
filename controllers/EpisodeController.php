<?php

namespace Controllers;

use Models\EpisodeModel;

class EpisodeController {

    public function getAll(){
        $episodeManager = new EpisodeModel();
        $episodes = $episodeManager->getEpisodes($_GET['bookId']);

        require 'views/front/episodes.php';
    }
}