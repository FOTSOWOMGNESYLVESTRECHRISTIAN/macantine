<!DOCTYPE html>
<html>
<head>
  <title>Liste des élèves ayant réservé des plats</title>
  <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/reservation.css">
  <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/all.min.css">
  <script src="../script/reservation_eleve.js"></script>
</head>
<body>
  <h2 class="text-center">Reservation du- <span id="reservation-date"></span></h2>
  <div class="container">
    <table class="table table-bordered">
      <thead class="thead-light">
        <tr>
          <th class="text-center bg-primary">Nom</th>
          <th class="text-center bg-primary">Prénom</th>
          <th class="text-center bg-primary">Classe</th>
          <th class="text-center bg-primary">Entrée</th>
          <th class="text-center bg-primary">Plat principal</th>
          <th class="text-center bg-primary">Dessert</th>
          <th class="text-center bg-primary">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John</td>
          <td>Doe</td>
          <td>9A</td>
          <td>Entrée du plat ici</td>
          <td>Plat principal ici</td>
          <td>Dessert ici</td>
          <td>
            <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
            <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
          </td>
        </tr>
        <!-- Ajoutez davantage de lignes pour les autres élèves réservant des plats -->
      </tbody>
    </table>
  </div>
  <script src="../bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>
</html>