<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="../public/js/home.js" defer></script>
</head>
<body>
    <?php 
        if (isset($_SESSION['user'])) {
            $firstname = $_SESSION['user']['first_name'];
            echo "<h1>Bienvenue" . ' ' . $firstname . "</h1>";
            echo '<button type="button" id="logout">Logout</button>';
            
        } else {
            echo "<h1>Bienvenue sur l'accueil</h1>";
        }
    ?>
    <main class="container">
        <h1>Home</h1>
        <div class="d-flex">
            <button type="button" id="users">Liste des utilisateurs</a></button>
            <button type="button" id="books">Liste des livres</a></button>
            <div class="col">
                <input type="number" id="userIdInput" placeholder="id">
                <button type="button" id="searchUserBtn">Détail de l'utilisateur</a></button>
            </div>
            <div class="col">
                <input type="number" id="bookIdInput" placeholder="id">
                <button type="button" id="searchBookBtn">Détail du livre</a></button>
            </div>
        </div>

        <div id="result"></div>

</body>
</html>