<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire de menu</title>
    <link rel="stylesheet" href="../style/formulaire_de_reservation.css">
</head>
<body>
    <h2>Ajouter un nouveau menu</h2>
    <form method="POST" action="traitement_formulaire.php">
        <label for="libelle_menu">Libellé du menu :</label>
        <input type="text" id="libelle_menu" name="libelle_menu" required><br><br>

        <label for="nom_plat">Nom du plat :</label>
        <input type="text" id="nom_plat" name="nom_plat" required><br><br>

        <label for="description_plat">Description du plat :</label>
        <textarea id="description_plat" name="description_plat" required></textarea>

        <div class="form2">
            <label for="entree">Entrée :</label>
            <input type="text" id="entree" name="entree" required><br><br>

            <label for="description_entree">Description de l'entrée :</label>
            <textarea id="description_entree" name="description_entree" required></textarea>
        </div>
        <div class="form3">
            <label for="entree">Plat principale :</label>
            <input type="text" id="entree" name="entree" required><br><br>
        
            <label for="description_entree">Description du plat principale :</label>
            <textarea id="description_entree" name="description_entree" required></textarea><br><br>
        </div>

        <label for="nom_dessert">Nom du dessert :</label>
        <input type="text" id="nom_dessert" name="nom_dessert" required><br><br>

        <label for="description_entree">Description du dessert :</label>
        <textarea id="description_entree" name="description_entree" required></textarea><br><br>

        <input type="submit" value="Ajouter le menu">
    </form>
</body>
</html>