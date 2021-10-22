<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BDTK</title> <!-- à modifier en fonction de la page -->
    <link rel="stylesheet" href="../ASSETS/CSS/all.min.css" />
    <link rel="stylesheet" href="../ASSETS/CSS/bootstrap.min.css" />
    <link rel="stylesheet" href="../ASSETS/CSS/gestionnaire.css" />
    <!-- <script src="../ASSETS/JS/gestionnairesecu.js"></script> -->
</head>


<!-- <body background="../SRC/bg.jpg"> -->



<!-- RIEN AU DELA POUR LE LOGIN NI POUR OUBLIMDP NI POUR DETAILS-->


<?php 
        if ($action == 'adherent'){ ?>
<!---------- ADHERENT ----------->
<div class="container d-flex flex-nowrap text justify-content-around h-100 d-inline-block">
    <div id="colonne1" class="border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-200  ">
        <div name="titre">
            <h1>Mon Compte</h1>
        </div>
        <div name="identifiant">
            <p id="idConnecté">Connecté en tant que :</p>
            <p> <?php echo $_SESSION['user']['PRENOM_USE'].", ". $_SESSION['user']['NOM_USE']; ?> </p>
            <?php switch ($_SESSION['user']['ID_ROLE']){
                            case '1':
                                $roles = 'Adhérent';
                                break;
                            case '2':
                                $roles = 'Bibliothécaire';
                                break;
                            case '3':
                                $roles = 'Gestionnaire de fond';
                                break;
                            case '4':
                                $roles = 'Responsable';
                                break;
                        } ?>
            <p> <?php echo $roles; ?> </p>
            <div><img src="../albums/KARADOK.png" alt=""></div>
            <input type="button" value="Changer mon avatar">
            <p class="text-danger"> FONCTIONNALITE EN TRAVAUX</p>
        </div>
        <div>
            <p>Cotisation:</p>
            <br>
            <p>
                BD empruntéé(s):
            </p>
            <ul>
                <li>Toto, et ça vous fait rire...</li>
                <p>Empruntée le : 16/07/2021</p>
                <p>A rendre le : 20/07/2021</p>
            </ul>
        </div>
        <div>
            <form action="" method="get" id="form">
                <input type="submit" name="deco" value="Déconnexion" id="deco" />
                <input type="hidden" name="action" value="accueil">
            </form>

        </div>
    </div>
    <!------------------------------->

    <?php } ?>
    <?php 



    if ($action == 'bibli' or $action == 'serie' or $action == 'addSerie' or $action == 'addSerieMaj' or $action == 'Supprimer Serie' or $action == "Modifier Serie" or $action == "modifMaj" or $action == "listSerie" or $action == "searchSerie" or $action == "album" or $action == "listAlbum" or $action == "searchAlbum" or $action == "addAlbum" or $action == 'responsable'or $action == 'emprunt'or $action == 'retour'or $action == 'nouvelAd'or $action == 'gestionAd'or $action == 'rechercheAd' ){ ?>

    <!-- Fonctionnne pour le GESTIONNAIRE DE FOND, LE RESPONSABLE ET LE BIBLIOTHECAIRE vu que les pages sont trés similaires -->
    <!--Grande Div qui englobe tout-->
    <div class="container-fluid d-flex flex-wrap text justify-content-around row sm-d-flex flex-nowrap">

        <!--Div de deconnexion-->
        <div id="colonne1"
            class="d-flex flex-column align-items-center justify-content-around border border-3 rounded rounded-3 shadow p-3 bg-body rounded h-100 m-2 column">
            <div>
                <p id="idConnecté">Connecté en tant que :</p>
                <p> <?php echo $_SESSION['user']['PRENOM_USE'].", ". $_SESSION['user']['NOM_USE']; ?> </p>
                <?php switch ($_SESSION['user']['ID_ROLE']){
                            case '1':
                                $roles = 'Adhérent';
                                break;
                            case '2':
                                $roles = 'Bibliothécaire';
                                break;
                            case '3':
                                $roles = 'Gestionnaire de fond';
                                break;
                            case '4':
                                $roles = 'Responsable';
                                break;
                        } ?>
                <p> <?php echo $roles; ?> </p>
            </div>
            <div>
                <form action="" method="get" id="form">
                    <input type="submit" name="deco" value="Déconnexion" id="deco" />
                    <input type="hidden" name="action" value="accueil">
                </form>
            </div>
            </br>

        </div>
        <!------------------------------->
        <?php } ?>


        <?php 


    if ($action == 'afficheListUser' or $action == 'resRechercheAd' or $action == 'deleteAd'or $action == 'createUse' or $action == 'updateAd' or $action == 'updateUse'){ ?>


        <!-- Fonctionnne pour le GESTIONNAIRE DE FOND, LE RESPONSABLE ET LE BIBLIOTHECAIRE vu que les pages sont trés similaires -->
        <!--Grande Div qui englobe tout-->
        <div class="container-fluid justify-content-around row sm-d-flex flex-nowrap">

            <!--Div de deconnexion-->
            <div id="colonne1"
                class="d-flex flex-column align-items-center justify-content-around border border-3 rounded rounded-3 shadow p-3 bg-body rounded  m-2 column w-25 p-3">
                <div>
                    <p id="idConnecté">Connecté en tant que :</p>
                    <p> <?php echo $_SESSION['user']['PRENOM_USE'].", ". $_SESSION['user']['NOM_USE']; ?> </p>
                    <?php switch ($_SESSION['user']['ID_ROLE']){
                            case '1':
                                $roles = 'Adhérent';
                                break;
                            case '2':
                                $roles = 'Bibliothécaire';
                                break;
                            case '3':
                                $roles = 'Gestionnaire de fond';
                                break;
                            case '4':
                                $roles = 'Responsable';
                                break;
                        } ?>
                    <p> <?php echo $roles; ?> </p>
                </div>
                <div>
                    <form action="" method="get" id="form">
                        <input type="submit" name="deco" value="Déconnexion" id="deco" />
                        <input type="hidden" name="action" value="accueil">
                    </form>
                </div>
                </br>

            </div>
            <!------------------------------->
            <?php } ?>