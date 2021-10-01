//Initialisation des variables
var titleAl = document.getElementById("titreAlbum");
var urlPage = document.location.href;
var index = urlPage.split("=");
var numIndexIsbn = index[1];
var viewAl = document.getElementById("viewAl");
var isbnNum = document.getElementById("isbnNum");
var serieNom = document.getElementById("serieNom");
var auteurNom = document.getElementById("auteurNom");
var btnRetour = document.getElementById("retourRecherche");

// btnRetour.addEventListener("click", function(e) {
//     window.history.back();
// });


console.log(index);
console.log(numIndexIsbn);

for (var [key, value] of albums) {
    var numSerie = `${value.idSerie}`;
    var numAlbum = `${value.numero}`;
    var titreAlbum = `${value.titre}`;
    var numAuteur = `${value.idAuteur}`;
    var prixAlbum = `${value.prix}`;
    var numISBN = key;
    if (key == numIndexIsbn) {
        titleAl.innerHTML = titreAlbum;
        viewAl.innerHTML =
            '<img class="border border-3 border-dark w-50"  src = "../albums/' +
            series.get(numSerie).nom +
            "-" +
            numAlbum +
            "-" +
            titreAlbum +
            '.jpg "alt=" " srcset=" ">';
        console.log(viewAl);
        isbnNum.innerHTML = "NUMERO ISBN :" + numISBN;
        serieNom.innerHTML = "<p>" + series.get(numSerie).nom + "</p>";
        auteurNom.innerHTML = "<p>" + auteurs.get(numAuteur).nom + "</p>";
    }
}