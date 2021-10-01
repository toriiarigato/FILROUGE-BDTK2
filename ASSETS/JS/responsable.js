//Initialisation des variables
var deco = document.getElementById("deconnexion");
var fillNom = document.getElementById("idConnecté");
var newEntry = document.getElementById("btnradio1");
var addEx = document.getElementById("btnradio2");
var delEx = document.getElementById("btnradio3");
var newEntryDiv = document.getElementById("newEntryDiv");
var addExDiv = document.getElementById("addExDiv");
var delExDiv = document.getElementById("delExDiv");
var lettreRappel = document.getElementById("lettreRappel");

//Abonnements

deco.addEventListener("click", deconnexion);
newEntry.addEventListener("click", showEntry);
addEx.addEventListener("click", showAdd);
delEx.addEventListener("click", showDel);
lettreRappel.addEventListener("click", envoiLettre);

//Fonctions

/**
 * Function qui nettoire le localStorage à la deconnexion
 */
function deconnexion() {
    localStorage.clear();
}

/**
 * 
 * @returns le nom et prénom de la personne qui se connecte via la page login.html
 */
function donneNom() {
    var nom = localStorage.getItem("nom");
    var prenom = localStorage.getItem("prenom")
    var role = localStorage.getItem("role");
    fillNom.innerHTML += "</br>" + nom + " " + prenom + "</br>" + role;
    return;
}
donneNom();

/**
 * Permet d'afficher la div de nouvelle entrée au click et de cacher les autres
 */
function showEntry() {
    newEntryDiv.classList.replace("d-none", "d-flex")
    addExDiv.classList.replace("d-flex", "d-none")
    delExDiv.classList.replace("d-flex", "d-none")
}

/**
 * Permet d'afficher la div de nouvel exemplaire au click et de cacher les autres
 */
function showAdd() {
    newEntryDiv.classList.replace("d-flex", "d-none")
    addExDiv.classList.replace("d-none", "d-flex")
    delExDiv.classList.replace("d-flex", "d-none")
}

/**
 * Permet d'afficher la div de suppression d'exemplaire au click et de cacher les autres
 */
function showDel() {
    newEntryDiv.classList.replace("d-flex", "d-none")
    addExDiv.classList.replace("d-flex", "d-none")
    delExDiv.classList.replace("d-none", "d-flex")
}
/**
 * Envoi une alerte qui mentionne que les lettres de rappel sont envoyées
 */
function envoiLettre() {
    alert("Les lettres de rappel ont été envoyés");
}