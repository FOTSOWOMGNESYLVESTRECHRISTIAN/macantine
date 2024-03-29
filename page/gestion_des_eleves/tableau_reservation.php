<!DOCTYPE html>
<html>
<head>
  <title>Informations des élèves et des menus</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }
    
    th, td {
      border: 1px solid black;
      padding: 8px;
    }
    
    th {
      background-color: #f2f2f2;
    }
    
    .reservation-button {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h2>Informations des élèves et des menus</h2>
  <table>
    <tr>
      <th>Information de l'élève</th>
      <th>Menu du</th>
    </tr>
    <tr>
      <td>Plat 1</td>
      <td></td>
    </tr>
    <tr>
      <td>Description du plat</td>
      <td colspan="2"></td>
    </tr>
    <tr>
      <td>Entrée</td>
      <td></td>
    </tr>
    <tr>
      <td>Plat principal</td>
      <td></td>
    </tr>
    <tr>
      <td>Dessert</td>
      <td></td>
    </tr>
  </table>
  <button class="reservation-button">Réserver le plat</button>
</body>
</html>