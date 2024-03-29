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

// Vérification de la présence du paramètre matricule
if (isset($_POST['matricule'])) {
    $matricule = $_POST['matricule'];

    // Requête SQL pour récupérer les informations de l'élève
    $query_eleve = "SELECT Nom_eleve, Prenom_eleve, Statut_eleve FROM ELEVES WHERE Matricule = '$matricule'";
    $result_eleve = $conn->query($query_eleve);

    if ($result_eleve->num_rows > 0) {
        $row_eleve = $result_eleve->fetch_assoc();
        $nom_eleve = $row_eleve['Nom_eleve'];
        $prenom_eleve = $row_eleve['Prenom_eleve'];
        $statut_eleve = $row_eleve['Statut_eleve'];
    } else {
        echo "Aucune donnée trouvée pour ce matricule.";
        exit();
    }

    // Requête SQL pour récupérer la date de début de l'abonnement
    $query_abonnement = "SELECT Date_debut, Date_fin FROM ABONNEMENT WHERE Matricule = '$matricule'";
    $result_abonnement = $conn->query($query_abonnement);

    if ($result_abonnement->num_rows > 0) {
        $row_abonnement = $result_abonnement->fetch_assoc();
        $date_debut_abonnement = $row_abonnement['Date_debut'];
        $date_fin_abonnement = $row_abonnement['Date_fin'];
    } else {
        $date_debut_abonnement = "Non abonné";
        $date_fin_abonnement = "";
    }

    // Création d'un tableau associatif avec les informations récupérées
    $data = array(
        'nom' => $nom_eleve,
        'prenom' => $prenom_eleve,
        'statut' => $statut_eleve,
        'date_debut_abonnement' => $date_debut_abonnement,
        'date_fin_abonnement' => $date_fin_abonnement
    );

    // Conversion des données en format JSON pour l'envoi
    echo json_encode($data);
} else {
    echo "Matricule non spécifié.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
