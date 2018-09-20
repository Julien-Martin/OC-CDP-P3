<?php

namespace Controllers;

use Models\UserModel;

class UserController {

    private $userManager;

    /**
     * UserController constructor.
     * @param $userManager
     */
    public function __construct()
    {
        $this->userManager = new UserModel();
        session_start();
    }


    function loginPage(){
        require 'views/front/login.php';
    }

    function validateLogin(){
        $logged = $this->userManager->checkLogin($_POST['username'], hash('sha256', $_POST['password']))->fetch();
        if($logged){
            $_SESSION['login'] = $logged;
            var_dump($_SESSION);
            header('Location: /admin');
        } else {
            header('Location: /');
        }
    }

    function logout(){
        session_unset();
        session_destroy();
        header('Location: /');
    }
}