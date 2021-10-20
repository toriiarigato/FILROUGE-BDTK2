<!---------------------------------------------------------------------- GESTIONNAIRE DE FOND ----------------------------------------------------------------------------->
<?php 

spl_autoload_register(function($classe){
    include "../Modele/classes/" . $classe . ".class.php";
});

    if ($action == 'gestionnaire' or $action == 'serie' or $action == 'addSerie' or $action == 'addSerieMaj' or $action == 'Supprimer Serie' or $action == "Modifier Serie" or $action == "modifMaj"){ ?>

<!--Div centrale-->
<div id="colonne2"
    class="d-flex flex-column column align-items-center overflow-auto border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-100 m-2 ">

    <div class="d-flex justify-content-center d-flex flex-wrap btn-group" role="group"
        aria-label="Basic radio toggle button group">
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio1">Serie</label>
            <input type="hidden" name="action" value="serie">
        </form>
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Exemplaire</label>
            <input type="hidden" name="action" value="exemplaire">
        </form>
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">Album</label>
            <input type="hidden" name="action" value="album">
        </form>
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio4" id="btnradio4" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio4">Auteur</label>
            <input type="hidden" name="action" value="auteur">
        </form>
    </div>

    <?php  
    if ($action == 'serie'){ ?>
    <hr>

    <form method="get" action="">
        <input type="submit" value="Ajouter une serie">
        <input type="hidden" name="action" value="addSerie">
    </form>
    <input type="text" placeholder="Rechercher une serie">

    <!-- Div de serie-->
    <div class="d-flex flex-wrap justify-content-center">
        </br>
        <?php            
            try {
?>
        </br>
        <?php
    foreach($tSerie as $ligne) {
?>
        <form method="get" action="" class="border-3 rounded rounded-2 shadow p-3 m-2">
            <?php       echo  $ligne[0] . 
            "<input type=\"hidden\" name=\"libSerieDel\" value=\"<?php echo $ligne[0] ?>\">
            <input type=\"hidden\" name=\"codeEmpDel\" value=\"<?php echo $ligne[1] ?>\">
            <input type=\"hidden\" name=\"idSerieDel\" value=\"<?php echo $ligne[2] ?>\">
            <br><input type=\"submit\" name=\"action\" value=\"Modifier Serie\">
            <input type=\"submit\" name=\"action\" value=\"Supprimer Serie\">";
            ?>
        </form>
        <?php  
      
    }

    } catch (PDOException $e) {
        echo $e->getMessage() . RC;
        echo "ECHEC de CONNEXION à la BDD" . RC;
    } catch (Exception $e) {
        echo $e->getMessage() . RC;
    }
?>

    </div>
    <?php } ?>


    <?php  if ($action == 'addSerie' or $action == "Modifier Serie"){ ?>

    <form method="get" action="">
        <fieldset class="">
            <?php  if ($action != "Modifier Serie"){ ?>
            <label for="idSerie"> Identifiant serie</label>
            <input type="text" name="idSerie" id="idSerie" required="required" />
            <br />
            <label for="libSerie">Libellé serie</label>
            <input type="text" name="libSerie" id="libSerie" required="required" />
            <br />

            <label for="codeEmp">Code Emplacement </label>
            <input type="text" name="codeEmp" id="codeEmp" required="required" />
            <br />

            <input type="submit" value="Ajouter nouvelle serie" />
            <input type="hidden" name="action" value="addSerieMaj">
            <?php } ?>


            <?php  if($action == "Modifier Serie"){ ?>

            <label for="libSerie">Libellé serie</label>
            <input type="text" name="modifLibSerie" id="libSerie" value="<?php echo $trimmed; ?>" />
            <br />

            <label for="codeEmp">Code Emplacement </label>
            <input type="text" name="modifCodeEmp" id="codeEmp" value="<?php echo $ancientCodeEmp; ?>" />
            <br />
            <input type="submit" value="Confirmer modifications" />
            <input type="hidden" name="action" value="modifMaj">
            <input type="hidden" name="idSerieFollow" value="<?php echo $nextIdSerie; ?>" />
            <input type="hidden" name="ancienLibSerie" value="<?php echo $trimmed; ?>" />
            <input type="hidden" name="ancienCodeEmp" value="<?php echo $ancientCodeEmp; ?>" />
            <?php } ?>

        </fieldset>
    </form>

    <form action="">
        <input type="submit" value="Retour">
        <input type="hidden" name="action" value="serie">
    </form>


    <?php } ?>

    <?php  
    if ($action == 'addSerieMaj' or $action == 'Supprimer Serie' or $action == "modifMaj"){ ?>
    <?php echo "OK"; ?>
    <form action="">
        <input type="submit" value="Retour">
        <input type="hidden" name="action" value="serie">
    </form>
    <?php } ?>

    <?php } ?>


    <!-------------------------------------------------------------------------- RESPONSABLE --------------------------------------------------------------------------------->
    <?php 
    if ($action == 'responsable'){ ?>


    <!--Div centrale-->
    <div id="colonne2"
        class="d-flex flex-column align-items-center justify-content-around border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-100 m-2 col-8">


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
<?php } ?>
<?php

    if ($action == 'bibli'or $action == 'emprunt'or $action == 'retour'or $action == 'nouvelAd'or $action == 'gestionAd'or $action == 'rechercheAd' or $action == "afficheListUser" or $action == 'resRechercheAd' or $action == 'deleteAd'){?>
<!-- ////////////////////////////////////////////////////////////////////////BIBLIOTHECAIRE /////////////////////////////////////////////////////////////////////////////// -->
<!--Div centrale-->
<div id="colonne2"
    class="d-flex flex-column align-items-center justify-content-around border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-100 m-2 column d-flex flex-nowrap overflow-auto">

    <div class="d-flex justify-content-center d-flex flex-wrap btn-group" role="group"
        aria-label="Basic radio toggle button group">
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio1">Emprunt</label>
            <input type="hidden" name="action" value="emprunt">
        </form>
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Retour</label>
            <input type="hidden" name="action" value="retour">
        </form>
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">Nouvel adhérent</label>
            <input type="hidden" name="action" value="nouvelAd">
        </form>
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio4" id="btnradio4" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio4">Gestion adhérents</label>
            <input type="hidden" name="action" value="gestionAd">
        </form>
    </div>

    <!-- ////////////////////////////////////////////////////////////////////////EMPRUNTS /////////////////////////////////////////////////////////////////////////////// -->
    <?php 
    if ($action == 'emprunt'){ ?>
    <div class="d-flex justify-content-center d-flex flex-wrap btn-group" role="group"
        aria-label="Basic radio toggle button group">

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
        <?php } ?>
        <!-- ////////////////////////////////////////////////////////////////////////RETOURS /////////////////////////////////////////////////////////////////////////////// -->
        <?php 
    if ($action == 'retour'){ ?>
        <div class="d-flex justify-content-center d-flex flex-wrap btn-group" role="group"
            aria-label="Basic radio toggle button group">

        </div>
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
        <?php } ?>
        <!-- ////////////////////////////////////////////////////////////////////////NOUVEL ADHERENT /////////////////////////////////////////////////////////////////////////////// -->
        <?php 
    if ($action == 'nouvelAd'){ ?>

        <div class="d-flex flex-wrap justify-content-center" id="newEntryDiv">
            <form method="GET" action="../controler/index.test.aure.php" id="form">
                </br>
                <fieldset class="d-flex flex-column justify-content-evenly">

                    <p><label for="nom" class="d-flex flex-wrap">Nom : </label>
                        <input type="text" required="required">
                        <input type="hidden" name="nom" value="<?php $nomUse;?>">
                    </p>

                    <p><label for="prenom" class="d-flex flex-wrap">Prénom : </label>
                        <input type="text" required="required">
                        <input type="hidden" name="prenom" value="<?php $prenomUse;?>">
                    </p>

                    <p><label for="mdp" class="d-flex flex-wrap">Mot de passe (provisoire) : </label>
                        <input type="text" required="required">
                        <input type="hidden" name="mdp" value="<?php $mdpUse;?>">
                    </p>

                    <p><label for="email" class="d-flex flex-wrap">Email : </label>
                        <input type="text" required="required">
                        <input type="hidden" name="email" value="<?php $emailUse;?>">
                    </p>

                    <p><label for="addDate" class="d-flex flex-wrap">Date de naissance</label>
                        <input type="date" id="addDate" placeholder="jj/mm/aaaa" required="required">
                        <input type="hidden" name="dateNaissance" value="<?php $dateNaissance;?>">
                    </p>

                    <p><label for="adresse" class="d-flex flex-wrap">Adresse : </label>
                        <input type="text" required="required">
                        <input type="hidden" name="adresse" value="<?php $adresseUse;?>">
                    </p>

                    <p><label for="codepostal" class="d-flex flex-wrap">Code postal : </label>
                        <input type="text" required="required">
                        <input type="hidden" name="codePostal" value="<?php $acodePostal;?>">
                    </p>

                    <p><label for="ville" class="d-flex flex-wrap">Ville : </label>
                        <input type="text" required="required">
                        <input type="hidden" name="villeUse" value="<?php $villeUse;?>">
                    </p>

                    <div class="d-flex justify-content-evenly">
                        <input type="button" value="Aperçu" id="apercu">

                        <input type="submit" value="Confirmer nouvelle entrée" id="subEntree">
                    </div>
                </fieldset>
            </form>
        </div>
        <?php } ?>
        <!-- ////////////////////////////////////////////////////////////////////////GESTION ADHERENTS /////////////////////////////////////////////////////////////////////////////// -->
        <?php 
    if ($action == 'gestionAd'){ ?>

        <div>
            <h2>Faire une recherche</h2>
        </div>
        <div class="d-flex-wrap text justify-content-center">
            <form action="" method="get"></form>
            <div>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Entrez votre recherche ici"
                        name="recherche" required="required">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit" id="rechercher">Rechercher</button>
                    <input type="hidden" name="action" value="resRechercheAd">
                </form>
            </div>
        </div>
        <div class="d-flex-wrap text justify-content-center">
            <form action="" method="get"></form>
            <div>
                <form class="d-flex">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Afficher la liste des
                        utilisateurs</button>
                    <input type="hidden" name="action" value="afficheListUser">
                </form>
            </div>
        </div>
        <div>
            <div>

                <?php } ?>
                <!-- ////////////////////////////////////////////////////////////////////////SEARCH ADHERENTS /////////////////////////////////////////////////////////////////////////////// -->
                <?php 
if ($action == 'rechercheAd'){ ?>

                <div>
                    <h2>Faire une recherche</h2>
                </div>
                <div class="d-flex-wrap text justify-content-center">
                    <form action="" method="get"></form>
                    <div>
                        <form class="d-flex">
                            <input class="form-control me-sm-2" type="text" placeholder="Entrez votre recherche ici"
                                name="recherche" required="required">
                            <input type="hidden" name="action" value="resRechercheAd">

                            <button class="btn btn-secondary my-2 my-sm-0" type="submit"
                                id="rechercher">Rechercher</button>

                        </form>
                    </div>
                </div>
                <div class="d-flex-wrap text justify-content-center">
                    <form action="" method="get"></form>
                    <div>
                        <form class="d-flex">
                            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Afficher la liste des
                                utilisateurs</button>
                            <input type="hidden" name="action" value="afficheListUser">
                        </form>
                    </div>
                </div>
                <div>

                    <?php } ?>
                    <!-- ///////////////////////////////////////////////////////////////AFFICHE LISTE COMPLETE ADHERENTS ///////////////////////////////////////////////////////////////////// -->
                    <?php 
if ($action == 'afficheListUser'){ ?>
                    <div id="colonne2"
                        class="d-flex flex-column align-items-center justify-content-around border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-100 m-2 column d-flex flex-nowrap overflow-auto  ">

                        <div>
                            <h2>Faire une recherche</h2>
                        </div>
                        <div class="d-flex-wrap text justify-content-center">
                            <form action="" method="get"></form>
                            <div>
                                <form class="d-flex">
                                    <input class="form-control me-sm-2" type="text"
                                        placeholder="Entrez votre recherche ici" name="recherche" required="required">
                                    <button class="btn btn-secondary my-2 my-sm-0" type="submit"
                                        id="rechercher">Rechercher</button>
                                    <input type="hidden" name="action" value="resRechercheAd">
                                </form>
                            </div>
                        </div>
                        <div class="d-flex-wrap text justify-content-center">
                            <form action="" method="get"></form>
                            <div>
                                <form class="d-flex">
                                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Afficher la liste des
                                        utilisateurs</button>
                                    <input type="hidden" name="action" value="afficheListUser">
                                </form>
                            </div>
                        </div>
                        <div>
                            <h2>Résultats</h2>
                        </div>
                        <div class="d-flex flex-wrap justify-content-center overflow-auto table-responsive "
                            id="affiche">
                            <table class="table table-hover table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">N° Adhérent :</th>
                                        <th scope="col">Nom :</th>
                                        <th scope="col">Prénom :</th>
                                        <th scop="col">Email :</th>
                                        <th scope="col">Date de naissance :</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>


                                    </tr>
                                </thead>
                                <tbody id="album">
                                    <?php 

                        if (count($tResultats)>0){
                            foreach($tResultats as $lignes){
                                if ($lignes['ID_ROLE']=='1'){
                                echo '<tr><form action="" method="get"><th scope="row">'.$lignes['ID_USE'].'</th>
                                <td>'.$lignes['NOM_USE'].'</td>
                                <td>'.$lignes['PRENOM_USE'].'</td>
                                <td>'.$lignes['EMAIL_USE'].'</td>
                                <td>'.$lignes['DATENAISS_USE'].'</td>
                                <td><button class="btn btn-secondary my-2 my-sm-0" type="submit" >Modifier</button>
                                <input type="hidden" name="action" value="updateAd">
                                </td>
                                <td><button class="btn btn-secondary my-2 my-sm-0" type="submit" >Supprimer</button>
                                <input type="hidden" name="action" value="deleteAd">
                                <input type="hidden" name="idUse" value="'.$lignes['ID_USE'].'">

                                    </td>
                                    </form>
                                    </tr>';
                                    }
                                    }
                                    }else echo'<p> Aucun résultat </p>';
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>

                    <!-- ///////////////////////////////////////////////////////////////AFFICHE resultat search ADHERENTS ///////////////////////////////////////////////////////////////////// -->
                    <?php 
if ($action == 'resRechercheAd'){ ?>
                    <div id="colonne2"
                        class="d-flex flex-column align-items-center justify-content-around border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-100 m-2 column d-flex flex-nowrap overflow-auto  ">

                        <!-- <div class="d-flex justify-content-center d-flex flex-wrap btn-group" role="group"
                        aria-label="Basic radio toggle button group">
                        <form action="" method="get">
                            <input type="submit" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio1">Emprunt</label>
                            <input type="hidden" name="action" value="emprunt">
                        </form>
                        <form action="" method="get">
                            <input type="submit" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio2">Retour</label>
                            <input type="hidden" name="action" value="retour">
                        </form>
                        <form action="" method="get">
                            <input type="submit" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio3">Nouvel adhérent</label>
                            <input type="hidden" name="action" value="nouvelAd">
                        </form>
                        <form action="" method="get">
                            <input type="submit" class="btn-check" name="btnradio4" id="btnradio4" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio4">Gestion adhérents</label>
                            <input type="hidden" name="action" value="gestionAd">
                        </form> -->
                        <!-- </div> -->

                        <div>
                            <h2>Faire une recherche</h2>
                        </div>
                        <div class="d-flex-wrap text justify-content-center">
                            <form action="" method="get"></form>
                            <div>
                                <form class="d-flex">
                                    <input class="form-control me-sm-2" type="text"
                                        placeholder="Entrez votre recherche ici" name="recherche" required="required">
                                    <button class="btn btn-secondary my-2 my-sm-0" type="submit"
                                        id="rechercher">Rechercher</button>
                                    <input type="hidden" name="action" value="resRechercheAd">
                                </form>
                            </div>
                        </div>
                        <div class="d-flex-wrap text justify-content-center">
                            <form action="" method="get"></form>
                            <div>
                                <form class="d-flex">
                                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Afficher la liste des
                                        utilisateurs</button>
                                    <input type="hidden" name="action" value="afficheListUser">
                                </form>
                            </div>
                        </div>
                        <div>
                            <h2>Résultats</h2>
                        </div>
                        <div class="d-flex flex-wrap justify-content-center overflow-auto table-responsive "
                            id="affiche">
                            <table class="table table-hover table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">N° Adhérent :</th>
                                        <th scope="col">Nom :</th>
                                        <th scope="col">Prénom :</th>
                                        <th scop="col">Email :</th>
                                        <th scope="col">Date de naissance :</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>


                                    </tr>
                                </thead>
                                <tbody id="album">
                                    <?php 

    if (count($resultat)>0){
        foreach($resultat as $lignes){
            if ($lignes['ID_ROLE']=='1'){
            echo '<tr><form action="" method="get"><th scope="row">'.$lignes['ID_USE'].'</th>
            <td>'.$lignes['NOM_USE'].'</td>
            <td>'.$lignes['PRENOM_USE'].'</td>
            <td>'.$lignes['EMAIL_USE'].'</td>
            <td>'.$lignes['DATENAISS_USE'].'</td>
            <td><button class="btn btn-secondary my-2 my-sm-0" type="submit" >Modifier</button>
            <input type="hidden" name="action" value="updateAd">
            </td>
            <td><button class="btn btn-secondary my-2 my-sm-0" type="submit" >Supprimer</button>
            <input type="hidden" name="action" value="deleteAd">
            <input type="hidden" name="idUse" value="<?php echo $lignes[\'ID_USE\'];?>">


                                    </td>
                                    </form>
                                    </tr>';
                                    }
                                    }
                                    }else echo'<p> Aucun résultat </p>';
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- ///////////////////////////////////////////////////////////////vue delete ADHERENTS ///////////////////////////////////////////////////////////////////// -->
                    <?php 
if ($action == 'deleteAd'){ ?>
                    <!-- <div class="d-flex justify-content-center d-flex flex-wrap btn-group" role="group"
                aria-label="Basic radio toggle button group">
                <form action="" method="get">
                    <input type="submit" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio1">Emprunt</label>
                    <input type="hidden" name="action" value="emprunt">
                </form>
                <form action="" method="get">
                    <input type="submit" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2">Retour</label>
                    <input type="hidden" name="action" value="retour">
                </form>
                <form action="" method="get">
                    <input type="submit" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio3">Nouvel adhérent</label>
                    <input type="hidden" name="action" value="nouvelAd">
                </form>
                <form action="" method="get">
                    <input type="submit" class="btn-check" name="btnradio4" id="btnradio4" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio4">Gestion adhérents</label>
                    <input type="hidden" name="action" value="gestionAd">
                </form>
            </div> -->

                    <div>
                        <h2>Faire une recherche</h2>
                    </div>
                    <div class="d-flex-wrap text justify-content-center">
                        <form action="" method="get"></form>
                        <div>
                            <form class="d-flex">
                                <input class="form-control me-sm-2" type="text" placeholder="Entrez votre recherche ici"
                                    name="recherche" required="required">
                                <input type="hidden" name="action" value="resRechercheAd">

                                <button class="btn btn-secondary my-2 my-sm-0" type="submit"
                                    id="rechercher">Rechercher</button>

                            </form>
                        </div>
                    </div>
                    <div class="d-flex-wrap text justify-content-center">
                        <form action="" method="get"></form>
                        <div>
                            <form class="d-flex">
                                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Afficher la liste des
                                    utilisateurs</button>
                                <input type="hidden" name="action" value="afficheListUser">
                            </form>
                        </div>
                    </div>
                    <div>

                        <?php } ?>


                    </div>
                    <?php } ?>