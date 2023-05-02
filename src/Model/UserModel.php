<?php
// App/Model/UserModel.php

namespace App\Model;

use PDO;

class UserModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'myusername', 'mypassword');
    }

    public function findAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}