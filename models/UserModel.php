<?php

namespace Models;

/**
 * Class UserModel
 * @package Models
 */
class UserModel extends Manager {

    private $db;

    /**
     * UserModel constructor.
     */
    public function __construct()
    {
        $this->db = $this->dbConnection();
    }


    /**
     * Create a new user in database
     * @param $username
     * @param $password
     * @return bool|\PDOStatement
     */
    public function createUser($username, $password) {
        $req = $this->db->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
        $req->execute(array($username, $password));
        return $req;
    }

    /**
     * Get all users from database
     * @return bool|\PDOStatement
     */
    public function getUsers() {
        $req = $this->db->query('SELECT * FROM users');
        return $req;
    }

    /**
     * Get one user from database
     * @param $userId
     * @return mixed
     */
    public function getUser($userId) {
        $req = $this->db->prepare('SELECT id, username, password FROM users WHERE id = ?');
        $req->execute(array($userId));
        $user = $req->fetch();
        return $user;
    }

    /**
     * @param $userId
     * @return bool|\PDOStatement
     */
    public function removeUser($userId){
        $req = $this->db->prepare('DELETE FROM users WHERE id = ?');
        $req->execute(array($userId));
        return $req;
    }

    /**
     * Update user information in the database
     * @param $userId
     * @param $username
     * @param $password
     * @return bool|\PDOStatement
     */
    public function updateUser($userId, $username, $password){
        $req = $this->db->prepare('UPDATE users SET username=?, password=? WHERE id=?');
        $req->execute(array($username, $password, $userId));
        return $req;
    }

    /**
     * Check if login is correct
     * @param $username
     * @param $password
     * @return bool|\PDOStatement
     */
    public function checkLogin($username, $password){
        $req = $this->db->prepare('SELECT id FROM users WHERE username=? AND password=?');
        $req->execute(array($username, $password));
        return $req;
    }

}
