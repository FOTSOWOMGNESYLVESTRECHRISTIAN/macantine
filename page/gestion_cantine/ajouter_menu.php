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
$libelle = $_POST['libelle'];
$date_menu = $_POST['date_menu'];

// Préparation et exécution de la requête d'insertion
$sql = "INSERT INTO menu (libelle, date_menu) VALUES ('$libelle', '$date_menu')";

if ($conn->query($sql) === TRUE) {
    echo "Le menu a été ajouté avec succès.";
    header('Location: formulaire_plat.php');
    exit();
} else {
    echo "Erreur lors de l'ajout du menu : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>