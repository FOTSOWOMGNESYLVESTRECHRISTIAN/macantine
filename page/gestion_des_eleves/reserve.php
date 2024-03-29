<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MaCantine_Scolaire";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Récupération des informations de l'élève connecté (à remplacer par votre propre logique d'authentification)
$eleveId = 1; // ID de l'élève connecté (exemple)
$sqlEleve = "SELECT * FROM ELEVES WHERE ID_Eleve = $eleveId";
$resultEleve = $conn->query($sqlEleve);
$eleve = $resultEleve->fetch_assoc();

// Récupération de la liste des jours de la semaine (sauf samedi et dimanche)
$joursSemaine = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
foreach ($joursSemaine as $jour) {
    // Vérification si le jour est samedi ou dimanche
    if ($jour == 'Saturday' || $jour == 'Sunday') {
        continue; // Passe au jour suivant (ignore samedi et dimanche)
    }

    // Récupération du menu pour le jour de la semaine
    $sqlMenu = "SELECT * FROM MENU WHERE DAYNAME(Date_menu) = '$jour'";
    $resultMenu = $conn->query($sqlMenu);
    $menu = $resultMenu->fetch_assoc();

    // Vérification si le menu existe
    if ($resultMenu->num_rows > 0) {
        // Récupération du plat du jour
        $platDuJour = $menu['Date_menu'];
        $sqlPlat = "SELECT * FROM PLAT, MENU WHERE ID_plat = $platDuJour";
        $resultPlat = $conn->query($sqlPlat);
        $plat = $resultPlat->fetch_assoc();

        // Récupération du dessert du jour
        $dessertDuJour = $menu['Date_menu'];
        $sqlDessert = "SELECT * FROM DESSERT, MENU WHERE ID_menu = $dessertDuJour";
        $resultDessert = $conn->query($sqlDessert);
        $dessert = $resultDessert->fetch_assoc();

        // Affichage du tableau pour le jour de la semaine
        ?>
        <table>
            <tr>
                <th colspan="2">Informations de l'élève</th>
            </tr>
            <tr>
                <td>Nom</td>
                <td><?php echo $eleve['Nom_eleve']; ?></td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td><?php echo $eleve['Prenom_eleve']; ?></td>
            </tr>
            <tr>
                <td>Classe</td>
                <td><?php echo $eleve['ID_classe']; ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <th colspan="6">Menu du jour (<?php echo $menu['Date_menu']; ?>)</th>
            </tr>
            <tr>
                <td>Nom du plat</td>
                <td>Description du plat</td>
                <td>Entrée</td>
                <td>Plat principal</td>
                <td>Nom du dessert</td>
                <td>Description du dessert</td> 
            </tr>
            <tr>
                <td><?php echo $plat['Nom_plat']; ?></td>
                <td><?php echo $plat['Description']; ?></td>
                <td><?php echo $plat['Entree']; ?></td>
                <td><?php echo $plat['Plat_principale']; ?></td>
                <td><?php echo $dessert['Nom_dessert']; ?></td>
                <td><?php echo $dessert['Description_dessert']; ?></td>
            </tr>
        </table>
        <?php
    }
}

// Fermeture de la connexion à la base de données
$conn->close();
?>