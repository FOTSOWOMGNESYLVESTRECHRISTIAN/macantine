<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "macantine_scolaire");
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Vérification des données reçues
if (isset($_POST['menuId'], $_POST['platId'], $_POST['dateJour'])) {
    // Récupération des données et nettoyage
    $menuId = intval($_POST['menuId']); // Conversion en entier pour éviter les injections
    $platId = intval($_POST['platId']); // Conversion en entier pour éviter les injections
    $dateJour = $conn->real_escape_string($_POST['dateJour']); // Échappement pour éviter les injections

    // Requête préparée pour insérer la réservation dans la base de données
    $sql = "INSERT INTO reservations (menu_id, plat_id, date_jour) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("iis", $menuId, $platId, $dateJour);
        if ($stmt->execute()) {
            // Réservation effectuée avec succès
            echo "Plat réservé avec succès pour le menu ID $menuId, plat ID $platId à la date $dateJour";
        } else {
            // Erreur lors de l'exécution de la requête
            echo "Erreur : Impossible de réserver le plat. Veuillez réessayer.";
        }
        $stmt->close();
    } else {
        // Erreur lors de la préparation de la requête
        echo "Erreur : Impossible de préparer la requête. Veuillez réessayer.";
    }
} else {
    // Données manquantes dans la requête POST
    echo "Erreur : Données manquantes pour effectuer la réservation.";
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
