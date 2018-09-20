<?php

namespace Models;

class UserModel extends Manager {

  public function createUser($username, $password){
    $db = $this->dbConnection();
    $req = $db->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $req->execute(array($username, $password));
    return $req;
  }

  public function getUsers(){
    $db = $this->dbConnection();
    $req = $db->query('SELECT * FROM users');
    return $req;
  }

  public function getUser($userId){
    $db = $this->dbConnection();
    $req = $db->prepare('SELECT id, username, password FROM users WHERE id = ?');
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

  public function updateUser($userId, $username, $password){
    $db = $this->dbConnection();
    $req = $db->prepare('UPDATE users SET username=?, password=? WHERE id=?');
    $req->execute(array($username, $password, $userId));
    return $req;
  }

  public function checkLogin($username, $password){
      $db = $this->dbConnection();
      $req = $db->prepare('SELECT id FROM users WHERE username=? AND password=?');
      $req->execute(array($username, $password));
      return $req;
  }

}
