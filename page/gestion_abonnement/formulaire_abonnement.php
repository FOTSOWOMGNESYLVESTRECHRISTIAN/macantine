<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'abonnement</title>
    <link rel="stylesheet" href="../style/formulaire2.css">
</head>
<body>
    <h1>Formulaire d'abonnement</h1>

        <form action="traitement_formulaire.php" method="POST">
            <label for="matricule">Matricule :</label>
            <input type="text" id="matricule" name="matricule" required><br><br>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br><br>

            <label for="statut">Statut :</label>
            <select id="statut" name="statut" required>
                <option value="Interne">actif</option>
                <option value="Externe">expiré</option>
            </select><br><br>

            <label for="classe">Classe :</label>
            <select id="classe" name="classe" required>
                <option value="">Sélectionner une classe</option>
                <!-- Remplacez les valeurs par les ID des classes existantes -->
                <option value="1">SIL</option>
                <option value="2">CP</option>
                <option value="3">CE1</option>
                <option value="1">CE2</option>
                <option value="2">CM1</option>
                <option value="3">CM2</option>
                <option value="1">CLASS 1</option>
                <option value="2">CLASS 2</option>
                <option value="3">CLASS 3</option>
                <option value="1">CLASS4</option>
                <option value="2">CLASS 5</option>
                <option value="3">CLASS 6</option>
            </select><br><br>

            <input type="submit" value="S'abonner à la cantine">
        </form>
</body>
</html>