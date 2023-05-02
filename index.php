<?php
require 'vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/super-week');

$router->map( 'GET', '/', 'render_home', 'home' );
