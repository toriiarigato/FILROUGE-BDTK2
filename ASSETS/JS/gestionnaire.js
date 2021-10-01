// Initialisation des variables

var fillNom = document.getElementById("idConnecté");
var newEntry = document.getElementById("btnradio1");
var addEx = document.getElementById("btnradio2");
var delEx = document.getElementById("btnradio3");
var newEntryDiv = document.getElementById("newEntryDiv");
var addExDiv = document.getElementById("addExDiv");
var delExDiv = document.getElementById("delExDiv");
var colonne3 = document.getElementById("colonne3");
var colonne4 = document.getElementById("colonne4");
var colonne5 = document.getElementById("colonne5");
var deco = document.getElementById("deconnexion");
var addTitre = document.getElementById("addTitre");
var addAuteur = document.getElementById("addAuteur");
var addAuteur2 = document.getElementById("addAuteur2");
var addDate = document.getElementById("addDate");
var addEdit = document.getElementById("addEdit");
var addISBN = document.getElementById("addISBN");
var addSerie = document.getElementById("addSerie");
var addSerie2 = document.getElementById("addSerie2");
var addPic = document.getElementById("addPic");
var addRes = document.getElementById("addRes");
var apercu = document.getElementById("apercu");
var subEntree = document.getElementById("subEntree");
var newAuteur = document.getElementById("newAuteur");
var annuleAuteur = document.getElementById("annuleAuteur");
var divAuteur = document.getElementById("divAuteur");
var newSerie = document.getElementById("newSerie");
var annuleSerie = document.getElementById("annuleSerie");
var divSerie = document.getElementById("divSerie");
var refISBN = document.getElementById("refISBN");
var noISBN2 = document.getElementById("noISBN2");
var noISBN3 = document.getElementById("noISBN3");
var checkRefISBN = document.getElementById("checkRefISBN");
var codeEx = document.getElementById("codeEx");
var rayon = document.getElementById("rayon");
var etagere = document.getElementById("etagere");
var exSub = document.getElementById("exSub");
var addExDiv = document.getElementById("addExDiv");
var exDispo = document.getElementById("exDispo");
var refISBNDel = document.getElementById("refISBNDel");
var codeExDel = document.getElementById("codeExDel");
var checkRefISBNDel = document.getElementById("checkRefISBNDel");
var exSubDel = document.getElementById("exSubDel");

var pTitre = document.getElementById("pTitre");
var pAuteur = document.getElementById("pAuteur");
var pDate = document.getElementById("pDate");
var pEdit = document.getElementById("pEdit");
var pISBN = document.getElementById("pISBN");
var pSerie = document.getElementById("pSerie");
var pPic = document.getElementById("pPic");
var pRes = document.getElementById("pResume");
var noISBN = document.getElementById("noISBN");
var iFlag = false;
var bdFlag = false;
var exFlag = false;
var rFlag = false;
var eFlag = false;
var confFlag = false;
var bDelFlag = false;
var exDelFlag = false;
var delFlag = false;
var auteurFlag = false;
var serieFlag = false;


// Abonnements

deco.addEventListener("click", deconnexion);

// ---------------------------------------------------------- ABONNEMENTS DE LA DIV NOUVELLE ENTREE  ----------------------------------------------------------
newEntry.addEventListener("click", showEntry);
addEx.addEventListener("click", showAdd);
delEx.addEventListener("click", showDel);
addAuteur.addEventListener("change", changeCouleurAuteur);
addSerie.addEventListener("change", changerCouleurSerie);
subEntree.addEventListener("click", confirmer);
apercu.addEventListener("click", showApercu);
addISBN.addEventListener("keyup", checkNumISBN);
newAuteur.addEventListener("click", nouvelAuteur);
annuleAuteur.addEventListener("click", backAuteur);
// addAuteur2.addEventListener("keyup", checkAuteur);
newSerie.addEventListener("click", nouvelleSerie);
annuleSerie.addEventListener("click", backSerie);
// addSerie2.addEventListener("keyup", checkSerie);

// ---------------------------------------------------------- ABONNEMENTS DE LA DIV AJOUT EXEMPLAIRE  ----------------------------------------------------------
refISBN.addEventListener("keyup", checkISBNEx);
checkRefISBN.addEventListener("click", showBD);
codeEx.addEventListener("keyup", checkCodeEx);
rayon.addEventListener("keyup", checkRayon);
etagere.addEventListener("keyup", checkEtag);
exSub.addEventListener("click", confEx);

// ---------------------------------------------------------- ABONNEMENTS DE LA DIV SUPPRIMER EXEMPLAIRE  ------------------------------------------------------
refISBNDel.addEventListener("keyup", checkISBNSupp);
checkRefISBNDel.addEventListener("click", showBDDel);
codeExDel.addEventListener("keyup", checkCodeExDel);
exSubDel.addEventListener("click", confExDel);

donneNom();

//Fonctions

/**
 * Function qui nettoire le localStorage à la deconnexion
 */
function deconnexion() {
    localStorage.clear();
}

// ---------------------------------------------------------- FONCTIONS DE LA DIV NOUVELLE ENTREE  ----------------------------------------------------------
// Boucles qui gèrent la recherche d'auteurs et de series dans les menus déroulants

for (var [key, value] of auteurs) {
    var nomAuteur = `${value.nom}`;

    var filtreAuteurs = (addAuteur.innerHTML += '<option value="' + key + '" id="filtreAuteurs"><label class="form-check-label" for="filtreAuteurs">' + nomAuteur + ' </label></option>');
}

for (var [key, value] of series) {
    var nomSerie = `${value.nom}`;

    var filtreSeries = (addSerie.innerHTML += '<option value="' + key + '" id="filtreSerie"><label class="form-check-label" for="filtreSerie">' + nomSerie + ' </label></option>');
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

/**
 * Permet d'afficher la div de nouvelle entrée au click et de cacher les autres
 */
function showEntry() {
    newEntryDiv.classList.replace("d-none", "d-flex")
    addExDiv.classList.replace("d-flex", "d-none")
    delExDiv.classList.replace("d-flex", "d-none")
    colonne3.style.visibility = "hidden"
    colonne4.style.visibility = "hidden"
    colonne5.style.visibility = "hidden"
}

/**
 * Permet d'afficher la div de nouvel exemplaire au click et de cacher les autres
 */
function showAdd() {
    newEntryDiv.classList.replace("d-flex", "d-none")
    addExDiv.classList.replace("d-none", "d-flex")
    delExDiv.classList.replace("d-flex", "d-none")
    colonne3.style.visibility = "hidden"
    colonne4.style.visibility = "hidden"
    colonne5.style.visibility = "hidden"
}

/**
 * Permet d'afficher la div de suppression d'exemplaire au click et de cacher les autres
 */
function showDel() {
    newEntryDiv.classList.replace("d-flex", "d-none")
    addExDiv.classList.replace("d-flex", "d-none")
    delExDiv.classList.replace("d-none", "d-flex")
    colonne3.style.visibility = "hidden"
    colonne4.style.visibility = "hidden"
    colonne5.style.visibility = "hidden"
}

/**
 * Permet d'enregistrer les informations saisies dans le local storage pour simuler un ajout de bd
 */
function confirmer(e) {
    var bFlag = false;
    if (addTitre.value.length < 1 || addAuteur.length < 1 || addDate.value.length < 1 || addEdit.value.length < 1 || addISBN.value.length < 1 || addPic.value.length < 1 || addRes.value.length < 1) {
        bFlag = false;
        e.preventDefault();
        alert("Veuillez remplir les champs obligatoires");
    } else if (iFlag == false) {
        e.preventDefault();
        alert("Veuillez choisir un ISBN valide");
    } else {
        bFlag = true;
    }

    if (bFlag == true) {
        localStorage.setItem("Titre", addTitre.value);
        var titre = localStorage.getItem("Titre");

        for (var [key, value] of auteurs) {

            localStorage.setItem("Auteur", addAuteur.value);
            localStorage.setItem("Auteur2", addAuteur2.value);
            var auteur = localStorage.getItem("Auteur");
            var auteur2 = localStorage.getItem("Auteur2");

            if (auteur == key) {
                var nomAuteur = `${value.nom}`;
                break;
            } else nomAuteur = auteur2
        }

        localStorage.setItem("Date", addDate.value);
        var date = localStorage.getItem("Date");

        localStorage.setItem("Edition", addEdit.value);
        var edition = localStorage.getItem("Edition");

        localStorage.setItem("ISBN", addISBN.value);
        var isbn = localStorage.getItem("ISBN");

        for (var [key, value] of series) {

            localStorage.setItem("Serie", addSerie.value);
            localStorage.setItem("Serie2", addSerie2.value);
            var serie = localStorage.getItem("Serie");
            var serie2 = localStorage.getItem("Serie2");

            if (serie == key) {
                var nomSerie = `${value.nom}`;
                break;
            } else nomSerie = serie2;


        }
        alert("Vous venez d'ajouter " + titre + "\nDe " + nomAuteur + "\nDe la serie " + nomSerie + "\nParu le " + date + "\nAux éditions " + edition + "\nL'ISBN est " + isbn)
    } else {
        e.preventDefault();
    }
}

/**
 * Permet d'afficher la div Aperçu et les informations saisies sur la div centrale
 */
function showApercu() {
    colonne3.style.visibility = "visible";
    colonne3.classList.replace("d-none", "d-flex");
    colonne4.classList.replace("d-flex", "d-none");
    colonne5.classList.replace("d-flex", "d-none");
    localStorage.setItem("Titre", addTitre.value);
    var titre = localStorage.getItem("Titre");
    pTitre.innerHTML = "<br>" + titre;

    for (var [key, value] of auteurs) {

        localStorage.setItem("Auteur", addAuteur.value);
        localStorage.setItem("Auteur2", addAuteur2.value);
        var auteur = localStorage.getItem("Auteur");
        var auteur2 = localStorage.getItem("Auteur2");

        if (auteur == key) {
            var nomAuteur = `${value.nom}`;
            pAuteur.innerHTML = "<br>" + nomAuteur;
            break;
        } else {
            pAuteur.innerHTML = "<br>" + auteur2;
        }
    }

    localStorage.setItem("Date", addDate.value);
    var date = localStorage.getItem("Date");
    pDate.innerHTML = "<br>" + date;

    localStorage.setItem("Edition", addEdit.value);
    var edition = localStorage.getItem("Edition");
    pEdit.innerHTML = "<br>" + edition;

    localStorage.setItem("ISBN", addISBN.value);
    var isbn = localStorage.getItem("ISBN");
    pISBN.innerHTML = "<br>" + isbn;


    for (var [key, value] of series) {

        localStorage.setItem("Serie", addSerie.value);
        localStorage.setItem("Serie2", addSerie2.value);
        var serie = localStorage.getItem("Serie");
        var serie2 = localStorage.getItem("Serie2");

        if (serie == key) {
            var nomSerie = `${value.nom}`;
            pSerie.innerHTML = "<br>" + nomSerie;
            break;
        } else {
            pSerie.innerHTML = "<br>" + serie2;
        }
    }

    /**
     * Function interne qui permet de supprimer le fakepath de l'input de type file
     * @param {*} path l'url de l'image
     * @returns l'url sans le fakepath
     */
    function extractFilename(path) {
        if (path.substr(0, 12) == "C:\\fakepath\\")
            return path.substr(12);
        var x;
        x = path.lastIndexOf('/');
        if (x >= 0)
            return path.substr(x + 1);
        x = path.lastIndexOf('\\');
        if (x >= 0)
            return path.substr(x + 1);
        return path;
    }

    localStorage.setItem("Image", addPic.value);
    var image = localStorage.getItem("Image");
    var imageTrim = extractFilename(image);
    pPic.src = "../albumsMini/" + imageTrim;

    localStorage.setItem("Resume", addRes.value);
    var resume = localStorage.getItem("Resume");
    pRes.innerHTML = "<br>" + resume;

}

/**
 * Permet de changer la couleur du menu déroulant Auteur en fonction de la validité
 */
function changeCouleurAuteur() {
    addAuteur.classList.replace("is-invalid", "is-valid")
}

/**
 * Permet de changer la couleur du menu déroulant Serie en fonction de la validité
 */
function changerCouleurSerie() {
    addSerie.classList.replace("is-invalid", "is-valid")
}

/**
 * Permet de vérifier le bon contenu de l'input d'ISBN
 */
function checkNumISBN() {
    for (var [key, value] of albums) {


        if (addISBN.value == "") {
            addISBN.setAttribute("class", "invalid");
        } else if (isNaN(addISBN.value) && addISBN.value.length > 0) {
            addISBN.setAttribute("class", "invalid");
        } else if (addISBN.value.length > 3 || addISBN.value.length < 1) {
            addISBN.setAttribute("class", "invalid");
        } else if (addISBN.value == key) {
            addISBN.setAttribute("class", "invalid");
            noISBN.classList.replace("d-none", "d-flex");
            noISBN.innerHTML = "L'ISBN existe déja mon bougre";
            iFlag = false;
            break;
        } else {
            addISBN.setAttribute("class", "valid");
            noISBN.classList.replace("d-flex", "d-none");
            iFlag = true;
        }
    }
}

// /**
//  * Effectue les controles sur l'input de creation d'auteur
//  */
// function checkAuteur() {
//     if (addAuteur2.value == "") {
//         addAuteur2.setAttribute("class", "invalid");
//         auteurFlag = false;
//     } else if (!isNaN(addAuteur2.value)) {
//         addAuteur2.setAttribute("class", "invalid");
//         auteurFlag = false;
//     } else {
//         auteurFlag = true;
//         addAuteur2.setAttribute("class", "valid");
//     }
// }

// /**
//  * Effectue les controles sur l'input de creation de serie
//  */
// function checkSerie() {
//     if (addSerie2.value == "") {
//         addSerie2.setAttribute("class", "invalid");
//         serieFlag = false;
//     } else if (!isNaN(addSerie2.value)) {
//         addSerie2.setAttribute("class", "invalid");
//         serieFlag = false;
//     } else {
//         serieFlag = true;
//         addSerie2.setAttribute("class", "valid");
//     }
// }

/**
 * Permet de donner le choix à l'utilisateur de créer un nouvel auteur dans la BDD
 */
function nouvelAuteur() {
    addAuteur.removeAttribute("required");
    addAuteur2.setAttribute("required", "required");

    newAuteur.classList.replace("d-flex", "d-none");
    annuleAuteur.classList.replace("d-none", "d-flex");
    addAuteur2.classList.replace("d-none", "d-flex");
    addAuteur.classList.replace("d-flex", "d-none");

    divAuteur.removeChild(addAuteur);
    addAuteur.value = "";
}

/**
 * Retourne sur l'input précedent de selection des auteurs
 */
function backAuteur() {
    addAuteur2.removeAttribute("required");
    addAuteur.setAttribute("required", "required");

    newAuteur.classList.replace("d-none", "d-flex");
    annuleAuteur.classList.replace("d-flex", "d-none");
    addAuteur.classList.replace("d-none", "d-flex");
    addAuteur2.classList.replace("d-flex", "d-none");

    divAuteur.insertBefore(addAuteur, newAuteur);
    addAuteur2.value = "";
}

/**
 * Permet de donner le choix à l'utilisateur de créer une nouvelle serie dans la BDD
 */
function nouvelleSerie() {
    newSerie.classList.replace("d-flex", "d-none");
    annuleSerie.classList.replace("d-none", "d-flex");
    addSerie2.classList.replace("d-none", "d-flex");
    addSerie.removeAttribute("required");
    addSerie2.setAttribute("required", "required");

    divSerie.removeChild(addSerie);
    addSerie.value = "";
}

/**
 * Retourne sur l'input précedent de selection des series
 */
function backSerie() {
    newSerie.classList.replace("d-none", "d-flex");
    annuleSerie.classList.replace("d-flex", "d-none");
    addSerie2.classList.replace("d-flex", "d-none");
    addSerie2.removeAttribute("required");
    addSerie.setAttribute("required", "required");

    divSerie.insertBefore(addSerie, newSerie);
    addSerie2.value = "";
}


// ---------------------------------------------------------- FONCTIONS DE LA DIV AJOUT EXEMPLAIRE  -----------------------------------------------------------------
/**
 * Verifie si l'ISBN qui l'utilisateur choisi existe bien et affiche un message si ce n'est pas le cas
 */
function checkISBNEx() {
    for (var [key, value] of albums) {

        if (refISBN.value == "") {
            refISBN.setAttribute("class", "invalid");
            noISBN2.classList.replace("d-flex", "d-none");
            bdFlag = false;
        } else if (refISBN.value != key) {
            refISBN.setAttribute("class", "invalid");
            noISBN2.classList.replace("d-none", "d-flex");
            noISBN2.innerHTML = "L'ISBN n'existe pas bon sang !";
            bdFlag = false;
        } else {
            bdFlag = true;
            refISBN.setAttribute("class", "valid");
            noISBN2.classList.replace("d-flex", "d-none");
            localStorage.setItem("ISBN", refISBN.value);
            break;

        }
    }
}

/**
 * Permet d'afficher une div d'aperçu de la BD correspondante à l'ISBN
 */
function showBD() {
    for (var [key, value] of albums) {
        var numSerie = `${value.idSerie}`;
        var numAlbum = `${value.numero}`;
        var titreAlbum = `${value.titre}`;

        if (key == refISBN.value) {
            colonne3.classList.replace("d-flex", "d-none");
            colonne5.classList.replace("d-flex", "d-none");
            colonne4.classList.replace("d-none", "d-flex");
            colonne5.style.visibility = "hidden"
            colonne4.style.visibility = "visible"
            colonne4.innerHTML =
                '<div class="border p-3"><img src ="../albumsMini/' +
                series.get(numSerie).nom +
                "-" +
                numAlbum +
                "-" +
                titreAlbum +
                '.jpg "alt=" " srcset=" "><br><p class="text-decoration-underline">Numéro ISBN : </p><p>' +
                refISBN.value +
                '</p><p class="text-decoration-underline">Titre :</p><p>' +
                titreAlbum +
                '</p><p class="text-decoration-underline">Série :</p><p>' +
                series.get(numSerie).nom +
                "</p></div></p>";
        }
    }

}

/**
 * Contrôle du code exemplaire + sauvegarde de la value dans le localeStorage
 */
function checkCodeEx() {
    if (codeEx.value == "") {
        codeEx.setAttribute("class", "invalid");
        exFlag = false;
    } else if (isNaN(codeEx.value)) {
        codeEx.setAttribute("class", "invalid");
        exFlag = false;
    } else if (codeEx.value.length != 2) {
        codeEx.setAttribute("class", "invalid");
        exFlag = false;
    } else {
        exFlag = true;
        codeEx.setAttribute("class", "valid");
        localStorage.setItem("codeEx", codeEx.value)

    }
}

/**
 * Contrôle du rayon + sauvegarde de la value dans le localeStorage
 */
function checkRayon() {
    if (rayon.value == "") {
        rayon.setAttribute("class", "invalid");
        rFlag = false;
    } else if (isNaN(rayon.value)) {
        rayon.setAttribute("class", "invalid");
        rFlag = false;
    } else if (rayon.value.length > 2 || addISBN.value.rayon < 1) {
        rayon.setAttribute("class", "invalid");
        rFlag = false;
    } else {
        rFlag = true;
        rayon.setAttribute("class", "valid");
        localStorage.setItem("rayon", rayon.value)

    }
}

/**
 * Contrôle de l'étagère + sauvegarde de la value dans le localeStorage
 */
function checkEtag() {
    if (etagere.value == "") {
        etagere.setAttribute("class", "invalid");
        eFlag = false;
    } else if (isNaN(etagere.value)) {
        etagere.setAttribute("class", "invalid");
        eFlag = false;
    } else if (etagere.value.length > 2 || etagere.value.length < 1) {
        etagere.setAttribute("class", "invalid");
        eFlag = false;
    } else {
        eFlag = true;
        etagere.setAttribute("class", "valid");
        localStorage.setItem("etagere", etagere.value);

    }
}

/**
 * Verifie une nouvelle fois si tous les côntroles sont OK avec un flag et valide le formulaire d'ajout en affichant un message
 * @param {*} e l'evenement click
 */
function confEx(e) {
    for (var [key, value] of albums) {
        var titreAlbum = `${value.titre}`;
        var numSerie = `${value.idSerie}`;
        var recupIsbn = localStorage.getItem("ISBN");
        var recupCodeEx = localStorage.getItem("codeEx");
        var recupRayon = localStorage.getItem("rayon");
        var recupEtag = localStorage.getItem("etagere");

        if ((bdFlag == true && exFlag == true && rFlag == true && eFlag == true) && (key == recupIsbn)) {
            confFlag = true;
            break;
        } else {
            confFlag = false;
        }
    }

    if (confFlag == true) {
        alert("Vous venez d'ajouter un exemplaire de " + series.get(numSerie).nom + "\n" + titreAlbum + "\navec le code exemplaire " + recupCodeEx + "\nAu rayon " + recupRayon + "\nEtagère " + recupEtag);
    } else {
        e.preventDefault();
    }
}
// ---------------------------------------------------------- FONCTIONS DE LA DIV SUPPRIMER EXEMPLAIRE  -----------------------------------------------------------------

/**
 * Verifie si l'ISBN qui l'utilisateur choisi existe bien et affiche un message si ce n'est pas le cas 
 */
function checkISBNSupp() {
    for (var [key, value] of albums) {

        if (refISBNDel.value == "") {
            refISBNDel.setAttribute("class", "invalid");
            noISBN3.classList.replace("d-flex", "d-none");
            bDelFlag = false;
        } else if (refISBNDel.value != key) {
            refISBNDel.setAttribute("class", "invalid");
            noISBN3.classList.replace("d-none", "d-flex");
            noISBN3.innerHTML = "L'ISBN n'existe pas Monseigneur!";
            bDelFlag = false;
        } else {
            bDelFlag = true;
            refISBNDel.setAttribute("class", "valid");
            noISBN3.classList.replace("d-flex", "d-none");
            localStorage.setItem("ISBNDel", refISBNDel.value);
            break;

        }
    }
}

/**
 * Permet d'afficher une div d'aperçu de la BD correspondante à l'ISBN
 */
function showBDDel() {
    for (var [key, value] of albums) {
        var numSerie = `${value.idSerie}`;
        var numAlbum = `${value.numero}`;
        var titreAlbum = `${value.titre}`;

        if (key == refISBNDel.value) {
            colonne3.classList.replace("d-flex", "d-none");
            colonne4.classList.replace("d-flex", "d-none");
            colonne5.classList.replace("d-none", "d-flex");
            colonne5.style.visibility = "visible";
            colonne4.style.visibility = "hidden";
            colonne5.innerHTML =
                '<div class="border p-3"><img src ="../albumsMini/' +
                series.get(numSerie).nom +
                "-" +
                numAlbum +
                "-" +
                titreAlbum +
                '.jpg "alt=" " srcset=" "><br><p class="text-decoration-underline">Numéro ISBN : </p><p>' +
                refISBNDel.value +
                '</p><p class="text-decoration-underline">Titre :</p><p>' +
                titreAlbum +
                '</p><p class="text-decoration-underline">Série :</p><p>' +
                series.get(numSerie).nom +
                "</p></div></p>";
        }
    }

}

/**
 * Contrôle du code exemplaire + sauvegarde de la value dans le localeStorage
 */
function checkCodeExDel() {
    if (codeExDel.value == "") {
        codeExDel.setAttribute("class", "invalid");
        exDelFlag = false;
    } else if (isNaN(codeExDel.value)) {
        codeExDel.setAttribute("class", "invalid");
        exDelFlag = false;
    } else if (codeExDel.value.length != 2) {
        codeExDel.setAttribute("class", "invalid");
        exDelFlag = false;
    } else {
        exDelFlag = true;
        codeExDel.setAttribute("class", "valid");
        localStorage.setItem("codeExDel", codeExDel.value)
    }
}

/**
 * Verifie une nouvelle fois si tous les côntroles sont OK avec un flag et valide le formulaire de suppression en affichant un message
 * @param {*} e l'evenement click
 */
function confExDel(e) {
    for (var [key, value] of albums) {
        var titreAlbum = `${value.titre}`;
        var numSerie = `${value.idSerie}`;
        var recupIsbn = localStorage.getItem("ISBNDel");
        var recupCodeEx = localStorage.getItem("codeExDel");


        if ((bDelFlag == true && exDelFlag == true) && (key == recupIsbn)) {
            delFlag = true;
            break;
        } else {
            delFlag = false;
        }
    }

    if (delFlag == true) {
        alert("Vous venez de supprimer un exemplaire de " + series.get(numSerie).nom + "\n" + titreAlbum + "\navec le code exemplaire " + recupCodeEx);
    } else {
        e.preventDefault();
    }
}