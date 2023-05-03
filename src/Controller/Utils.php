<?php
// src/Utils.php

namespace App\Controller;

class Utils
{
    public static function valid_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
}
