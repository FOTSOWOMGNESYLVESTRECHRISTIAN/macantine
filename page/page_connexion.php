

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../page/style/connexion.css">

    
</head>
<body>
    <h1>Connexion</h1>

    <!-- Première étape: Demander le nom d'utilisateur -->
    <form action="connexion.php" method="post">
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required>
        <button type="submit">Suivant</button>
    </form>

    <?php
    // Si l'utilisateur est déjà connecté mais n'est pas un élève, afficher un message d'erreur
    if (isset($_SESSION['user']) && $_SESSION['role'] != 'eleve') {
        echo "<p>Vous n'êtes pas autorisé à accéder à cette page.</p>";
    }
    ?>
</body>
</html>
