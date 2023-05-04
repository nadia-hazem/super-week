<?php


// App/Model/BookModel.php
namespace App\Model;
use PDO;

class BookModel {
    private $pdo;

    public function __construct() {
        // variables de connexion à la bdd
        $host = 'localhost';
        $dbname = 'superweek';
        $dbUser = 'root';
        $dbPass = '';

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbUser, $dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->exec("set names utf8");
        } catch (\PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();
        }
    }

    public function findOneByTitle($title) {
        $req = $this->pdo->prepare('SELECT * FROM book WHERE title = :title');
        $req->execute([
            'title' => $title,
        ]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function findOneById($id)
    {
        try {
            $req = $this->pdo->prepare('SELECT * FROM book WHERE id = :id');
            $req->execute([
                'id' => $id,
            ]);
    
            if (!$req->rowCount()) {
                throw new \Exception('Aucun livre trouvé');
            }
    
            $book = $req->fetch(PDO::FETCH_ASSOC);
    
            return $book;
        } catch (\PDOException $e) {
            echo 'PDOException: ' . $e->getMessage();
            exit();
        }
    }

    public function findAll() {
        $stmt = $this->pdo->query('SELECT * FROM book ORDER BY id DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

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
