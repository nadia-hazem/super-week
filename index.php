<?php
    require 'vendor/autoload.php';

$router = new AltoRouter();
$router->setBasePath('/super-week');

/* $router->map( 'GET', '/', function() {
    echo "<h1>Bienvenue sur l'accueil</h1>";
}, 'home' ); */

$router->addRoutes(array(
    // array(method, path, target, name)

    // Home
    array('GET', '/', function() { echo "<h1>Bienvenue sur l'accueil</h1>";}, 'home'),
    // Users
    array('GET', '/users',  function () {
        $userController = new \App\Controller\UserController();
        $users = $userController->list();
    
        header('Content-Type: application/json');
        echo json_encode($users);
    }),
    // User
    array('GET', '/users/[i:id]', function($id) { echo "<h1>Bienvenue sur la page de l'utilisateur $id</h1>";}, 'user'),

    // map create user page
    array('GET', '/users/create', function () {
        echo "<h1>Bienvenue sur la page de création d'un utilisateur</h1>";

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

    // register page
    array('GET', '/register', function () {
        require 'app/View/register.php'; 
    }, 'register'),

    
));



$match = $router->match();
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}