<?php
// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'MaCantine_scolaire';
$username = 'root';
$password = '';

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Configuration des options de PDO pour les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête d'insertion des rôles
    $roles = [
        ['Econome'],
        ['Responsable de cantine'],
        ['Élève']
    ];

    // Préparation de la requête d'insertion
    $stmt = $pdo->prepare("INSERT INTO ROLE (Lib_role) VALUES (?)");

    // Boucle sur les rôles pour les insérer un par un
    foreach ($roles as $role) {
        $stmt->execute($role);
        echo "Rôle inséré avec succès.<br>";
    }
} catch (PDOException $e) {
    // En cas d'erreur, affichage du message d'erreur
    echo "Erreur : " . $e->getMessage();
}
?>
