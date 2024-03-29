<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'abonnement à la cantine</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select,
        input[type="date"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<form method="POST" action="traitement.php">
    <!-- Informations de l'élève -->
    <label for="matricule">Matricule :</label>
    <input type="text" name="matricule" id="matricule" required><br>

    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required><br>

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" id="prenom" required><br>

    <label for="statut">Statut :</label>
        <select id="statut" name="statut" required>
            <option value="Interne">actif</option>
            <option value="Externe">expiré</option>
        </select><br><br>

    <!-- Informations de la classe -->
    <label for="classe">Classe :</label>
    <select name="classe" id="classe" required>
        <option value="">Sélectionnez une classe</option>
        <!-- Code PHP pour récupérer les classes depuis la table CLASSE -->
        <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "MaCantine_Scolaire";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        // Requête pour récupérer les classes
        $query = "SELECT * FROM CLASSE";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['ID_classe'] . "'>" . $row['Nom_classe'] . "</option>";
        }

        // Fermeture de la connexion à la base de données
        mysqli_close($conn);
        ?>
    </select><br>

    <!-- Informations de l'abonnement -->
    <label for="date_debut">Date de début :</label>
    <input type="date" name="date_debut" id="date_debut" required><br>

    <label for="Montant">Montant :</label>
    <input type="number" name="Montant" id="Montant" required><br>

    <input type="submit" value="Valider">
</form>
</body>
</html>
