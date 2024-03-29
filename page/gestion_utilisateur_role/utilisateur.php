<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
    <link rel="stylesheet" href="../style/utilisateur.css">
</head>
<body>
    <h1>Ajouter un utilisateur</h1>

    <form action="insert_user.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="role">Rôle :</label>
        <select id="role" name="role" required>
            <option value="">Sélectionnez un rôle</option>
            <option value="eleve">INVITE</option>
            <option value="responsable">UTILISATEUR</option>
            <option value="econome">ADMIN</option>
            
            <!-- Vous pouvez ajouter d'autres options de rôles ici -->
        </select><br>

        <label for="passwordEleve">Mot de passe élève :</label>
        <input type="password" id="passwordEleve" name="passwordEleve" required><br>

        <label for="username">Type d'utilisateur :</label>
        <select id="username" name="username" required>
            <option value="">Sélectionnez un rôle</option>
            <option value="eleve">Élève</option>
            <option value="responsable">Responsable de la cantine</option>
            <option value="econome">Économe</option>
            <!-- Vous pouvez ajouter d'autres options de rôles ici -->
        </select><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br>

        <label for="statut">Statut :</label>
        <input type="text" id="statut" name="statut" required><br>

        <button type="submit">Ajouter l'utilisateur</button>
    </form>
</body>
</html>
