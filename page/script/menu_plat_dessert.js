// Fonction pour mettre à jour l'heure toutes les secondes
function updateClock() {
    var currentTime = new Date();
    var currentHour = currentTime.getHours();
    var currentMinute = currentTime.getMinutes();
    var currentSecond = currentTime.getSeconds();

    // Ajoute un zéro devant les chiffres de l'heure, des minutes et des secondes si nécessaire
    currentHour = (currentHour < 10 ? "0" : "") + currentHour;
    currentMinute = (currentMinute < 10 ? "0" : "") + currentMinute;
    currentSecond = (currentSecond < 10 ? "0" : "") + currentSecond;

    var currentTimeString = "Heure actuelle au Cameroun : " + currentHour + ":" + currentMinute + ":" + currentSecond;

    // Met à jour l'élément HTML avec l'heure actuelle
    document.getElementById("current-time").innerHTML = currentTimeString;
}

// Met à jour l'heure toutes les secondes
setInterval(updateClock, 1000);

// Appelle la fonction updateClock dès que la page est chargée
window.onload = updateClock;


// Fonction pour charger les icônes Font Awesome
function loadFontAwesome() {
var script = document.createElement('script');
script.src = 'fontawesome-free-6.4.2-web/js/all.min.js';
document.head.appendChild(script);
}

// Fonction pour générer les boutons d'action pour chaque ligne du tableau
function generateActionButtons() {
var buttons = '';
buttons += '<button class="btn btn-primary"><i class="fas fa-eye"></i> Vue</button>';
buttons += '<button class="btn btn-warning"><i class="fas fa-edit"></i> Modifier</button>';
buttons += '<button class="btn btn-danger"><i class="fas fa-trash"></i> Supprimer</button>';
buttons += '<button class="btn btn-secondary"><i class="fas fa-print"></i> Imprimer</button>';
return buttons;
}

// Attache le gestionnaire d'événements au bouton "Ajouter un menu"
document.addEventListener('DOMContentLoaded', function() {
// Charge les icônes Font Awesome
loadFontAwesome();

// Ajoute le gestionnaire d'événements pour le bouton "Ajouter un menu"
var btnAddMenu = document.querySelector('.btn-add-menu');
btnAddMenu.addEventListener('click', addMenu);

// Ajoute les boutons d'action pour chaque ligne du tableau
var actionButtons = document.querySelectorAll('.action-buttons');
actionButtons.forEach(function(buttons) {
    buttons.innerHTML = generateActionButtons();
});
});