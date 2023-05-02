<?php
// variables de connexion à la bdd
$host = 'localhost';
$dbname = 'super-week';
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

require 'vendor/autoload.php';

// generate data by calling methods
/* $faker = Faker\Factory::create(); */

/* for ($i = 0; $i < 3; $i++) {
    echo $faker->name() . "<br>";
    echo $faker->email() . "<br>";
}
for ($i = 0; $i < 3; $i++) {
    echo $faker->title() . "<br>";
    echo $faker->text() . "<br>";
} */ 

/* for ($i = 0; $i < 10; $i++) {
    $firstname = $faker->firstName();
    $lastname = $faker->lastName();
    echo $firstname . ' ' . $lastname . '<br>';
    // to lowercase
    $mail = strtolower($firstname . '.' . $lastname . '@' . $faker->freeEmailDomain());
    echo $mail . '<br>';
    // insert
    $req = $bdd->prepare('INSERT INTO user (first_name, last_name, email) VALUES (:firstname, :lastname, :email)');
    $req->execute(array(
        'firstname' => $firstname,
        'lastname' => $lastname,
        'email' => $mail
    ));
} */



$router = new AltoRouter();
$router->setBasePath('/super-week');

/* $router->map( 'GET', '/', function() {
    echo "<h1>Bienvenue sur l'accueil</h1>";
}, 'home' ); */

$router->addRoutes(array(
    array('GET', '/', function() { echo "<h1>Bienvenue sur l'accueil</h1>";}, 'home'),
    array('GET', '/users',  function () {
        $userController = new \App\Controller\UserController();
        $users = $userController->list();
    
        header('Content-Type: application/json');
        echo json_encode($users);
    }),
    array('GET', '/users/[i:id]', function($id) { echo "<h1>Bienvenue sur la page de l'utilisateur $id</h1>";}, 'user'),
));

$match = $router->match();
if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}