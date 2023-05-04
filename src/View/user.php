<?php
// Check if $userData is set
if (!isset($userData)) {
    throw new \Exception('Aucune donnée utilisateur n\'a été trouvée');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User data</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>
<body>
    <main class="container">
        
        <h1>User data</h1>
        <p>Firstname: <?= htmlspecialchars($userData['first_name']) ?></p>
        <p>Lastname: <?= htmlspecialchars($userData['last_name']) ?></p>
        <p>Email: <?= htmlspecialchars($userData['email']) ?></p>
    </main>
    
    <!-- Bootstrap js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>