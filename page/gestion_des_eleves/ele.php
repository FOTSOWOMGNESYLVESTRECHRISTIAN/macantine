<!DOCTYPE html>
<html>
<head>
  <title>Informations des élèves et des menus</title>
  <link rel="stylesheet" href="../bootstrap-5.3.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style/style.css">
  
</head>
<body>
  <h2 class="text-center">Informations des élèves et des menus</h2>
  <div class="container">
    <div class="col-md-12">
      <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th colspan="2" rowspan="2" class="text-center bg-primary">Information de l'élève</th>
            <th colspan="9" class="text-center bg-primary">Menu du <?php echo date('d/m/Y'); ?></th>
          </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="2"></td>
            <td colspan="6" class="text-center bg-success"><b>Liste des plats</b></td>
            <td colspan="3" class="text-center bg-success"><b>Liste des Desserts</b></td>
          </tr>
          <tr>
            <td>Nom</td>
            <td>John</td>
            <td colspan="2">Plat 1</td>
            <td colspan="2">Plat 2</td>
            <td colspan="2">Plat 3</td>
            <td colspan="3">Dessert</td>
          </tr>
          <tr>
              <td>Prénom</td>
              <td>Doe</td>
              <td colspan="2"><input type="checkbox"> Nom du plat 1</td>
              <td colspan="2"><input type="checkbox"> Nom du plat 2</td>
              <td colspan="2"><input type="checkbox"> Nom du plat 3</td>
              <td colspan="3"><input type="checkbox"> Dessert 1 <p>Description du Dessert ici</p></td>
          </tr>
          <tr>
              <td>Classe</td>
              <td>9A</td>
              <td colspan="2">Description du plat ici</td>
              <td colspan="2">Description du plat ici</td>
              <td colspan="2">Description du plat ici</td>
              <td colspan="3"><input type="checkbox"> Dessert 2 <p>Description du Dessert ici</p></td>
          </tr>
          
          <tr>
            <td rowspan="2" colspan="2"></td>
            <td>Entrée</td>
            <td>Plat principal</td>
            <td>Entrée</td>
            <td>Plat principal</td>
            <td>Entrée</td>
            <td>Plat principal</td>
            <td colspan="3"><input type="checkbox"> Dessert 3 <p>Description du Dessert ici</p></td>
          </tr>
          <tr>
            
            
            <td>Entrée du plat ici</td>
            <td>Plat principal ici</td>
            <td>Entrée du plat ici</td>
            <td>Plat principal ici</td>
            <td>Entrée du plat ici</td>
            <td>Plat principal ici</td>
            <td colspan="3"><input type="checkbox"> Dessert 4 <p>Description du Dessert ici</p></td>
          </tr>
      </tbody>
      </table>
    </div>
    
    <div class="col-md-12 d-flex justify-content-end">
      <button class="btn btn-primary reservation-button">Réserver</button>
    </div>
  </div>
  <?php include("../gestion_des_eleves/reservation.php")?>
  <script src="../bootstrap-5.3.2-dist/js/bootstrap.min.js"></script>
</body>
</html>