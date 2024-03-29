<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des élèves</title>
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="../style/liste_eleve.css">
</head>
<body>
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

// Bouton pour ajouter un élève
echo "<button onclick=\"location.href='formulaire.php'\">Ajouter un élève</button>";

// Requête SQL pour récupérer les élèves abonnés à la cantine
$query_eleves = "SELECT Matricule, Nom_eleve, Prenom_eleve, Statut_eleve FROM ELEVES";
$result_eleves = mysqli_query($conn, $query_eleves);

// Vérification s'il y a des résultats
if (mysqli_num_rows($result_eleves) > 0) {
    // Affichage du tableau des élèves abonnés
    echo "<table>";
    echo "<tr><th>Matricule</th><th>Nom</th><th>Prénom</th><th>Statut</th><th>Date début abonnement</th><th>Date fin abonnement</th><th>Action</th></tr>";
    while ($row = mysqli_fetch_assoc($result_eleves)) {
        // Requête SQL pour récupérer l'abonnement de l'élève
        $matricule = $row['Matricule'];
        $query_abonnement = "SELECT Date_debut, Date_fin FROM ABONNEMENT WHERE Matricule = '$matricule'";
        $result_abonnement = mysqli_query($conn, $query_abonnement);
        $abonnement = mysqli_fetch_assoc($result_abonnement);

        
        // Affichage des données de l'élève et de son abonnement
        echo "<tr>";
        echo "<td>" . $row['Matricule'] . "</td>";
        echo "<td>" . $row['Nom_eleve'] . "</td>";
        echo "<td>" . $row['Prenom_eleve'] . "</td>";
        echo "<td>" . $row['Statut_eleve'] . "</td>";
        if ($abonnement) {
            echo "<td>" . $abonnement['Date_debut'] . "</td>";
            echo "<td>" . $abonnement['Date_fin'] . "</td>";
        } else {
            echo "<td>Non abonné</td><td></td>";
        }
        // Boutons d'action
        echo "<td>";
        // Bouton "Vue" avec gestion de l'événement onclick
        echo "<form action='../PagePHP/modifier.php'' method='POST' style='display: inline-block;'>";
        echo "<input type='hidden' name='id' value='" . $row['Matricule'] . "'>";
        echo "<button type='submit' class='btn-modifier' ><i class='fas fa-eye'></i></button>";
        echo "</form>"; // Bouton "Voir"
        echo "<form action='../PagePHP/modifier.php'' method='POST' style='display: inline-block;'>";
        echo "<input type='hidden' name='id' value='" . $row['Matricule'] . "'>";
        echo "<button type='submit' class='btn-modifier' ><i class='fas fa-edit'></i></button>";
        echo "</form>"; // Bouton "Modifier"
        echo "<form action='../gestion_abonnement/supprimer.php'' method='POST' style='display: inline-block;'>";
        echo "<input type='hidden' name='id' value='" . $row['Matricule'] . "'>";
        echo "<button type='submit' class='btn-modifier' ><i class='fas fa-trash'></i></button>";
        echo "</form>"; // Bouton "Supprimer"
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun élève abonné à la cantine.";
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

<!-- Conteneur pour afficher les informations de l'élève -->
<div id="info-eleve-container"></div>

<!-- Formulaire de modification -->
<div id="modification-form-container" style="display: none;">
    <h2>Modifier les informations de l'élève</h2>
    <form id="modification-form" action="modifier.php" method="POST">
        <input type="hidden" id="matricule" name="matricule">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom">
        <label for="statut">Statut:</label>
        <input type="text" id="statut" name="statut">
        <label for="date_debut_abonnement">Date début abonnement:</label>
        <input type="date" id="date_debut_abonnement" name="date_debut_abonnement">
        <label for="date_fin_abonnement">Date fin abonnement:</label>
        <input type="date" id="date_fin_abonnement" name="date_fin_abonnement" readonly>
        <button type="submit">Enregistrer</button>
    </form>
</div>

<!-- Script JavaScript pour gérer les événements onclick des boutons "Vue" -->
<script>
    document.querySelectorAll('.btn-vue').forEach(btn => {
        btn.addEventListener('click', function() {
            // Récupérer le matricule de l'élève associé à ce bouton
            const matricule = this.getAttribute('data-matricule');
            // Effectuer une requête AJAX pour récupérer les informations de l'élève
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'afficher_info_eleve.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Mettre à jour le contenu du conteneur avec les informations de l'élève
                    document.getElementById('info-eleve-container').innerHTML = xhr.responseText;
                }
            };
            xhr.send('matricule=' + matricule);
        });
    });

    // Script JavaScript pour afficher le formulaire de modification au clic sur le bouton "Modifier"
    document.querySelectorAll('.btn-modifier').forEach(btn => {
        btn.addEventListener('click', function() {
            const matricule = this.getAttribute('data-matricule');
            // Effectuer une requête AJAX pour récupérer les informations de l'élève et afficher le formulaire de modification
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'recuperer_info_eleve.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    const data = JSON.parse(xhr.responseText);
                    document.getElementById('matricule').value = data.matricule;
                    document.getElementById('nom').value = data.nom;
                    document.getElementById('prenom').value = data.prenom;
                    document.getElementById('statut').value = data.statut;
                    document.getElementById('date_debut_abonnement').value = data.date_debut_abonnement;
                    document.getElementById('date_fin_abonnement').value = data.date_fin_abonnement;
                    document.getElementById('modification-form-container').style.display = 'block';
                }
            };
            xhr.send('matricule=' + matricule);
        });
    });
</script>

<!-- Script JavaScript pour mettre à jour la date de fin de l'abonnement lorsque la date de début est modifiée -->
<script>
    document.getElementById('date_debut_abonnement').addEventListener('change', function() {
        const startDate = new Date(this.value);
        const endDateElement = document.getElementById('date_fin_abonnement');
        const endDate = new Date(startDate.getFullYear(), startDate.getMonth(), startDate.getDate() + 365); // Ajouter 1 an à la date de début
        endDateElement.value = endDate.toISOString().slice(0,10);
    });
</script>

</body>
</html>
