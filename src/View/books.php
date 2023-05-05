<?php //header('Content-Type: application/json'); ?>
<?php //echo json_encode($books, JSON_PRETTY_PRINT); ?>

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
    <main class="container my-5 w-75">
        <?php 
        if (isset($books)):
        ?>
            <h1>Bibliothèque</h1>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Réf</th>
                            <th>Titre</th>
                            <th>Résumé</th>
                            <th>ID contributeur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book): ?>
                            <tr class="my-5">
                                <td class="lead col col-1"><?=$book['id']; ?></td>
                                <td class="lead col col-2"><?=$book['title']; ?></td>
                                <td class="lead col col-8"><?=$book['content']; ?></td>
                                <td class="lead col col-1"><?=$book['id_user']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        <?php elseif (isset($book)):
        echo $book;
        ?>
            <h1>Livre n°<?=$book['id']; ?></h1>
            <p>Titre: <?=$book['title']; ?></p>
            <p>Résumé: <?=$book['content']; ?></p>
            <p>ID contributeur: <?=$book['id_user']; ?></p>
        <?php endif ?>
    </main>

    <!-- Bootstrap js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>