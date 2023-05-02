<?php
// App/Controller/UserController.php

namespace App\Controller;

use App\Model\UserModel;

class UserController
{
    public function list()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();

        return $users;
    }

    public function register()
    {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Récupérer les données du formulaire
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Créer un nouvel utilisateur dans la base de données
            $userModel = new UserModel();
            $userModel->createUser($firstname, $lastname, $email, $password);

            // Rediriger l'utilisateur vers une autre page
            header('Location: /home');
            exit;
        }
    }

}



