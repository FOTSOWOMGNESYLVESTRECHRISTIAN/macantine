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

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $statut = $_POST['statut'];
    $classe = $_POST['classe'];
    $date_debut = $_POST['date_debut'];
    $montant = $_POST['Montant'];

    // Générer la date de fin trimestrielle
    $date_fin = date('Y-m-d', strtotime($date_debut . ' + 3 months'));

    // Date de paiement (aujourd'hui)
    $date_paye = date('Y-m-d');

    // Début de la transaction
    mysqli_autocommit($conn, false);

    // Insertion dans la table ELEVES
    $query_eleve = "INSERT INTO ELEVES (Matricule, Nom_eleve, Prenom_eleve, Statut_eleve, ID_classe) 
                    VALUES ('$matricule', '$nom', '$prenom', '$statut', $classe)";

    if (!mysqli_query($conn, $query_eleve)) {
        // En cas d'erreur, annuler la transaction et afficher un message d'erreur
        mysqli_rollback($conn);
        echo "Erreur lors de l'insertion dans la table ELEVES : " . mysqli_error($conn);
        exit();
    }

    // Insertion dans la table ABONNEMENT
    $query_abonnement = "INSERT INTO ABONNEMENT (ID_abon, Date_debut, Date_fin, Matricule) 
                         VALUES (UUID(), '$date_debut', '$date_fin', '$matricule')";

    if (!mysqli_query($conn, $query_abonnement)) {
        // En cas d'erreur, annuler la transaction et afficher un message d'erreur
        mysqli_rollback($conn);
        echo "Erreur lors de l'insertion dans la table ABONNEMENT : " . mysqli_error($conn);
        exit();
    }

    // Insertion dans la table FACTURE
    $query_facture = "INSERT INTO FACTURE (Date_paye, Montant, ID_abon) 
                      VALUES ('$date_paye', $montant, LAST_INSERT_ID())";

    if (!mysqli_query($conn, $query_facture)) {
        // En cas d'erreur, annuler la transaction et afficher un message d'erreur
        mysqli_rollback($conn);
        echo "Erreur lors de l'insertion dans la table FACTURE : " . mysqli_error($conn);
        exit();
    }

    // Valider la transaction
    mysqli_commit($conn);

    // Succès de l'opération
    
    header("Location: ../gestion_utilisateur/utilisateur.php?message=success");
    exit();
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
