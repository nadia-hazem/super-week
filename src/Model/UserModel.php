<?php
// App/Model/UserModel.php

namespace App\Model;

use PDO;
class UserModel extends AbstractModel
{
    protected $tablename = 'user';

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

}