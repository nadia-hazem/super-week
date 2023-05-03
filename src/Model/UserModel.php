<?php
// App/Model/UserModel.php

namespace App\Model;

use PDO;
class UserModel
{
    private $pdo;

    public function __construct()
    {
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
    // retrieve all users
    public function findAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM user');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // create user
    public function createUser($firstname, $lastname, $email, $password)
    {
        $req = $this->pdo->prepare('INSERT INTO user (first_name, last_name, email, password) VALUES (:firstname, :lastname, :email, :password)');
        $req->execute([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => $password,
        ]);
    }
    // retrieve user email
    public function findOneByEmail($email) 
    {
        $req = $this->pdo->prepare('SELECT * FROM user WHERE email = :email');
        $req->execute([
            'email' => $email,
        ]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }
    // retrieve user data with id
    public function findOneById($id)
    {
        $user = $_SESSION['user']['id'];
        if (!isset($user)) {
            throw new \Exception('Vous devez être connecté pour accéder à cette page');
        }
    
        $req = $this->pdo->prepare('SELECT * FROM user WHERE id = :id');
        $req->execute([
            'id' => $id,
        ]);
        $userData = $req->fetch(PDO::FETCH_ASSOC);
    
        if ($userData) {
            return $userData;
        } else {
            throw new \Exception('L\'utilisateur n\'existe pas');
        }
    }


}