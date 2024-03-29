<!DOCTYPE html>
<html>
<head>
  <title>Liste des élèves ayant réservé des plats</title>
  <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/reservation.css">
  <link rel="stylesheet" href="../fontawesome-free-6.4.2-web/css/all.min.css">
  
  <script src="../script/reservation_cantine.js"></script>
</head>
<body>
  <h2 class="text-center">Liste des élèves ayant réservé des plats</h2>
  <h3 class="text-center">Date de réservation du jour précédent : <span id="reservation-date-yesterday"></span></h3>
  <div class="container">
    <table id="table-yesterday" class="table table-bordered">
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
        <!-- Les lignes du tableau pour le jour précédent seront générées dynamiquement ici -->
      </tbody>
    </table>
  </div>

  <h3 class="text-center">Date de réservation du jour actuel : <span id="reservation-date-today"></span></h3>
  <div class="container">
    <table id="table-today" class="table table-bordered">
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
        <!-- Les lignes du tableau pour le jour actuel seront générées dynamiquement ici -->
      </tbody>
    </table>
  </div>
  
  <script src="../bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>
</html>