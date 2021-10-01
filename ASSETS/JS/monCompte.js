//Initialisation des variables

var rechercher = document.getElementById("rechercher");
var rechercheVal = document.getElementById("recherche");
var flag = false;


//Abonnements 

rechercher.addEventListener("click", recherche);

//Fonctions

function clickResult(isbn) {
    window.location = "details.html?isbn=" + isbn;

}

function recherche() {
    //On commence par mettre une div vide en cas de plusieurs click sur le bouton recherche

    document.getElementById("album").innerHTML = "";

    //Puis on entre dans le tableau albums 
    for (var [key, value] of albums) {
        var numSerie = `${value.idSerie}`;
        var numAlbum = `${value.numero}`;
        var titreAlbum = `${value.titre}`;
        var numAuteur = `${value.idAuteur}`;
        var prixAlbum = `${value.prix}`;
        var numISBN = key;
        var res = (document.getElementById("album"));

        //On compare la saisie dans la barre de recherche avec les titres OU les séries OU les auteurs OU le numéro ISBN des albums si il la recherche est bien inclue dans l'un d'eux la liste correspondante s'affiche
        if (titreAlbum.toLowerCase().includes(rechercheVal.value.toLowerCase()) || series.get(numSerie).nom.toLowerCase().includes(rechercheVal.value.toLowerCase()) || auteurs.get(numAuteur).nom.toLowerCase().includes(rechercheVal.value.toLowerCase()) || numISBN.includes(rechercheVal.value)) {
            flag = true;
            //on créer l'élément TR à l'entérieur du tableau res et rend cliquable chaque ligne pour envoyer vers la page détails
            let monTR = document.createElement("tr");
            monTR.setAttribute("class", "table-active");
            res.appendChild(monTR);
            monTR.innerHTML = '<th scope="row">' + numISBN + '</th><td>' + series.get(numSerie).nom + '</td><td>' + titreAlbum + '</td><td>' + auteurs.get(numAuteur).nom + '</td><td>' + prixAlbum + '</td><td><img src = "../albumsMini/' + series.get(numSerie).nom + "-" + numAlbum + "-" + titreAlbum + '.jpg "alt=" " srcset=" ">';

            (function(isbn) {
                monTR.addEventListener("click", function() {
                    clickResult(isbn);
                });
            })(key);

        }

    }
    //Sinon la page affiche aucun résultats
    if (flag == false) {
        var res = (document.getElementById("album").innerHTML += '<p>Aucun résultat</p>');

    }

};

//Affichage dynamique des filtres dans le collapse

//Liste Filtres Séries

for (var [key, value] of series) {
    var nomSerie = `${value.nom}`;

    var filtreSeries = (document.getElementById("listeSeries").innerHTML += '<div class="form-check"><input class="form-check-input" type="checkbox" value="' + key + '" id="filtreSeries"><label class="form-check-label" for="filtreSeries">' + nomSerie + ' </label></div>');

}

//Liste Filtres Auteurs

for (var [key, value] of auteurs) {
    var nomAuteur = `${value.nom}`;

    var filtreAuteurs = (document.getElementById("listeAuteurs").innerHTML += '<div class="form-check"><input class="form-check-input" type="checkbox" value="' + key + '" id="filtreAuteurs"><label class="form-check-label" for="filtreAuteurs">' + nomAuteur + ' </label></div>');
}

//Liste Filtres Albums

for (var [key, value] of albums) {
    var titreAlbum = `${value.titre}`;

    var filtreAlbums = (document.getElementById("listeAlbums").innerHTML += '<div class="form-check"><input class="form-check-input" type="checkbox" value="' + key + '" id="filtreAlbums"><label class="form-check-label" for="filtreAlbums">' + titreAlbum + ' </label></div>');

}

var fillNom = document.getElementById("idConnecté");

function donneNom() {
    var mail = localStorage.getItem("mail");
    var role = localStorage.getItem("role");
    fillNom.innerHTML += "</br>" + mail + "</br>" + role;
    return;
}
donneNom();