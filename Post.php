<?php

function getPosts(){
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content, creationdate FROM posts ORDER BY creationdate DESC');
    return $req;
}

function getPost($postId){
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, creationdate FROM posts WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId){
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment, comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}

function dbConnect(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=p3;charset=utf8', 'root', '');
        return $db;
    } catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

