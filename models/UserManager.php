<?php

namespace Models;

class UserManager extends Manager {

  public function createUser($username, $password, $mail){
    $db = $this->dbConnection();
    $req = $db->prepare('INSERT INTO users (username, password, email) VALUES (?, ?, ?)');
    $req->execute(array($username, $password, $mail));
    return $req;
  }

  public function getUsers(){
    $db = $this->dbConnection();
    $req = $db->query('SELECT * FROM users');
    return $req;
  }

  public function getUser($userId){
    $db = $this->dbConnection();
    $req = $db->prepare('SELECT id, username, password, email FROM users WHERE id = ?');
    $req->execute(array($userId));
    $user = $req->fetch();
    return $user;
  }

  public function removeUser($userId){
      $db = $this->dbConnection();
      $req = $db->prepare('DELETE FROM users WHERE id = ?');
      $req->execute(array($userId));
      return $req;
  }

  public function updateUser($userId, $username, $password, $mail){
    $db = $this->dbConnection();
    $req = $db->prepare('UPDATE users SET username=?, password=? email=? WHERE id=?');
    $req->execute(array($username, $password, $mail, $userId));
    return $req;
  }

}
