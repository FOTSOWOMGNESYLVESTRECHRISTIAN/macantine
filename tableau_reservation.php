<!DOCTYPE html>
<html>
<head>
    <title>Réservation de la cantine</title>
</head>
<body>
    <h1>Menus et plats</h1>

    <table>
        <thead>
            <tr>
                <th>Menu</th>
                <th>Plat</th>
                <th>Réservation</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Menu 1</td>
                <td>Plat 1</td>
                <td><input type="checkbox" name="reservation[]" value="plat1"></td>
            </tr>
            <tr>
                <td>Menu 1</td>
                <td>Plat 2</td>
                <td><input type="checkbox" name="reservation[]" value="plat2"></td>
            </tr>
            <tr>
                <td>Menu 2</td>
                <td>Plat 3</td>
                <td><input type="checkbox" name="reservation[]" value="plat3"></td>
            </tr>
            <!-- Ajoutez davantage de lignes pour les autres plats -->
        </tbody>
    </table>

    <button type="button" onclick="validerReservation()">Valider la réservation</button>

    <script src="../MaCantine_Scolaire/script/tableau_reservation.js"></script>
</body>
</html>