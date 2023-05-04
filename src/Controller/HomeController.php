<?php
// App/Controller/HomeController.php

namespace App\Controller;
class HomeController
{
    public function index()
    {
        require_once 'src/View/home.php';
    }
}