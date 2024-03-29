<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/supprimer.css">
    <title>Supprimer un élève</title>
</head>
<body>
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "MaCantine_Scolaire";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    $eleveId = "";

    // Vérifier si l'ID de l'élève est passé dans l'URL
    if (isset($_POST['Matricule'])) {
        $matricule = $_POST['Matricule'];
    } else {
        echo "ID de l'élève non spécifié.";
        exit();
    }

    // Vérifier si l'élève existe dans la base de données
    $matriculeSql = "SELECT * FROM ELEVES WHERE Matricule = $matricule";
    $matriculeResult = $conn->query($matriculeSql);

    if ($eleveResult->num_rows == 0) {
        echo "L'élève n'existe pas dans la base de données.";
        exit();
    }

    // Vérifier si le formulaire de confirmation a été soumis
    if (isset($_POST['confirmation'])) {
        $confirmation = $_POST['confirmation'];

        if ($confirmation == "oui") {
            // Supprimer l'abonnement de l'élève
            $abonnementSql = "DELETE FROM ABONNEMENT WHERE Matricule = $matricule";
            if ($conn->query($abonnementSql) === TRUE) {
                // Supprimer l'élève de la base de données
                $matriculeSql = "DELETE FROM ELEVES WHERE Matricule = $matricule";
                if ($conn->query($matriculeSql) === TRUE) {
                    header('Location: liste_eleve.php');
                    exit();
                } else {
                    echo "Erreur lors de la suppression de l'élève : " . $conn->error;
                }
            } else {
                echo "Erreur lors de la suppression de l'abonnement : " . $conn->error;
            }
        } elseif ($confirmation == "non") {
            header('Location: liste-eleve.php');
            exit();
        }
    } else {
        // Afficher le formulaire de confirmation
        ?>
        <h1>Supprimer l'élève</h1>
        <p>Voulez-vous vraiment supprimer cet élève et son abonnement ?</p>
        <form action="<?= $_SERVER["PHP_SELF"]; ?>?id=<?= $eleveId; ?>" method="POST">
            <input type="hidden" name="id" value="<?= $eleveId; ?>">
            <input type="radio" name="confirmation" value="oui" required>Oui<br>
            <input type="radio" name="confirmation" value="non" required>Non<br><br>
            <input type="submit" value="Confirmer">
        </form>
        <?php
    }

    $conn->close();
    ?>
</body>
</html>