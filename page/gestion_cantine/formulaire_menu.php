<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un menu</title>
    <link rel="stylesheet" href="../style/formulaire_menu.css">
</head>
<body>
       
    <form action="ajouter_menu.php" method="POST">
        <label><h2>Ajouter un menu</h2></label><br>
        <label for="libelle">Libellé du menu :</label>
        <input type="text" id="libelle" name="libelle" required>
        <br><br>
        <label for="date_menu">Date du menu :</label>
        <input type="date" id="date_menu" name="date_menu" required>
        <br><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>