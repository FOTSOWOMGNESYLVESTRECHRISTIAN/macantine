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
$nom_dessert = $_POST['Nom_dessert'];
$description_dessert = $_POST['Description_dessert'];

// Préparation et exécution de la requête d'insertion
$sql = "INSERT INTO DESSERT (Nom_dessert, Description_dessert) VALUES ('$nom_dessert', '$description_dessert')";

if ($conn->query($sql) === TRUE) {
    header('Location: menu_plat_dessert.php');
    exit();
} else {
    echo "Erreur lors de l'ajout du dessert : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>