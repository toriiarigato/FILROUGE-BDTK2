//Initialisation des variables

var fillNom = document.getElementById("idConnecté");
var emprunt = document.getElementById("btnradio1");
var retour = document.getElementById("btnradio2");
var newAd = document.getElementById("btnradio3");
var empruntDiv = document.getElementById("empruntDiv");
var retourDiv = document.getElementById("retourDiv");
var newadDiv = document.getElementById("newadDiv");
var numAdherent = document.getElementById("numAdherent");
var btnRechercheAd = document.getElementById("rechercheAd");
var isbn = document.getElementById("addISBN");
var btnValider = document.getElementById("valider");
var title = document.getElementById("titre");
var etat = document.getElementById("etat");
var erreurAd = document.getElementById("noAd");
var erreurISBN = document.getElementById("noISBN");
var checkAd = false;
var checkISBN = false;
var apercu = document.getElementById("apercu");
var selectAd = document.getElementById("select");
var choixAd = document.getElementById("choixadherent");
var divISBN = document.getElementById("ISBN");
var selectBD = document.getElementById("selectBD");
var btnRetour = document.getElementById("retour");
var flagBD = false;
var btnErreurBD = document.getElementById("erreurBD");
var maDate = new Date();
var jourMois = maDate.getDate();
var mois = maDate.getMonth() + 1;
var annee = maDate.getFullYear();
var flagAd = false;

// Abonnements

emprunt.addEventListener("click", showEmprunt);
retour.addEventListener("click", showRetour);
newAd.addEventListener("click", showNewad);
btnRechercheAd.addEventListener("click", checkNumAd);
btnRechercheAd.addEventListener("click", showAd);
btnValider.addEventListener("click", checkNumISBN);
btnValider.addEventListener("click", showBD);
selectAd.addEventListener("click", showISBN);
selectBD.addEventListener("click", confirmEmprunt);
btnRetour.addEventListener("click", retourDebut);
btnErreurBD.addEventListener("click", retourDebut);

//Fonction

// function retourErreurBD (){

// }

function retourDebut() {
    choixAd.classList.remove("d-none");
    divISBN.classList.add("d-none");
    btnRetour.classList.replace("d-flex", "d-none");
    numAdherent.value = "";
    apercu.innerText = "";
    checkAd = false;
    // isbn.removeAttribute("disabled", "");
    // btnValider.removeAttribute("disabled", "");
    btnErreurBD.classList.replace("d-flex", "d-none");
    selectBD.classList.replace("d-flex", "d-none");
    isbn.value = "";
    flagAd = false;

}

function confirmEmprunt() {
    alert("Emprunt confirmé");
    for (var [key, value] of albums) {
        var numSerie = `${value.idSerie}`;
        var numAlbum = `${value.numero}`;
        var titreAlbum = `${value.titre}`;
        if (key == isbn.value) {
            isbn = titreAlbum;
            var serieN = series.get(numSerie).nom;
            console.log(isbn);
        }
    }
    for (var [key, value] of users) {
        var numAd = `${value.numero}`;
        var avatar = `${value.avatar}`;
        var nom = `${value.nom}`;
        var prenom = `${value.prenom}`;
        var adresse = `${value.adresse}`;
        var cotisation = `${value.cotisation}`;
        var emprunt1 = `${value.emprunt1}`;
        var dateEmprunt1 = `${value.dateEmprunt1}`;

        var apercu = document.getElementById("apercu");
        if (checkAd == true && numAd.includes(numAdherent.value)) {
            apercu.innerHTML =
                "<div><img src=" +
                avatar +
                ' alt=" " srcset=" "></div><br><div class="border p-3"><p class="text-decoration-underline">Nom :</p><p>' +
                nom +
                '</p><p class="text-decoration-underline">Prénom :</p><p>' +
                prenom +
                '</p></p><p class="text-decoration-underline">Adresse :</p><p>' +
                adresse +
                '</p></div><div><p class="text-decoration-underline">Cotisations valables jusqu\'au : ' +
                cotisation +
                "</div><div><p>Emprunts : </p><ul><li>" +
                emprunt1 +
                "</li></ul><p>Empruntée le : " +
                dateEmprunt1 +
                "</p><ul><li>" +
                isbn +
                " / " +
                serieN +
                "/ code ex : 02 </li></ul><p> Empruntée le: " +
                jourMois +
                "/0" +
                mois +
                "/" +
                annee +
                "</p>";

        }
        selectBD.classList.replace("d-flex", "d-none");
        btnRetour.classList.replace("d-none", "d-flex");
        btnErreurBD.classList.replace("d-flex", "d-none");
        divISBN.classList.add("d-none");
        flagAd = false;


    }
}

function showBD() {
    apercu.innerHTML = "";
    selectAd.classList.replace("d-flex", "d-none");
    for (var [key, value] of albums) {
        var numSerie = `${value.idSerie}`;
        var numAlbum = `${value.numero}`;
        var titreAlbum = `${value.titre}`;
        var numAuteur = `${value.idAuteur}`;
        var prixAlbum = `${value.prix}`;
        if (key == isbn.value) {
            apercu.innerHTML +=
                '<div class="border p-3"><img src ="../albumsMini/' +
                series.get(numSerie).nom +
                "-" +
                numAlbum +
                "-" +
                titreAlbum +
                '.jpg "alt=" " srcset=" "><br><p class="text-decoration-underline">Numéro ISBN : </p><p>' +
                numAlbum +
                '</p><p class="text-decoration-underline">Titre :</p><p>' +
                titreAlbum +
                '</p><p class="text-decoration-underline">Série :</p><p>' +
                series.get(numSerie).nom +
                "</p></div><p>Exemplaires restants : 02</p>";
            flagBD = true;
        }

        // isbn.setAttribute("disabled", "");
        // btnValider.setAttribute("disabled", "");
    }
    if (flagBD == false) {
        apercu.innerHTML =
            '<p class="text-danger">Saisie incorrecte ou référence inconnue</p>';
        selectBD.classList.replace("d-flex", "d-none");
    } else {
        selectBD.classList.replace("d-none", "d-flex");
        flagBD = false;
    }
    btnErreurBD.classList.replace("d-none", "d-flex");
}

/**
 * Affiche
 */
function showISBN() {
    isbn.value = "";
    divISBN.classList.remove("d-none");
    choixAd.classList.add("d-none");
}

/**
 * Affiche l'aperçu de la fiche adhérent sur la colonne de droite en utilisant les informations contenues dans la data users
 */
function showAd() {
    for (var [key, value] of users) {
        var numAd = `${value.numero}`;
        var avatar = `${value.avatar}`;
        var nom = `${value.nom}`;
        var prenom = `${value.prenom}`;
        var adresse = `${value.adresse}`;
        var cotisation = `${value.cotisation}`;
        var emprunt1 = `${value.emprunt1}`;
        var dateEmprunt1 = `${value.dateEmprunt1}`;

        var apercu = document.getElementById("apercu");
        if (checkAd == true && numAd.includes(numAdherent.value)) {
            apercu.innerHTML =
                "<div><img src=" +
                avatar +
                ' alt=" " srcset=" "></div><br><div class="border p-3"><p class="text-decoration-underline">Nom :</p><p>' +
                nom +
                '</p><p class="text-decoration-underline">Prénom :</p><p>' +
                prenom +
                '</p></p><p class="text-decoration-underline">Adresse :</p><p>' +
                adresse +
                '</p></div><div><p class="text-decoration-underline">Cotisations valables jusqu\'au : ' +
                cotisation +
                "</div><div><p>Emprunts : </p><ul><li>" +
                emprunt1 +
                "</li></ul><p>Empruntée le : " +
                dateEmprunt1 +
                "</p>";
            flagAd = true;
            selectAd.classList.replace("d-none", "d-flex");
        }
        if (flagAd == false) {
            apercu.innerHTML =
                '<p class="text-danger">Saisie incorrecte ou Adhérent inconnu</p>';

        }


    }
}

/**
 * Contrôle de champ du numéro ISBN
 */
function checkNumISBN() {
    if (isbn.value == "") {
        erreurISBN.innerHTML = "Champ Obligatoire";
        isbn.setAttribute("class", "invalid");
    } else if (isNaN(isbn.value) && isbn.value.length > 0) {
        erreurISBN.innerHTML = "Veuillez saisir des chiffres";
        isbn.setAttribute("class", "invalid");
    } else if (isbn.value.length > 3 || isbn.value.length < 1) {
        erreurISBN.innerHTML = "Veuillez saisir entre 1 et 3 caractères";
        isbn.setAttribute("class", "invalid");
    } else {
        erreurISBN.innerHTML = "";
        isbn.setAttribute("class", "valid");
        checkAd = true;
    }
}

/**
 * Contrôle de champ du numéro d'adhérent
 */
function checkNumAd() {
    if (numAdherent.value == "") {
        erreurAd.innerHTML = "Champ Obligatoire";
        numAdherent.setAttribute("class", "invalid");
    } else if (isNaN(numAdherent.value) && numAdherent.value.length > 0) {
        erreurAd.innerHTML = "Veuillez saisir des chiffres";
        numAdherent.setAttribute("class", "invalid");
    } else if (numAdherent.value.length > 6 || numAdherent.value.length < 6) {
        erreurAd.innerHTML = "Veuillez saisir 6 caractères";
        numAdherent.setAttribute("class", "invalid");
    } else {
        erreurAd.innerHTML = "";
        numAdherent.setAttribute("class", "valid");
        checkAd = true;
    }
}

/**
 *
 * @returns le nom et prénom de la personne qui se connecte via la page login.html
 */
function donneNom() {
    var nom = localStorage.getItem("nom");
    var prenom = localStorage.getItem("prenom");
    var role = localStorage.getItem("role");
    fillNom.innerHTML += "</br>" + nom + " " + prenom + "</br>" + role;
    return;
}
donneNom();

/**
 * Affiche la partie emprunt à l'écran et cache les autres
 */
function showEmprunt() {
    empruntDiv.classList.replace("d-none", "d-flex");
    retourDiv.classList.replace("d-flex", "d-none");
    newadDiv.classList.replace("d-flex", "d-none");
}

/**
 * Affiche la partie retour à l'écran et cache les autres
 */
function showRetour() {
    empruntDiv.classList.replace("d-flex", "d-none");
    retourDiv.classList.replace("d-none", "d-flex");
    newadDiv.classList.replace("d-flex", "d-none");
}

/**
 * Affiche la partie nouvel adhérent à l'écran et cache les autres
 */
function showNewad() {
    empruntDiv.classList.replace("d-flex", "d-none");
    retourDiv.classList.replace("d-flex", "d-none");
    newadDiv.classList.replace("d-none", "d-flex");
}