<?php
// src/View/books/books.php
// add Utils class
$Utils = new \App\Controller\Utils();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livres</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>
<body>
    <main class="container">
        <h1>Liste de tous les livres</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Résumé</th>
                    <th>ID contributeur</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr class="my-5">
                        <td class="lead col col-2"><?php echo htmlspecialchars($book['title']); ?></td>
                        <td class="lead col col-9"><?php echo htmlspecialchars($book['content']); ?></td>
                        <td class="lead col col-1"><?php echo htmlspecialchars($book['id_user']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>

    <!-- Bootstrap js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>