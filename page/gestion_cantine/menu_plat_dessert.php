<?php
// Établir une connexion à la base de données
$hostname = "localhost";
$username = "root";
$password = "";
$database = "MaCantine_Scolaire";

$connection = new mysqli($hostname, $username, $password, $database);
// Vérifier si la connexion a échoué
if ($connection->connect_error) {
    die("La connexion a échoué : " . $connection->connect_error);
}

// Vérification des erreurs de connexion
if ($connection->connect_error) {
    die('Erreur de connexion à la base de données : ' . $connection->connect_error);
}

// Fonction pour récupérer les plats
function getPlats($connection) {
    $plats = array();

    // Requête pour sélectionner tous les plats
    $query = "SELECT * FROM PLAT";
    $result = $connection->query($query);

    // Parcours des résultats de la requête
    while ($row = $result->fetch_assoc()) {
        $plats[] = $row;
    }

    return $plats;
}

// Fonction pour récupérer les menus
function getMenus($connection) {
    $menus = array();

    // Requête pour sélectionner tous les menus
    $query = "SELECT * FROM MENU";
    $result = $connection->query($query);

    // Parcours des résultats de la requête
    while ($row = $result->fetch_assoc()) {
        $menus[] = $row;
    }

    return $menus;
}

// Fonction pour récupérer les desserts
function getDesserts($connection) {
    $desserts = array();

    // Requête pour sélectionner tous les desserts
    $query = "SELECT * FROM DESSERT";
    $result = $connection->query($query);

    // Parcours des résultats de la requête
    while ($row = $result->fetch_assoc()) {
        $desserts[] = $row;
    }

    return $desserts;
}

// Appel des fonctions pour récupérer les plats, les menus et les desserts
$plats = getPlats($connection);
$menus = getMenus($connection);
$desserts = getDesserts($connection);

// Fermeture de la connexion à la base de données
$connection->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ma Cantine Scolaire</title>
    <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/menu_plat_dessert.css">
</head>
<body>
    <h1>Ma Cantine Scolaire</h1>
    <div id="current-time"></div>

    <script src="../script/menu_plat_dessert.js"></script>

    <div class="mb-3">
        <a href="formulaire_menu.php" class="btn btn-primary">Ajouter un menu</a>
        <button class="btn btn-secondary my-6 data-bs-toggle="modal" data-bs-target="#modaladd" name="imprimer" onclick="window.print()"><i class="fas fa-print"></i></button>
    </div>
    
    
    <h2>Menus</h2>
    <?php echo generateTable($menus); ?>

    <h2>Plats</h2>
    <?php echo generateTable($plats); ?>

    <h2>Dessert</h2>
    <?php echo generateTable($desserts); ?>

<?php
// Fonction pour générer un tableau HTML à partir d'un tableau de données
function generateTable($data) {
    if (empty($data)) {
        return "<p>Aucune donnée disponible.</p>";
    }

    // Récupère les clés du premier élément du tableau pour créer les en-têtes du tableau
    $headers = array_keys($data[0]);

    // Commence la construction du tableau HTML
    $table = "<table>";

    // Ajoute la ligne d'en-têtes
    $table .= "<tr>";
    foreach ($headers as $header) {
        $table .= '<th class="text-center bg-primary">' ."$header". '</th>';
    }
    $table .= '<th class="text-center bg-primary">Actions</th>'; // Nouvelle colonne pour les actions
    $table .= "</tr>";

    // Ajoute les lignes de données
    foreach ($data as $row) {
        $table .= "<tr>";
        foreach ($row as $value) {
            $table .= "<td>$value</td>";
        }

        // Ajoute les boutons d'action pour chaque ligne
        $table .= "<td>";
        $table .= '<button class="btn btn-primary"><i class="fas fa-eye"></i></button>';
        $table .= '<button class="btn btn-warning"><i class="fas fa-edit"></i></button>';
        $table .= '<button class="btn btn-danger"><i class="fas fa-trash"></i></button>';
        $table .= '';
        $table .= "</td>";
        $table .= "</tr>";
    }

    // Termine la construction du tableau HTML
    $table .= "</table>";

    return $table;
}
?>

<?php
// ...

// Fonction pour récupérer les lignes de menu
function getLigneMenu() {
    $dbHost = 'localhost'; // Remplacez par l'hôte de votre base de données
    $dbName = 'MaCantine_Scolaire'; // Remplacez par le nom de votre base de données
    $dbUser = 'root'; // Remplacez par le nom d'utilisateur de votre base de données
    $dbPass = ''; // Remplacez par le mot de passe de votre base de données

    // Connexion à la base de données
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);

    // Requête SQL pour récupérer les lignes de menu
    $sql = "SELECT ID_plat, ID_menu, Date_jour FROM LIGNE_MENU";

    // Exécution de la requête
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Récupération des résultats
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fermeture de la connexion
    $conn = null;

    return $result;
}

// ...

// Exemple d'utilisation
$ligneMenu = getLigneMenu();

// Parcours des résultats
foreach ($ligneMenu as $ligne) {
    $ID_plat = $ligne['ID_plat'];
    $ID_menu = $ligne['ID_menu'];
    $Date_jour = $ligne['Date_jour'];

    // Faites ce que vous voulez avec les valeurs récupérées
    // Par exemple, vous pouvez les afficher ou les utiliser pour d'autres traitements
    echo "ID_plat: $ID_plat, ID_menu: $ID_menu, Date_jour: $Date_jour<br>";
}

// ...
?>
</body>
</html>