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

    public function displayUserData($id)
    {
        $userModel = new UserModel();
        $user = $userModel->findOneById($id);
        
        // Check if a session has not already been started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Validate the input
        $id = htmlspecialchars($id, ENT_QUOTES);
        // Check if the ID parameter is valid
        if (!is_numeric($id)) {
            throw new \Exception('L\'ID doit être un nombre entier');
        }
        
        // Check if the user is logged in
        if (!isset($_SESSION['user'])) {
            throw new \Exception('Vous devez être connecté pour accéder à cette page');
        }

    }

}



