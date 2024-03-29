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

// Récupération des données du formulaire
$nom_plat = $_POST['Nom_plat'];
$description_plat = $_POST['Description'];
$plat_principale = $_POST['Plat_principale'];
$entree_plat = $_POST['Entree'];

// Préparation et exécution de la requête d'insertion
$sql = "INSERT INTO PLAT (Nom_plat, Description, Plat_principale, Entree) VALUES ('$nom_plat', '$description_plat', '$plat_principale', '$entree_plat')";

if ($conn->query($sql) === TRUE) {
    
    header('Location: formulaire_dessert.php');
        echo "Le plat a été ajouté avec succès.";
    exit();
} else {
    echo "Erreur lors de l'ajout du plat : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>