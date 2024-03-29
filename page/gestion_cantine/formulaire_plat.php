<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un plat</title>
    <link rel="stylesheet" type="text/css" href="../style/formulaire_plat.css">
</head>
<body>
    
        <form action="ajouter_plat.php" method="POST" class="plat-form">
            <label><h2>Ajouter un plat</h2></label><br>
            <label for="Nom_plat">Nom du plat :</label>
            <input type="text" id="Nom_plat" name="Nom_plat" required>
            <br><br>
            <label for="Description">Description du plat :</label>
            <textarea id="description" name="Description" required></textarea>
            <br><br>
            <label for="Plat_principale">Plat principal :</label>
            <input type="text" id="Plat_principale" name="Plat_principale" required>
            <br><br>
            <label for="Entree">Entrée du plat :</label>
            <input type="text" id="Entree" name="Entree" required>
            <br><br>
            <input type="submit" value="Ajouter">
        </form>
    
</body>
</html>