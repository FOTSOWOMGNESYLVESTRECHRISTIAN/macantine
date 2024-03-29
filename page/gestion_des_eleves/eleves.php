<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$basededonnees = "macantine_Scolaire";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $basededonnees);

// Vérification de la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupération du jour de la semaine (1 pour lundi, 2 pour mardi, etc.)
$jour_semaine = date('N');

// Récupération du menu pour le jour de la semaine actuel depuis la table MENU
$sql_menu = "SELECT * FROM MENU WHERE DAYOFWEEK(Date_menu) = ?";
$stmt_menu = $connexion->prepare($sql_menu);

if ($stmt_menu) {
    $stmt_menu->bind_param("i", $jour_semaine);
    $stmt_menu->execute();
    $result_menu = $stmt_menu->get_result();

    // Récupération des plats correspondant au menu pour le jour de la semaine actuel depuis la table PLAT
    $plats = array();
    while ($menu = $result_menu->fetch_assoc()) {
        
        $sql_plats = "SELECT Nom_plat, Description FROM PLAT WHERE ID_plat = ?";
        $stmt_plats = $connexion->prepare($sql_plats);
        if ($stmt_plats) {
            $stmt_plats->bind_param("i", $id_plat);
            $stmt_plats->execute();
            $result_plats = $stmt_plats->get_result();

        }  
    }

    // Affichage des plats par menu
    foreach ($plats as $libelle_menu => $liste_plats) {
        echo "<h2>$libelle_menu</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Nom du plat</th><th>Description</th></tr>";
        foreach ($liste_plats as $plat) {
            echo "<tr><td>".$plat['Nom_plat']."</td><td>".$plat['Description']."</td></tr>";
        }
        echo "</table>";
    }
}


// Fermeture de la connexion
$connexion->close();
?>