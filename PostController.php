<?php
require('Post.php');

if(isset($_GET['id']) && $_GET['id'] > 0){
    $post = getPost($_GET['id']);
    echo $post;
    $comments = getComments($_GET['id']);
    require('single.php');
} else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}