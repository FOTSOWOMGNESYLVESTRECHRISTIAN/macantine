document.addEventListener("DOMContentLoaded", function() {
  var today = new Date();
  var formattedToday = today.toLocaleDateString();
  document.getElementById("reservation-date").innerText = formattedToday;
});