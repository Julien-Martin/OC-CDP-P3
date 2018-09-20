<?php

namespace Controllers;

use Models\UserModel;

/**
 * Class UserController
 * @package Controllers
 */
class UserController {

    private $userManager;

    /**
     * UserController constructor.
     * @param $userManager
     */
    public function __construct()
    {
        $this->userManager = new UserModel();
    }


    /**
     * Redirection to view
     */
    function loginPage(){
        require 'views/front/login.php';
    }

    /**
     *  If user is logged in store in $_SESSION
     */
    function validateLogin(){
        $logged = $this->userManager->checkLogin($_POST['username'], hash('sha256', $_POST['password']))->fetch();
        if($logged){
            $_SESSION['login'] = $logged;
            header('Location: /admin');
        } else {
            header('Location: /');
        }
    }

    /**
     * Destroy session
     */
    function logout(){
        session_unset();
        session_destroy();
        header('Location: /');
    }
}