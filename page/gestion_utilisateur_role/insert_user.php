<?php
// Définir les variables pour stocker les valeurs soumises
$nom = $role = $passwordEleve = $username = $password = $statut = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST['nom'];
    $role = $_POST['role'];
    $passwordEleve = $_POST['passwordEleve'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $statut = $_POST['statut'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation des informations de l'utilisateur</title>
    <link rel="stylesheet" href="../style/utilisateur.css">
</head>
<body>
    <h1>Confirmer les informations de l'utilisateur</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required><br><br>

        <label for="role">Rôle :</label>
        <input type="text" id="role" name="role" value="<?php echo $role; ?>" required><br><br>

        <label for="passwordEleve">Mot de passe élève :</label>
        <input type="password" id="passwordEleve" name="passwordEleve" value="<?php echo $passwordEleve; ?>" required><br><br>

        <label for="username">Type d'utilisateur :</label>
        <input type="text" id="username" name="username" value="<?php echo $username; ?>" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>" required><br><br>

        <label for="statut">Statut :</label>
        <input type="text" id="statut" name="statut" value="<?php echo $statut; ?>" required><br><br>

        <button type="submit">Confirmer l'ajout utilisateur</button>
    </form>
</body>
</html>
