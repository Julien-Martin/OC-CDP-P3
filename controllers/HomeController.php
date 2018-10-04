<?php

namespace Controllers;

use Models\AboutModel;
use Models\PostModel;

/**
 * Class HomeController
 * @package Controllers
 */
class HomeController {

    private $postManager;
    private $aboutManager;

    /**
     * HomeController constructor.
     */
    public function __construct(){
        $this->postManager = new PostModel();
        $this->aboutManager = new AboutModel();
    }

    /**
     * Get all post and passing data to view
     */
    function getPosts(){
        $posts = $this->postManager->getPosts()->fetchAll();
        require 'views/front/home.php';
    }

    function about(){
        $about = $this->aboutManager->getContent()->fetch();
        require 'views/front/about.php';
    }

}