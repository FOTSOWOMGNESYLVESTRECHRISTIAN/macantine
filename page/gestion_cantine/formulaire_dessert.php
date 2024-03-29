<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter un dessert</title>
    <link rel="stylesheet" href="../style/formulaire_dessert.css">
</head>
<body>
    
    <form action="ajouter_dessert.php" method="POST">
        <label><h2>Ajouter un dessert</h2></label><br>
        <label for="Nom_dessert">Nom du dessert :</label>
        <input type="text" id="Nom_dessert" name="Nom_dessert" required>
        <br><br>
        <label for="Description_dessert">Description du dessert :</label>
        <textarea id="Description_dessert" name="Description_dessert" required></textarea>
        <br><br>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>