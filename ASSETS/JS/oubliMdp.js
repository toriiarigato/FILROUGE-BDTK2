// Initialisation des variables

var identifiant = document.getElementById("identifiant");
var retour = document.getElementById("btnRetour");
var flag = false;
var valider = document.getElementById("btnSubmit");

var regexEmail =/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

//Abonnements

identifiant.addEventListener("input", checkId);
valider.addEventListener("click",checkMail);

//Fonctions

/**Vérifie si la regexp de l'identifiant correspond
 * 
 * @param {*} e l'évenement
 */
 function checkId(e){
    if (!regexEmail.test(identifiant.value)) {
    identifiant.setAttribute("class", "invalid");
    e.preventDefault();
    } else {identifiant.className = "valid"; flag = true}
}

/** Fonction qui donne une alerte si l'adresse mail est validée 
 * 
 */
function checkMail(){
    if(flag == true){
        alert("Si votre adresse est connue de nos services, vous recevrez un mail. \nSuivez les instructions du lien pour récuperer votre mot de passe")
        form.action = "../HTML/login.html";
    }
}
