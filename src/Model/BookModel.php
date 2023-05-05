<?php
// App/Model/BookModel.php

namespace App\Model;

use PDO;
class BookModel extends AbstractModel 
{
    protected $tablename = 'book';

    public function create($title, $content, $id_user) {
        $req = $this->pdo->prepare('SELECT * FROM book WHERE title = :title');
        $req->execute([
            'title' => $title,
        ]);
        $book = $req->fetch(PDO::FETCH_ASSOC);

        if ($book) {
            throw new \Exception("Un livre avec le titre '$title' existe déjà dans la base de données.");
        }

        $req = $this->pdo->prepare('INSERT INTO book (title, content, id_user) VALUES (:title, :content, :id_user)');
        $req->execute([
            'title' => $title,
            'content' => $content,
            'id_user' => $id_user,
        ]);
        // On récupère les données du livre inséré dans la base de données
        $id = $this->pdo->lastInsertId();
        $req = $this->pdo->prepare('SELECT * FROM book WHERE id = :id');
        $req->execute([
            'id' => $id,
        ]);
        $book = $req->fetch(PDO::FETCH_ASSOC);

        return $book;

    }
}
