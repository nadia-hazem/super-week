<?php
// App/Controller/AuthController.php

namespace App\Controller;
/* use App\Controller\Utils; */
use App\Model\UserModel;
use App\Controller\Utils;

class AuthController {

    public function register()
    {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Récupérer les données du formulaire
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            if($password !== $cpassword) {
                throw new \Exception('Les mots de passe ne correspondent pas');
            }
            $password = password_hash($password, PASSWORD_DEFAULT);

            $firstname = Utils::valid_data($firstname);
            $lastname = Utils::valid_data($lastname);
            $email = Utils::valid_data($email);
            $password = Utils::valid_data($password);

            // Vérifier si l'e-mail est déjà utilisé
            $userModel = new UserModel();
            $user = $userModel->findOneByEmail($email);
            if ($user) {
                require_once 'src/View/register.php';
                echo '<p class="mx-5">Email déjà utilisé</p>';
            } else {
                // Créer un nouvel utilisateur dans la base de données
                $userModel = new UserModel();
                $userModel->createUser($firstname, $lastname, $email, $password);
                require_once 'src/View/register.php';
                echo '<p class="mx-5">Utilisateur créé avec succès</p>';
                // Rediriger l'utilisateur vers une autre page
                header('Location: /');

                exit;
            }
        }
    }

    public function login()
    {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Récupérer les données du formulaire
            $email = $_POST['email'];
            $password = $_POST['password'];

            $email = Utils::valid_data($email);
            $password = Utils::valid_data($password);

            $request = new UserModel();
            $user = $request->findOneByEmail($email);
            if(!$user) {
                require_once 'src/View/login.php';
                echo '<p class="mx-5">Email ou mot de passe incorrect</p>';
            } else {
                if(password_verify($password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = $user;
                    header('Location: /');
                    exit;
                } else {
                    require_once 'src/View/login.php';
                    echo '<p class="mx-5">Email ou mot de passe incorrect</p>';
                }
            }

        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /');
        exit;
    }

}