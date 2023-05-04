<?php
session_start();
require 'vendor/autoload.php';

$router = new AltoRouter();
/* $router->map( 'GET', '/', function() {
    echo "<h1>Bienvenue sur l'accueil</h1>";
}, 'home' ); */

$router->addRoutes(array(   // array(method, path, target, name)
    
    // Home //////////////////////////////
    array('GET', '/', function() { 
        $homeController = new \App\Controller\HomeController();
        $homeController->index();
    }, 'home' ),

    // Users list ///////////////////////////
    array('GET', '/users',  function () {
        $userController = new \App\Controller\UserController();
        $users = $userController->list();
    
        header('Content-Type: application/json');
        echo json_encode($users);
    }),

    // User //////////////////////////////////
    array('GET', '/users/[i:id]', function($id) { 
        $UserController = new \App\Controller\UserController();
        $UserController->displayUserData($id);
    }, 'user'),

    // map create user page //////////////////
    array('GET', '/users/create', function () {
        echo "<h1>Bienvenue sur la page de création d'utilisateurs</h1>";

        // variables de connexion à la bdd
        $host = 'localhost';
        $dbname = 'superweek';
        $dbUser = 'root';
        $dbPass = '';

        try {
            $bdd = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbUser, $dbPass);
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bdd->exec("set names utf8");
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();
        }

        $faker = Faker\Factory::create();
        // création des users
        for ($i = 0; $i < 20; $i++) {
            $firstname = $faker->firstName();
            $lastname = $faker->lastName();
            echo $firstname . ' ' . $lastname . '<br>';
            // to lowercase
            $mail = strtolower($firstname . '.' . $lastname . '@' . $faker->freeEmailDomain());
            echo $mail . '<br>';
            // insert
            $req = $bdd->prepare('INSERT INTO user (first_name, last_name, email, password) VALUES (:firstname, :lastname, :email, :password)');
            $req->execute([
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $mail,
                'password' => password_hash('azerty', PASSWORD_DEFAULT),
            ]);
        };
    }, 'user-create'),

    // register get //////////////////////////
    array('GET', '/register', function () {
        require 'src/View/register.php'; 
    }, 'register-get'),

    // register post /////////////////////////
    array('POST', '/register', function () {
        $authController = new \App\Controller\AuthController();
        $authController->register();
    }, 'register-post'),

    // login get /////////////////////////////
    array('GET', '/login', function () {
        require 'src/View/login.php'; 
    }, 'login-get'),

    // login post ////////////////////////////
    array('POST', '/login', function () {
        $authController = new \App\Controller\AuthController();
        $authController->login();
    }, 'login-post'),

    // logout ////////////////////////////////
    array('GET', '/logout', function () {
        $authController = new \App\Controller\AuthController();
        $authController->logout();
    }, 'logout'),

    // GET book form /////////////////////////////
    array('GET', '/books/write', function () {
        $bookController = new \App\Controller\BookController();
        $bookController->writeBookForm();
    }, 'get-book'),

    // POST book form ////////////////////////////
    array('POST', '/books/write', function () {
        $bookController = new \App\Controller\BookController();
        $bookController->addBook();
    }, 'post-book'),

    // GET book list /////////////////////////////
    array('GET', '/books', function () {
        $bookController = new \App\Controller\BookController();
        $bookController->listBooks();
    }, 'get-books'),

    // GET book by id //////////////////////////
    array('GET', '/books/[i:id]', function($id) { 
        $bookController = new \App\Controller\BookController();
        $bookController->displayBookData($id);
    }, 'get-book-id'),
));



$match = $router->match();
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}