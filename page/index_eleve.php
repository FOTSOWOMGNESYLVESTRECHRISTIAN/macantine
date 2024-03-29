<?php
// Démarrer la session
session_start();

// Déterminer le texte à afficher dans la barre de navigation en fonction du rôle de l'utilisateur
$nav_text = "Invité";
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'eleve') {
        $nav_text = "Invité";
    } elseif ($_SESSION['role'] == 'responsable de cantine') {
        $nav_text = $_SESSION['user']; // Nom d'utilisateur du responsable
    } elseif ($_SESSION['role'] == 'econome') {
        $nav_text = "Admin";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../page/style/index.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <h1>Page d'accueil</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <!-- Ajoutez d'autres liens de navigation selon vos besoins -->
            </ul>
            <p>Connecté en tant que : <?php echo $nav_text; ?></p>
        </nav>
    </header>

    <main>
        <p>Contenu de la page d'accueil...</p>
    </main>
</body>
</html>
