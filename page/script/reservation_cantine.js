document.addEventListener("DOMContentLoaded", function() {
    var today = new Date();
    var yesterday = new Date(today);
    yesterday.setDate(yesterday.getDate() - 1);
    var formattedYesterday = yesterday.toLocaleDateString();
    document.getElementById("reservation-date-yesterday").innerText = formattedYesterday;

    var formattedToday = today.toLocaleDateString();
    document.getElementById("reservation-date-today").innerText = formattedToday;

    var tableYesterday = document.getElementById("table-yesterday");
    var tableToday = document.getElementById("table-today");

    if (yesterday < today) {
      tableYesterday.classList.add("table-transparent");
    }

    // Vos réservations ici (remplacez le contenu des tableaux par vos données)
    var reservationsYesterday = [
      {
        nom: "Doe",
        prenom: "John",
        classe: "9A",
        entree: "Entrée du plat ici",
        platPrincipal: "Plat principal ici",
        dessert: "Dessert ici"
      },
      // Ajoutez davantage de réservations pour le jour précédent
    ];

    var reservationsToday = [
      {
        nom: "Smith",
        prenom: "Jane",
        classe: "10B",
        entree: "Entrée du plat ici",
        platPrincipal: "Plat principal ici",
        dessert: "Dessert ici"
      },
      // Ajoutez davantage de réservations pour le jour actuel
    ];

    // Fonction pour générer les lignes du tableau
    function generateTableRows(reservations, tableId) {
      var table = document.getElementById(tableId);
      var tbody = table.querySelector("tbody");

      reservations.forEach(function(reservation) {
        var row = document.createElement("tr");
        row.innerHTML = `
          <td>${reservation.nom}</td>
          <td>${reservation.prenom}</td>
          <td>${reservation.classe}</td>
          <td>${reservation.entree}</td>
          <td>${reservation.platPrincipal}</td>
          <td>${reservation.dessert}</td>
          <td>
            <button class="btn btn-primary"><i class="fas fa-eye"></i></button>
            <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-secondary"><i class="fas fa-print"></i></button>
          </td>
        `;
        tbody.appendChild(row);
      });
    }

    // Générer les lignes du tableau pour le jour précédent
    generateTableRows(reservationsYesterday, "table-yesterday");

    // Générer les lignes du tableau pour le jour actuel
    generateTableRows(reservationsToday, "table-today");
  });