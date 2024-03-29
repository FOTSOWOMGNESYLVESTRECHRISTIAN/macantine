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
// Classes à ajouter
$classes = array(
    "SIL",
    "CP",
    "CE1",
    "CE2",
    "CM1",
    "CM2",
    "CLASS 1",
    "CLASS 2",
    "CLASS 3",
    "CLASS 4",
    "CLASS 5",
    "CLASS 6"
);

// Insertion des classes dans la table CLASSE
foreach ($classes as $classe) {
    $query = "INSERT INTO CLASSE (Nom_classe) VALUES ('$classe')";
    mysqli_query($conn, $query);
}
// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>