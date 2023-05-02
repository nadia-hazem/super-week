<?php
require 'vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/super-week');

/* $router->map( 'GET', '/', function() {
    echo "<h1>Bienvenue sur l'accueil</h1>";
}, 'home' ); */

$router->addRoutes(array(
    array('GET', '/', function() { echo "<h1>Bienvenue sur l'accueil</h1>";}, 'home'),
    array('GET', '/users', function() { echo "<h1>Bienvenue sur la liste des Utilisateurs.</h1>";}, 'users'),
    array('GET', '/users/[i:id]', function($id) { echo "<h1>Bienvenue sur la page de l'utilisateur $id</h1>";}, 'user'),
));

$match = $router->match();
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}