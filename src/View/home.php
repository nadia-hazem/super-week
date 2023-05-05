<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <script src="../public/js/home.js" defer></script>
</head>
<body>
    <main class="container my-5 w-75">
        <?php 
            if (isset($_SESSION['user'])) {
                $firstname = $_SESSION['user']['first_name'];
                echo '<h1 class="fw-light">Bienvenue' . ' ' . $firstname . '</h1>';
                echo '<h3>Home</h3>';
                echo "<a href='logout' class='btn btn-danger my-3'>Logout</a>";
                echo "<a href='books/write' class='btn btn-success my-3 mx-2'>Create book</a>";

            } else {
                echo '<h1 class="fw-light">Bienvenue</h1>';
                echo "<a href='login' class='btn btn-success my-3 mx-2'>Login</a>";
                echo "<a href='register' class='btn btn-success my-3 mx-2'>Register</a>";
            }
        ?>
        <div class="row">
            <div class="col col-3">
                <button class="btn btn-primary w-100 my-3" type="button" id="users">Liste des utilisateurs</a></button>
            </div>
            <div class="col col-3">
                <button class="btn btn-primary w-100 my-3" type="button" id="books">Liste des livres</a></button>
            </div>
        </div>
        <div class="row">
            <div class="col col-3">
                <button class="btn btn-primary w-100 my-3" type="button" id="searchUserBtn">Utilisateur</a></button>
            </div>
            <div class="col col-3">
                <input class="my-3" type="number" id="userIdInput" placeholder="id">
            </div>
        </div>
        <div class="row">
            <div class="col col-3">
                <button class="btn btn-primary w-100 my-3" type="button" id="searchBookBtn">Livre</a></button>
            </div>
            <div class="col col-3">
                <input class="my-3" type="number" id="bookIdInput" placeholder="id">
            </div>
        </div>

        <div id="result"></div>

    <!-- Bootstrap js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>