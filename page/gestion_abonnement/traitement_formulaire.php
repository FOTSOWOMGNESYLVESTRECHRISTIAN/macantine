<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les valeurs du formulaire
    $matricule = $_POST["matricule"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $statut = $_POST["statut"];
    $nom_classe = $_POST["nom"];

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "macantine_scolaire";

    // Créer une connexion
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }


    $nomClasse = $_POST["nom"];
    // Récupérer l'ID de la classe correspondant au nom de classe
    $getClasseIdQuery = "SELECT id_classe FROM classe WHERE nom = '$nom_classe'";
    $result = $conn->query($getClasseIdQuery);

    if ($conn->query($result) === TRUE) {
        $row = $result->fetch_assoc();
        $id_classe = $row["id_classe"];

        // Insérer l'élève dans la table "eleves"
        $insertEleveQuery = "INSERT INTO eleves (Matricule, Nom_eleve, Prenom_eleve, Statut_eleve, ID_classe) VALUES ('$matricule', '$nom', '$prenom', '$statut', '$id_classe')";
        if ($conn->query($insertEleveQuery) === true) {
            echo "L'élève a été ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout de l'élève dans la table 'eleves': " . $conn->error;
        }
    } else {
        echo "Erreur : la classe spécifiée n'existe pas.";
    }

    // Fermer la connexion
    $conn->close();
}
?>