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

// Récupérer le matricule de l'élève envoyé via POST
$matricule = $_POST['matricule'];

// Requête SQL pour récupérer les informations de l'élève, de l'abonnement et de la facture
$query_info = "SELECT e.Nom_eleve, e.Prenom_eleve, e.Statut_eleve, a.Date_debut, a.Date_fin, f.Date_paye, f.Montant
               FROM ELEVES e
               LEFT JOIN ABONNEMENT a ON e.Matricule = a.Matricule
               LEFT JOIN FACTURE f ON a.ID_abon = f.ID_abon
               WHERE e.Matricule = '$matricule'";
$result_info = mysqli_query($conn, $query_info);
$info = mysqli_fetch_assoc($result_info);

// Formatage des informations de l'élève en HTML
$infoEleveHTML = "";
if ($info) {
    $infoEleveHTML .= "<div style='width: 210mm; height: 297mm; padding: 20mm;'>";
    $infoEleveHTML .= "<h1>Informations de l'élève</h1>";
    $infoEleveHTML .= "<p><strong>Nom:</strong> " . $info['Nom_eleve'] . "</p>";
    $infoEleveHTML .= "<p><strong>Prénom:</strong> " . $info['Prenom_eleve'] . "</p>";
    $infoEleveHTML .= "<p><strong>Statut:</strong> " . $info['Statut_eleve'] . "</p>";
    $infoEleveHTML .= "<h2>Abonnement</h2>";
    $infoEleveHTML .= "<p><strong>Date de début:</strong> " . $info['Date_debut'] . "</p>";
    $infoEleveHTML .= "<p><strong>Date de fin:</strong> " . $info['Date_fin'] . "</p>";
    $infoEleveHTML .= "<h2>Facture</h2>";
    $infoEleveHTML .= "<p><strong>Date payée:</strong> " . $info['Date_paye'] . "</p>";
    $infoEleveHTML .= "<p><strong>Montant:</strong> " . $info['Montant'] . "</p>";
    $infoEleveHTML .= "</div>";
} else {
    $infoEleveHTML = "Aucune information trouvée pour ce matricule.";
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);

// Retourner les informations de l'élève au format HTML
echo $infoEleveHTML;
?>
