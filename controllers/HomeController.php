<?php

namespace Controllers;

use Models\BookModel;

class HomeController {

    function getBooks(){
        $bookManager = new BookModel();
        $books = $bookManager->getBooks();
        require 'views/front/home.php';
    }

}