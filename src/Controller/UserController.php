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
    
        // Check if the user is logged in
        if (!isset($_SESSION['user'])) {
            throw new \Exception('Vous devez être connecté pour accéder à cette page');
        }
    
        // Check if the ID parameter is valid
        if (!is_numeric($id)) {
            throw new \Exception('L\'ID doit être un nombre entier');
        }
    
        // Retrieve user data with id
        $userData = $userModel->findOneById($id);
    
        if (!$userData) {
            throw new \Exception('L\'utilisateur n\'existe pas');
        }
        // Check if Accept header is set to JSON
        if (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false) {
            // Set content type header to JSON
            header('Content-Type: application/json');

            // Return user data as JSON
            echo json_encode($userData);
        } else {
            // Render user data using user.php view file
            require_once 'src/View/user.php';
        }
    }
}