 
 
 <!---------------------------------------------------------------------- GESTIONNAIRE DE FOND ----------------------------------------------------------------------------->
 
 <!--Div centrale-->
 <div id="colonne2" class="d-flex flex-column align-items-center justify-content-around border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-100 m-2 column">

<div class="d-flex flex-wrap btn-group" role="group" aria-label="Basic radio toggle button group">
    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked="checked">
    <label class="btn btn-outline-primary" for="btnradio1">Nouvelle entrée</label>
    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
    <label class="btn btn-outline-primary" for="btnradio2">Ajout exemplaire</label>
    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
    <label class="btn btn-outline-primary" for="btnradio3">Supprimer exemplaire</label>
</div>

<!--Div de nouvelle entrée-->
<div class="d-flex flex-wrap justify-content-center" id="newEntryDiv">
    <form method="GET" action="../HTML/gestionnaire-de-fond.html" id="form">
        </br>
        <fieldset class="d-flex flex-column justify-content-evenly">

            <p><label for="addTitre" class="d-flex flex-wrap">Titre</label>
                <input type="text" id="addTitre" required="required">
            </p>
            <p><label for="addAuteur" class="d-flex flex-wrap">Auteur</label>
                <div class="w-100" id="divAuteur">
                    <select class="d-flex form-select is-invalid" id="addAuteur" required="required"> 
                        </select>
                    </b>
                    <input class="d-none" type="text" id="addAuteur2">
                    <input class="d-flex" type="button" value="Ajouter nouvel auteur" id="newAuteur">
                    <input class="d-none" type="button" value="Annuler" id="annuleAuteur">
                </div>
            </p>
            <p><label for="addDate" class="d-flex flex-wrap">Date de parution</label>
                <input type="date" id="addDate" placeholder="jj/mm/aaaa" required="required">
            </p>
            <p><label for="addEdit" class="d-flex flex-wrap is">Maison d'édition</label>
                <input type="text" id="addEdit" required="required">
            </p>
            <p><label for="addISBN" class="d-flex flex-wrap">Référence ISBN</label>
                <input type="text" id="addISBN" placeholder="XXX" required="required">
                <p id="noISBN" class="d-none text-danger"></p>
            </p>
            <p><label for="addSerie" class="d-flex flex-wrap">Serie</label>
                <div id="divSerie" class=" w-100">
                    <select class="d-flex form-select is-invalid" id="addSerie" required="required">
                        </select>
                    </b>
                    <input class="d-none" type="text" id="addSerie2">
                    <input class="d-flex" type="button" value="Ajouter nouvelle serie" id="newSerie">
                    <input class="d-none" type="button" value="Annuler" id="annuleSerie">
                </div>
            </p>
            <p><label for="addPic" class="d-flex flex-wrap">Ajouter une image</label>
                <div class="d-flex flex-wrap form-group w-100">
                    <input class="form-control" type="file" id="addPic" required="required">
                </div>
            </p>
            <p><label for="addRes" class="d-flex flex-wrap">Résumé</label>
                <textarea rows="3" cols="33" type="text" id="addRes" required="required"></textarea>
            </p>
            <div class="d-flex justify-content-evenly">
                <input type="button" value="Aperçu" id="apercu">

                <input type="submit" value="Confirmer nouvelle entrée" id="subEntree">
            </div>
        </fieldset>
    </form>
</div>

<!--Div d'ajout exemplaire-->
<div id="addExDiv" class="d-none justify-content-center flex-wrap">
    <form method="GET" action="../HTML/gestionnaire-de-fond.html">
        </br>
        <fieldset class="d-flex flex-column justify-content-evenly">
            <p><label for="refISBN" class="d-flex flex-wrap">Référence ISBN</label>
                <input type="text" id="refISBN" required="required">
                <input type="button" id="checkRefISBN" value="Aperçu">
                <p id="noISBN2" class="d-none text-danger"></p>
            </p>
            <p><label for="codeEx" class="d-flex flex-wrap">Code Exemplaire</label>
                <input type="text" id="codeEx" required="required" placeholder="00" value="">
            </p>
            <p><label for="addISBN" class="d-flex flex-wrap">Emplacement</label>
                <input type="text" class="" placeholder="Rayon" required="required" id="rayon">
                <input type="text" class="" placeholder="Etagère" required="required" id="etagere">
            </p>
            <div>
                <input type="submit" value="Confirmer nouvel exemplaire" id="exSub">
            </div>
        </fieldset>
    </form>
</div>

<!--Div de suppression d'exemplaire-->
<div id="delExDiv" class="d-none justify-content-center flex-wrap">
    <form method="GET" action="../HTML/gestionnaire-de-fond.html">
        </br>
        <fieldset class="d-flex flex-column justify-content-evenly">
            <p><label for="refISBNDel" class="d-flex flex-wrap">Référence ISBN</label>
                <input type="text" id="refISBNDel" required="required">
                <input type="button" id="checkRefISBNDel" value="Aperçu">
                <p id="noISBN3" class="d-none text-danger"></p>
            </p>
            <p><label for="codeExDel" class="d-flex flex-wrap">Code Exemplaire</label>
                <input type="text" id="codeExDel" required="required" placeholder="00" value="">
            </p>
            <div>
                <input type="submit" value="Confirmer suppression exemplaire" id="exSubDel">
            </div>
        </fieldset>
    </form>
</div>

</div>

 <!-------------------------------------------------------------------------- RESONSABLE --------------------------------------------------------------------------------->

 <!--Div centrale-->
 <div id="colonne2" class="d-flex flex-column align-items-center justify-content-around border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-100 m-2 col-8">


<div class="d-flex flex-wrap btn-group" role="group" aria-label="Basic radio toggle button group">
    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked="checked">
    <label class="btn btn-outline-primary" for="btnradio1">BD non rapportées à ce jour</label>
    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
    <label class="btn btn-outline-primary" for="btnradio2">Toutes les BD non rapportées</label>
    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
    <label class="btn btn-outline-primary" for="btnradio3">Statistiques</label>
</div>

<!--Div de nouvelle entrée-->
<div class="d-flex flex-wrap justify-content-center" id="newEntryDiv">
    <form method="GET" action="../HTML/gestionnaire-de-fond.html" id="form">
        </br>
        <fieldset class="d-flex flex-column flex-wrap justify-content-stretch">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ISBN</th>
                        <th scope="col">Code Exemplaire</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Emprunté par :</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">22</th>
                        <td>74</td>
                        <td>Marsupilami</td>
                        <td>Le papillon des cimes</td>
                        <td>Lebarbare Conan</td>
                    </tr>
                    <tr>
                        <th scope="row">58</th>
                        <td>58</td>
                        <td>Tintin</td>
                        <td>Tintin en amérique</td>
                        <td>Lebarbare Conan</td>
                    </tr>
                    <tr>
                        <th scope="row">07</th>
                        <td>32</td>
                        <td>Les légendaires</td>
                        <td>Aube et futur</td>
                        <td>Lebarbare Conan</td>
                    </tr>
                </tbody>
            </table>
            <p class="text-danger"> FONCTIONNALITE EN TRAVAUX</p>
        </fieldset>
    </form>
</div>

<!--Div d'ajout exemplaire-->
<div id="addExDiv" class="d-none justify-content-center flex-wrap">
    <form method="GET" action="../HTML/gestionnaire-de-fond.html">
        </br>
        <fieldset class="d-flex flex-column justify-content-evenly">
            <form method="GET" action="responsable.html">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Jours de retard</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Code exemplaire</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Emprunté par :</th>
                            <th scope="col">Envoi lettre de rappel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">15</th>
                            <td>21</td>
                            <td>12</td>
                            <td>Toto Tata Titi Tutu</td>
                            <td>Tyty</td>
                            <td>
                                <p class="d-flex justify-content-center"><input type="checkbox"></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>11</td>
                            <td>06</td>
                            <td>Star wars : La guerre des clowns</td>
                            <td>Anakin Marcheciel</td>
                            <td>
                                <p class="d-flex justify-content-center"><input type="checkbox"></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>33</td>
                            <td>63</td>
                            <td>Harry Potter est resté sous l'escalier</td>
                            <td>FlyOfDeath</td>
                            <td>
                                <p class="d-flex justify-content-center"><input type="checkbox"></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>78</td>
                            <td>96</td>
                            <td>Mimi Mathy : "J'ai grandi"</td>
                            <td>Mimy Mathy</td>
                            <td>
                                <p class="d-flex justify-content-center"><input type="checkbox"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="button" value="Envoyer les lettres de rappel" id="lettreRappel">
                <p class="text-danger"> FONCTIONNALITE EN TRAVAUX</p>
            </form>
        </fieldset>
    </form>
</div>

<!--Div de suppression d'exemplaire-->
<div id="delExDiv" class="d-none justify-content-center flex-wrap">
    <form method="GET" action="../HTML/gestionnaire-de-fond.html">
        </br>
        <fieldset class="d-flex flex-column justify-content-evenly">
            <p class="text-danger"> FONCTIONNALITE EN TRAVAUX</p>
        </fieldset>
    </form>
</div>

</div>
</div>

<!-------------------------------------------------------------------------- BIBLIOTHECAIRE --------------------------------------------------------------------------------->

 <!--Div centrale-->
 <div id="colonne2" class="d-flex flex-column align-items-center justify-content-around border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-100 m-2 column">


<div class="d-flex flex-wrap btn-group" role="group" aria-label="Basic radio toggle button group">
    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked="checked">
    <label class="btn btn-outline-primary" for="btnradio1">Emprunt</label>
    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
    <label class="btn btn-outline-primary" for="btnradio2">Retour</label>
    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
    <label class="btn btn-outline-primary" for="btnradio3">Nouvel adhérent</label>
</div>

<!--Div emprunt-->
<div class="d-flex flex-wrap justify-content-center" id="empruntDiv">
    <form>
        </br>
        <fieldset class="d-flex flex-column justify-content-evenly">
            <div id="choixadherent" class="border-bottom">
                <p><label for="numAdherent" class="d-flex flex-wrap">Numéro Adhérent :</label>
                    <input type="text" id="numAdherent" required="required">
                </p>
                <div class="d-flex justify-content-evenly">
                    <input type="button" value="Rechercher Fiche adhérent" id="rechercheAd">
                </div>
                <p id="noAd" class="text-danger"></p>
            </div>
            <div id="ISBN" class="border-bottom d-none">
                <p><label for="addISBN" class="d-flex flex-wrap">Numéro ISBN :</label>
                    <input type="text" id="addISBN" placeholder="XXX-X-XXXX-XXXX-X" required="required">
                </p>

                <div class="d-flex justify-content-evenly">
                    <input type="button" value="Valider" id="valider">
                </div>
                <p id="noISBN" class="text-danger"></p>
            </div>

            <div class="d-flex flex-column d-none">
                <p><label for="addTitre" class="d-flex flex-wrap">Titre : </label></p>
                <p id="titre"></p>

                <p><label for="addEtat" class="d-flex flex-wrap">Etat : </label>
                    <p id="etat"></p>
                    <div class="d-flex justify-content-evenly">
                        <input type="button" value="Enregistrer Emprunt">
                    </div>
            </div>
        </fieldset>
    </form>
</div>

<!--Div retour-->
<div id="retourDiv" class="d-none justify-content-center flex-wrap">

    <form>
        </br>
        <fieldset class="d-flex flex-column justify-content-evenly">
            <p><label for="addDate" class="d-flex flex-wrap">Référence ISBN</label>
                <input type="text" id="addDate">
            </p>
            <p><label for="addEdit" class="d-flex flex-wrap">Code Exemplaire</label>
                <input type="text" id="addEdit">
            </p>
            <p><label for="addISBN" class="d-flex flex-wrap">Emplacement</label>
                <input type="text" class="addISBN" placeholder="Rayon">
                <input type="text" class="addISBN" placeholder="Etagère">
            </p>
            <div>
                <input type="submit" value="Confirmer nouvelle entrée">
                <p class="text-danger"> FONCTIONNALITE EN TRAVAUX</p>
            </div>
        </fieldset>
    </form>
</div>

<!--Div nouvel adhérent-->
<div id="newadDiv" class="d-none justify-content-center flex-wrap">
    <form>
        </br>
        <fieldset class="d-flex flex-column justify-content-evenly">
            <p><label for="addDate" class="d-flex flex-wrap">Référence ISBN</label>
                <input type="text" id="addDate">
            </p>
            <p><label for="addEdit" class="d-flex flex-wrap">Code Exemplaire</label>
                <input type="text" id="addEdit">
            </p>
            <div>
                <input type="submit" value="Confirmer nouvel exemplaire">
                <p class="text-danger"> FONCTIONNALITE EN TRAVAUX</p>
            </div>
        </fieldset>
    </form>
</div>

</div>