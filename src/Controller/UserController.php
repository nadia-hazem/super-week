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



}



