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

// Vérification de la méthode de requête
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $matricule = $_POST["matricule"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $statut = $_POST["statut"];
    $date_debut_abonnement = $_POST["date_debut_abonnement"];
    $date_fin_abonnement = $_POST["date_fin_abonnement"];

    // Mise à jour des informations de l'élève dans la table ELEVES
    $sql_update_eleve = "UPDATE ELEVES SET Nom_eleve='$nom', Prenom_eleve='$prenom', Statut_eleve='$statut' WHERE Matricule='$matricule'";

    if ($conn->query($sql_update_eleve) === TRUE) {
        echo "Les informations de l'élève ont été mises à jour avec succès.<br>";
    } else {
        echo "Erreur lors de la mise à jour des informations de l'élève : " . $conn->error . "<br>";
    }

    // Mise à jour de la date de début de l'abonnement dans la table ABONNEMENT
    $sql_update_abonnement = "UPDATE ABONNEMENT SET Date_debut='$date_debut_abonnement', Date_fin='$date_fin_abonnement' WHERE Matricule='$matricule'";

    if ($conn->query($sql_update_abonnement) === TRUE) {
        echo "La date de début de l'abonnement a été mise à jour avec succès.<br>";
    } else {
        echo "Erreur lors de la mise à jour de la date de début de l'abonnement : " . $conn->error . "<br>";
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
