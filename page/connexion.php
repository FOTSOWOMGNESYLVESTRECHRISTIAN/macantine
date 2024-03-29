<?php
// Inclure les paramètres de connexion à la base de données ici

// Vérifier si l'utilisateur est déjà connecté, le rediriger vers la page appropriée
session_start();
if (isset($_SESSION['user'])) {
    if ($_SESSION['role'] == 'eleve') {
        header("Location: index_eleve.php");
        exit();
    } elseif ($_SESSION['role'] == 'responsable de cantine') {
        header("Location: index_cantine.php");
        exit();
    } elseif ($_SESSION['role'] == 'econome') {
        header("Location: index_econome.php");
        exit();
    }
}
// Vérifier si le formulaire de nom d'utilisateur a été soumis
if (isset($_POST['username'])) {
    // Valider l'entrée utilisateur (vous devrez peut-être ajouter plus de validation)
    $username = $_POST['username'];

    // Récupérer les informations de l'utilisateur depuis la base de données en fonction de son nom d'utilisateur
    // Vous devez remplacer cette partie par votre propre logique pour récupérer les informations de l'utilisateur depuis la base de données
    $query = "SELECT Role FROM UTILISATEUR WHERE Username = '$username'";
    // Exécuter la requête SQL et obtenir le rôle de l'utilisateur
    // $role = mysqli_fetch_assoc(mysqli_query($connection, $query))['Role'];

    // Supposons que le rôle soit "eleve" pour cet exemple
    $role = "eleve";

    // Enregistrer le nom d'utilisateur et le rôle dans la session
    $_SESSION['user'] = $username;
    $_SESSION['role'] = $role;

    // Rediriger vers la page appropriée
    if ($role == 'eleve') {
        header("Location: index_eleve.php");
        exit();
    } elseif ($role == 'responsable') {
        header("Location: index_cantine.php");
        exit();
    } elseif ($role == 'econome') {
        header("Location: index_econome.php");
        exit();
    }
}
?>