<?php

namespace Models;

class BookModel extends Manager {

    public function createBook($title){
        $db = $this->dbConnection();
        $req = $db->prepare('INSERT INTO books (title, creation_date) VALUES (?, NOW())');
        $req->execute(array($title));
        return $req;
    }

    public function getBooks(){
        $db = $this->dbConnection();
        $req = $db->query('SELECT * FROM books ORDER BY creation_date DESC');
        return $req;
    }

    public function getBook($bookId){
        $db = $this->dbConnection();
        $req = $db->prepare('SELECT * FROM books WHERE id=?');
        $req->execute(array($bookId));
        $book = $req->fetch();
        return $book;
    }

    public function removeBook($bookId){
        $db = $this->dbConnection();
        $req = $db->prepare('DELETE FROM books WHERE id=?');
        $req->execute(array($bookId));
        return $req;
    }

    public function updateBook($bookId, $title){
        $db = $this->dbConnection();
        $req = $db->prepare('UPDATE books SET title=? WHERE id=?');
        $req->execute(array($title, $bookId));
        return $req;
    }

}