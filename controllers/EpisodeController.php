<?php

namespace Controllers;

use Models\EpisodeModel;

class EpisodeController {

    public function getEpisodes($bookId){
        $episodeManager = new EpisodeModel();
        $episodes = $episodeManager->getEpisodes($bookId);

        require 'views/front/episodes.php';
    }
}