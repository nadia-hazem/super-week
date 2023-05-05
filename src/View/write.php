<?php
// src/View/books/write.php

// Check for an error message in session
$error_message = '';
if (isset($_SESSION['error_message'])) {
    $error_message = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a book</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>
<body>
    <main class="container my-5 w-75">
        <h1 class="my-5 fw-light">Add a book</h1>
        <a href="/" class="btn btn-success mb-5">Back to home</a>
        <form action="" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Titre :</label>
                <input type="text"  class="form-control" name="title" id="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Description :</label>
                <textarea  class="form-control" name="content" id="content" required></textarea>
            </div>
            <!-- Champ caché pour stocker l'id de l'utilisateur -->
            <input type="hidden" name="id_user" value="<?php echo $_SESSION['user']['id']; ?>">

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>

            <!-- Display the error message if there is one -->
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>

        </form>

    </main>

    <!-- Bootstrap js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>