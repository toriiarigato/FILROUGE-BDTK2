<!---------------------------------------------------------------------- GESTIONNAIRE DE FOND ----------------------------------------------------------------------------->
<?php 

spl_autoload_register(function($classe){
    include "../Modele/classes/" . $classe . ".class.php";
});

    if ($action == 'serie' or $action == 'addSerie' or $action == 'addSerieMaj' or $action == 'Supprimer Serie' or $action == "Modifier Serie" or $action == "modifMaj" or $action == "listSerie"  or $action == "searchSerie" or $action == "album" or $action == "listAlbum" or $action == "searchAlbum" or $action == "addAlbum"){ ?>

<!--Div centrale-->
<div id="colonne2"
    class="d-flex flex-column column align-items-center border border-3 rounded rounded-3 shadow p-3 bg-body rounded m-2 ">

    <div class="d-flex justify-content-center d-flex flex-wrap btn-group" role="group"
        aria-label="Basic radio toggle button group">
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio1">Serie</label>
            <input type="hidden" name="action" value="serie">
        </form>
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio2">Album</label>
            <input type="hidden" name="action" value="album">
        </form>
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio3">Exemplaire</label>
            <input type="hidden" name="action" value="exemplaire">
        </form>
        <form action="" method="get">
            <input type="submit" class="btn-check" name="btnradio4" id="btnradio4" autocomplete="off">
            <label class="btn btn-outline-primary" for="btnradio4">Auteur</label>
            <input type="hidden" name="action" value="auteur">
        </form>
    </div>
    <?php } ?>

    <?php  
    if ($action == 'serie'){ ?>
    <hr>

    <form method="get" action="">
        <input type="submit" value="Ajouter une serie">
        <input type="hidden" name="action" value="addSerie">
    </form>
    <form method="get" action="">
        <input type="submit" value="Afficher la liste des series">
        <input type="hidden" name="action" value="listSerie">
    </form>
    <form method="get" action="">
        <input type="text" placeholder="Rechercher une serie" name="searchOneSerie" required="required">
        <input type="submit" value="Rechercher">
        <input type="hidden" name="action" value="searchSerie">
    </form>

    <?php } ?>

    <?php  
    if ($action == 'listSerie'){ ?>
    <!-- Div de serie-->
    <hr>
    <form action="">
        <input type="submit" value="Retour">
        <input type="hidden" name="action" value="serie">
    </form>

    <div class="d-flex flex-wrap justify-content-center ">
        </br>
        <?php
    foreach($tSerie as $ligne) {
?>
        <form method="get" action="" class="border-3 rounded center rounded-2 shadow p-3 m-2 overflow-auto">
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
?>

    </div>
    <hr>
    <form action="">
        <input type="submit" value="Retour">
        <input type="hidden" name="action" value="serie">
    </form>
    <?php } ?>

    <?php if ($action == 'searchSerie') { ?>
    <?php if (count($tResultat)>0){
    foreach($tResultat as $ligne) {
?>
    <form method="get" action="" class="border-3 rounded rounded-2 shadow p-3 m-2 overflow-auto">
        <?php       echo  $ligne[1] . 
            "<input type=\"hidden\" name=\"libSerieDel\" value=\"<?php echo $ligne[1] ?>\">
        <input type=\"hidden\" name=\"codeEmpDel\" value=\"<?php echo $ligne[2] ?>\">
        <input type=\"hidden\" name=\"idSerieDel\" value=\"<?php echo $ligne[0] ?>\">
        <br><input type=\"submit\" name=\"action\" value=\"Modifier Serie\">
        <input type=\"submit\" name=\"action\" value=\"Supprimer Serie\">";
        ?>
    </form>
    <?php    
    }
}else echo'<p> Aucun résultat </p>';
?>

    <form action="">
        <input type="submit" value="Retour">
        <input type="hidden" name="action" value="serie">
    </form>

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
            <input type="text" name="modifLibSerie" id="libSerie" required="required" value="<?php echo $trimmed; ?>" />
            <br />

            <label for="codeEmp">Code Emplacement </label>
            <input type="text" name="modifCodeEmp" id="codeEmp" required="required"
                value="<?php echo $ancientCodeEmp; ?>" />
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
    <?php echo $msgCheck; ?>
    <form action="">
        <input type="submit" value="Retour">
        <input type="hidden" name="action" value="serie">
    </form>
    <?php } ?>

    <?php  
    if ($action == 'album'){ ?>
    <hr>

    <form method="get" action="">
        <input type="submit" value="Ajouter un album">
        <input type="hidden" name="action" value="addAlbum">
    </form>
    <form method="get" action="">
        <input type="submit" name ="demarrageListe" value="Afficher la liste des albums">
        <input type="hidden" name="action" value="listAlbum">
    </form>
    <form method="get" action="">
        <input type="text" placeholder="Rechercher un album" name="searchOneAlbum" required="required">
        <input type="submit" value="Rechercher">
        <input type="hidden" name="action" value="searchAlbum">
    </form>
    <?php } ?>

    <?php  
    if ($action == 'listAlbum'){ ?>
    <!-- Div de serie-->
    <hr>
    <form action="">
        <input type="submit" value="Retour">
        <input type="hidden" name="action" value="album">
    </form>

    <div class="d-flex flex-wrap justify-content-center overflow-auto ">
        </br>
<?php
    foreach($tAlbum as $ligne)  {   
?>
 <?php      echo "<form method=\"get\" action=\"\" class=\"d-flex flex-column column align-items-center\">".
                     $ligne["TITRE_ALBUM"]  .
            "<img src=\"../SRC/albumsMini/" .$ligne["LIB_POCH_ALB"] ."\">\n".
            "<input type=\"hidden\" name=\"numAlb\" value=".$ligne['NUMERO_ALBUM'] . ">
            <input type=\"hidden\" name=\"titreAlb\" value=" . $ligne["TITRE_ALBUM"] . ">
            <input type=\"hidden\" name=\"numSaga\" value=". $ligne["NUMERO_SAGA"] . ">
            <input type=\"hidden\" name=\"idSerieAlb\" value=" . $ligne["IDENTIFIANT_SERIE"] .">
            <br><input type=\"submit\" name=\"action\" value=\"Détails\">
            <input type=\"submit\" name=\"action\" value=\"Modifier Album\">
            <input type=\"submit\" name=\"action\" value=\"Supprimer Album\">";
            ?>
        </form>
        <?php    
    }
?>
    </div>
    <hr>
    <form action="">
        <input type="submit" value="Retour">
        <input type="hidden" name="action" value="album">
    </form>
    <?php } ?>

<?php if ($action == 'searchAlbum') { ?>
    <?php if (count($tResultat)>0){
    foreach($tResultat as $ligne) {
?>
    <form method="get" action="" class="border-3 rounded rounded-2 shadow p-3 m-2 overflow-auto">
        <?php       echo  $ligne[1] . 
        "<input type=\"hidden\" name=\"numAlb\" value=\"<?php echo $ligne[0] ?>\">
        <input type=\"hidden\" name=\"titreAlb\" value=\"<?php echo $ligne[1] ?>\">
        <input type=\"hidden\" name=\"numSaga\" value=\"<?php echo $ligne[2] ?>\">
        <br><input type=\"submit\" name=\"action\" value=\"Modifier Album\">
        <input type=\"submit\" name=\"action\" value=\"Supprimer Album\">";
        ?>
    </form>
    <?php    
    }
}else echo'<p> Aucun résultat </p>';
?>

    <form action="">
        <input type="submit" value="Retour">
        <input type="hidden" name="action" value="album">
    </form>

    <?php } ?>

    
<?php  if ($action == 'addAlbum' or $action == "Modifier Album"){ ?>

<form method="get" action="">
    <fieldset class="">
        <?php  if ($action != "Modifier Album"){ ?>
        <label for="numAlb"> Numéro Album</label>
        <input type="text" name="numAlb" id="numAlb" required="required" />
        <br />

        <label for="titreAlb">Titre de l'album</label>
        <input type="text" name="titreAlb" id="titreAlb" required="required" />
        <br />

        <label for="numSaga"> Numéro dans la saga </label>
        <input type="text" name="numSaga" id="numSaga" required="required" />
        <br />

        <label for="prixAlb"> Prix de l'album </label>
        <input type="text" name="prixAlb" id="prixAlb" required="required" />
        <br />

        <label for="idAuteur">Identifiant de l'auteur</label>
        <input type="text" name="idAuteur" id="idAuteur" required="required" />
        <br />

        <label for="idSerie"> Identifiant de la serie </label>
        <input type="text" name="idSerie" id="idSerie" required="required" />
        <br />

        <label for="idUser"> Votre identifiant </label>
        <input type="text" name="idSerie" id="idSerie" value="<?php echo $_SESSION['user']['ID_USE']; ?>" required="required" />
        <br />

        <label for="idLibAlb"> Libellé de la pochette </label>
        <input type="text" name="idLibAlb" id="idLibAlb" required="required" />
        <br />


        <input type="submit" value="Ajouter nouvelle serie" />
        <input type="hidden" name="action" value="addSerieMaj">
        <?php } ?>


        <?php  if($action == "Modifier Serie"){ ?>

        <label for="libSerie">Libellé serie</label>
        <input type="text" name="modifLibSerie" id="libSerie" required="required" value="<?php echo $trimmed; ?>" />
        <br />

        <label for="codeEmp">Code Emplacement </label>
        <input type="text" name="modifCodeEmp" id="codeEmp" required="required"
            value="<?php echo $ancientCodeEmp; ?>" />
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
    <input type="hidden" name="action" value="album">
</form>


<?php } ?>


    <?php

    if ($action == 'bibli'or $action == 'emprunt'or $action == 'retour'or $action == 'nouvelAd'or $action == 'gestionAd'or $action == 'rechercheAd' or $action == "afficheListUser" or $action == 'resRechercheAd' or $action == 'deleteAd'or $action == 'createUse'or $action == 'updateAd'or $action == 'updateUse'){?>
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

        <?php } ?>

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
    if ($action == 'nouvelAd' or $action == 'createUse'){ ?>

            <div class="d-flex flex-wrap justify-content-center" id="newEntryDiv">
                <form method="GET" action="../controler/index.test.aure.php" id="form">
                    </br>
                    <fieldset class="d-flex flex-column justify-content-evenly">
                        <p><?php echo $messageCreate;?></p>

                        <p><label for="nom" class="d-flex flex-wrap">Nom : </label>
                            <input type="text" required="required" name="nom" value="<?php echo $nomUse;?>">
                            <!-- <input type="hidden" name="nom" value="<?php $nomUse;?>"> -->
                        </p>

                        <p><label for="prenom" class="d-flex flex-wrap">Prénom : </label>
                            <input type="text" required="required" name="prenom" value="<?php  echo $prenomUse;?>">
                            <!-- <input type="hidden" name="prenom" value="<?php $prenomUse;?>"> -->
                        </p>

                        <p><label for="mdp" class="d-flex flex-wrap">Mot de passe (provisoire) : </label>
                            <input type="text" required="required" name="mdp" value="<?php  echo $mdpUse;?>">
                            <!-- <input type="hidden" name="mdp" value="<?php $mdpUse;?>"> -->
                        </p>

                        <p><label for="email" class="d-flex flex-wrap">Email : </label>
                            <input type="text" required="required" name="email" value="<?php  echo $emailUse;?>">
                            <!-- <input type="hidden" name="email" value="<?php $emailUse;?>"> -->
                        </p>

                        <p><label for="addDate" class="d-flex flex-wrap">Date de naissance</label>
                            <input type="date" id="addDate" placeholder="jj/mm/aaaa" required="required"
                                name="dateNaissance" value="<?php  echo $dateNaissance;?>">
                            <!-- <input type="hidden" name="dateNaissance" value="<?php $dateNaissance;?>"> -->
                        </p>

                        <p><label for="adresse" class="d-flex flex-wrap">Adresse : </label>
                            <input type="text" required="required" name="adresse" value="<?php  echo $adresseUse;?>">
                            <!-- <input type="hidden" name="adresse" value="<?php $adresseUse;?>"> -->
                        </p>

                        <p><label for="codepostal" class="d-flex flex-wrap">Code postal : </label>
                            <input type="text" required="required" name="codePostal" value="<?php  echo $codePostal;?>">
                            <!-- <input type="hidden" name="codePostal" value="<?php $codePostal;?>"> -->
                        </p>

                        <p><label for="ville" class="d-flex flex-wrap">Ville : </label>
                            <input type="text" required="required" name="villeUse" value="<?php  echo $villeUse;?>">
                            <!-- <input type="hidden" name="villeUse" value="<?php $villeUse;?>"> -->
                        </p>

                        <div class="d-flex justify-content-evenly">
                            <input type="button" value="Aperçu" id="apercu">

                            <input type="submit" value="Confirmer nouvelle entrée" id="subEntree">
                            <input type="hidden" name="action" value="createUse">
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
                                            placeholder="Entrez votre recherche ici" name="recherche"
                                            required="required">
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
                                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Afficher la liste
                                            des
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
                                <td><button class="btn btn-secondary my-2 my-sm-0" type="submit" name="action" value="updateAd">Modifier</button>
                                <input type="hidden" name="idUse" value="'.$lignes['ID_USE'].'">
                                </td>
                                <td><button class="btn btn-secondary my-2 my-sm-0" type="submit" value="deleteAd">Supprimer</button>
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
    if ($action == 'resRechercheAd' or $action == 'updateUse'){ ?>
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
                                            placeholder="Entrez votre recherche ici" name="recherche"
                                            required="required">
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
                                        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Afficher la liste
                                            des
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
            <input type="hidden" name="idUse" value="'.$lignes['ID_USE'].'">
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
                                        <p><?php echo $erreur;?></p>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- ///////////////////////////////////////////////////////////////vue delete ADHERENTS ///////////////////////////////////////////////////////////////////// -->
                        <?php 
    if ($action == 'deleteAd'){ ?>

                        <div>
                            <h2>Faire une recherche</h2>
                        </div>
                        <div class="d-flex-wrap text justify-content-center">
                            <form action="" method="get"></form>
                            <div>
                                <form class="d-flex">
                                    <input class="form-control me-sm-2" type="text"
                                        placeholder="Entrez votre recherche ici" name="recherche" required="required">
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

                        <p><?php echo $message ;?></p>
                        <!-- ///////////////////////////////////////////////////////////////vue update ADHERENTS ///////////////////////////////////////////////////////////////////// -->
                        <?php } ?>
                        <?php
if ($action == 'updateAd'){ ?>

                        <div class="d-flex flex-wrap justify-content-center" id="newEntryDiv">
                            <form method="GET" action="../controler/index.test.aure.php" id="form">
                                </br>
                                <fieldset class="d-flex flex-column justify-content-evenly">
                                    <p><?php echo $messageCreate;?></p>

                                    <p><label for="nom" class="d-flex flex-wrap">Nom : </label>
                                        <input type="text" required="required" name="nom"
                                            value="<?php echo $oldUser['NOM_USE'];?>">
                                        <input type="hidden" name="oldNom" value="<?php echo $oldUser['NOM_USE'];?>">
                                    </p>

                                    <p><label for="prenom" class="d-flex flex-wrap">Prénom : </label>
                                        <input type="text" required="required" name="prenom"
                                            value="<?php  echo $oldUser['PRENOM_USE'];?>">
                                        <input type="hidden" name="oldPrenom"
                                            value="<?php echo $oldUser['PRENOM_USE'];?>">
                                    </p>

                                    <p><label for="mdp" class="d-flex flex-wrap">Mot de passe (provisoire) : </label>
                                        <input type="text" required="required" name="mdp"
                                            value="<?php echo $oldUser['MDP_USE'];?>">
                                        <input type="hidden" name="oldmdp" value="<?php echo $oldUser['MDP_USE'];?>">
                                    </p>

                                    <p><label for="email" class="d-flex flex-wrap">Email : </label>
                                        <input type="text" required="required" name="email"
                                            value="<?php echo $oldUser['EMAIL_USE'];?>">
                                        <input type="hidden" name="oldemail"
                                            value="<?php echo $oldUser['EMAIL_USE'];?>">
                                    </p>

                                    <p><label for="addDate" class="d-flex flex-wrap">Date de naissance</label>
                                        <input type="date" id="addDate" placeholder="jj/mm/aaaa" required="required"
                                            name="dateNaissance" value="<?php echo  $oldUser['DATENAISS_USE'];?>">
                                        <input type="hidden" name="olddatenaissance"
                                            value="<?php echo $oldUser['DATENAISS_USE'];?>">
                                    </p>

                                    <p><label for="adresse" class="d-flex flex-wrap">Adresse : </label>
                                        <input type="text" required="required" name="adresse"
                                            value="<?php echo $oldUser['ADR_USE'];?>">
                                        <input type="hidden" name="oldadresse"
                                            value="<?php echo $oldUser['ADR_USE'];?>">
                                    </p>

                                    <p><label for="codepostal" class="d-flex flex-wrap">Code postal : </label>
                                        <input type="text" required="required" name="codePostal"
                                            value="<?php echo $oldUser['CP_USE'];?>">
                                        <input type="hidden" name="oldcodePostal"
                                            value="<?php echo $oldUser['CP_USE'];?>">
                                    </p>

                                    <p><label for="ville" class="d-flex flex-wrap">Ville : </label>
                                        <input type="text" required="required" name="villeUse"
                                            value="<?php echo $oldUser['VILLE_USE'];?>">
                                        <input type="hidden" name="oldvilleUse"
                                            value="<?php echo $oldUser['VILLE_USE'];?>">
                                    </p>

                                    <p><label for="addDate" class="d-flex flex-wrap">Date de validité de cotisation
                                            :</label>
                                        <input type="date" id="addDate" placeholder="jj/mm/aaaa" required="required"
                                            name="datevalcot" value="<?php echo  $oldUser['DATE_VAL_COTIS'];?>">
                                        <input type="hidden" name="olddatevalcot"
                                            value="<?php echo $oldUser['DATE_VAL_COTIS'];?>">
                                    </p>


                                    <input type="submit" value="Confirmer modification adhérent" id="subEntree">
                                    <input type="hidden" name="action" value="updateUse">
                        </div>
                        </fieldset>
                        </form>
                    </div>
                    <?php } ?>


                    <!-------------------------------------------------------------------------- RESPONSABLE --------------------------------------------------------------------------------->
                    <?php 
    if ($action == 'responsable'){ ?>


                    <!--Div centrale-->
                    <div id="colonne2"
                        class="d-flex flex-column align-items-center justify-content-around border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-100 m-2 col-8">



                        <div class="d-flex flex-wrap btn-group" role="group"
                            aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off"
                                checked="checked">
                            <label class="btn btn-outline-primary" for="btnradio1">BD non rapportées à ce jour</label>
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio2">Toutes les BD non rapportées</label>
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                            <label class="btn btn-outline-primary" for="btnradio3">Statistiques</label>
                        </div>


                        </tbody>
                        </table>
                    </div>
                </div>
                <?php } ?>
                <!-- ///////////////////////////////////////////////////////////////vue delete ADHERENTS ///////////////////////////////////////////////////////////////////// -->
                <?php 
if ($action == 'deleteAd'){ ?>
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
                <?php } ?>