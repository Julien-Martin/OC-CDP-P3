<?php

namespace Controllers;

use Models\PostModel;

/**
 * Class HomeController
 * @package Controllers
 */
class HomeController {

    private $postManager;

    /**
     * HomeController constructor.
     */
    public function __construct(){
        $this->postManager = new PostModel();
    }

    /**
     * Get all post and passing data to view
     */
    function getPosts(){
        $posts = $this->postManager->getPosts()->fetchAll();
        require 'views/front/home.php';
    }

}