<?php

class Serie {

    private $idSerie;
    private $libSerie;
    private $codeEmp;

    /**
	 * 
	 * @param $idSerie      Identifiant serie
	 * @param $libSerie     Nom de la serie
     * @param $codeEmp      Le code emplacement       
	 */
	public function __construct(int $idSerie, string $libSerie, string $codeEmp) {
        
		$this->idSerie = $idSerie;
		$this->libSerie = $libSerie;
        $this->codeEmp = $codeEmp;
	}

	public function getIdSerie() {
		return $this->idSerie;
	}
	private function setIdSerie($idSerie) {
		$this->idSerie = $idSerie;
	}
	public function getLibSerie() {
		return $this->libSerie;
	}
	public function setLibSerie($libSerie) {
		$this->libSerie = $libSerie;
	}
	public function getCodeEmp() {
		return $this->codeEmp;
	}
	public function setCodeEmp($codeEmp) {
		$this->codeEmp = $codeEmp;
	}



	// //On commence par mettre une div vide en cas de plusieurs click sur le bouton recherche

    // //Puis on entre dans le tableau albums 
    // for (var [key, value] of albums) {
    //     var numSerie = `${value.idSerie}`;
    //     var numAlbum = `${value.numero}`;
    //     var titreAlbum = `${value.titre}`;
    //     var numAuteur = `${value.idAuteur}`;
    //     var prixAlbum = `${value.prix}`;
    //     var numISBN = key;
    //     var res = (document.getElementById("album"));

    //     //On compare la saisie dans la barre de recherche avec les titres OU les séries OU les auteurs OU le numéro ISBN des albums si il la recherche est bien inclue dans l'un d'eux la liste correspondante s'affiche
    //     if (titreAlbum.toLowerCase().includes(rechercheVal.value.toLowerCase()) || series.get(numSerie).nom.toLowerCase().includes(rechercheVal.value.toLowerCase()) || auteurs.get(numAuteur).nom.toLowerCase().includes(rechercheVal.value.toLowerCase()) || numISBN.includes(rechercheVal.value)) {
    //         flag = true;
    //         //on créer l'élément TR à l'entérieur du tableau res et rend cliquable chaque ligne pour envoyer vers la page détails
    //         let monTR = document.createElement("tr");
    //         monTR.setAttribute("class", "table-active");
    //         res.appendChild(monTR);
    //         monTR.innerHTML = '<th scope="row">' + numISBN + '</th><td>' + series.get(numSerie).nom + '</td><td>' + titreAlbum + '</td><td>' + auteurs.get(numAuteur).nom + '</td><td>' + prixAlbum + '</td><td><img src = "../albumsMini/' + series.get(numSerie).nom + "-" + numAlbum + "-" + titreAlbum + '.jpg "alt=" " srcset=" ">';

    //         (function(isbn) {
    //             monTR.addEventListener("click", function() {
    //                 clickResult(isbn);
    //             });
    //         })(key);

    //     }

    // }
    // //Sinon la page affiche aucun résultats
    // if (flag == false) {
    //     var res = (document.getElementById("album").innerHTML += '<p>Aucun résultat</p>');

    // }

}

?>