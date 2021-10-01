//Initialisation des variables

var myModal = document.getElementById("myModal");
var myInput = document.getElementById("myInput");
var form = document.getElementById("form");
var identifiant = document.getElementById("identifiant");
var idVal = identifiant.value;
var mdp = document.getElementById("mdp");
var nocompte = document.getElementById("nocompte");
var btnConnect = document.getElementById("btnconnect");
var regexEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var regexMdp = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/;
var fCheck = false;

//Abonnements

identifiant.addEventListener("input", checkId);
mdp.addEventListener("input", checkMdp);
btnConnect.addEventListener("click", connect);


//Fonctions

/**
 * Fonction qui verifie dans une premier temps l'existence de l'identifiant, puis du mot de passe et la concordance des deux
 * Puis donne l'accés en fonction du rôle préetabli
 * @param {*} e l'evenement
 */
function connect(e) {
    var bIdentifiant = false;
    var mailCheck;
    var mdpCheck;
    var roleCheck;

    for (var [key, value] of users) {
        if (value.mail == identifiant.value) {
            bIdentifiant = true;
            keyCheck = key;
            mdpCheck = value.mdp;
            break;
        } else {
            bIdentifiant = false;
        };
    }

    if (bIdentifiant == true) {
        for (var [key, value] of users) {
            if (mdp.value == mdpCheck && value.mail == identifiant.value) {
                bIdentifiant = true;
                mailCheck = value.mail;
                roleCheck = value.role;
                break;
            } else {
                bIdentifiant = false;
            }
        }
    }

    switch (roleCheck) {
        case "Adhérent":
            form.action = "../HTML/monCompte.html";
            localStorage.setItem("nom", value.nom);
            localStorage.setItem("prenom", value.prenom);
            localStorage.setItem("role", value.role);
            break;
        case "Bibliothécaire":
            form.action = "../HTML/bibliothecaire.html";
            localStorage.setItem("nom", value.nom);
            localStorage.setItem("prenom", value.prenom);
            localStorage.setItem("role", value.role);
            break;
        case "Gestionnaire de fond":
            form.action = "../HTML/gestionnaire-de-fond.html";
            localStorage.setItem("nom", value.nom);
            localStorage.setItem("prenom", value.prenom);
            localStorage.setItem("role", value.role);
            break;
        case "Responsable":
            form.action = "../HTML/responsable.html";
            localStorage.setItem("nom", value.nom);
            localStorage.setItem("prenom", value.prenom);
            localStorage.setItem("role", value.role);
            break;
        default:
            e.preventDefault();
            nocompte.innerHTML = "Identifiant ou mot de passe erroné";
    }
}

/**Vérifie si la regexp de l'identifiant correspond
 * 
 * @param {*} e l'évenement
 */
function checkId(e) {
    if (!regexEmail.test(identifiant.value)) {
        identifiant.setAttribute("class", "invalid");
        e.preventDefault();
    } else {
        identifiant.className = "valid";
        fCheck = true
    }
}

/**Vérifie si la regexp du mot de passe correspond
 * 
 * @param {*} e l'évenement
 */
function checkMdp(e) {
    if (!regexMdp.test(mdp.value)) {
        mdp.setAttribute("class", "invalid");
        e.preventDefault();
    } else {
        mdp.className = "valid";
        fCheck = false
    }
}