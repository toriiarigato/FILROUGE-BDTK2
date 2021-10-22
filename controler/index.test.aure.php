<?php
spl_autoload_register(function($classe){
    include "../Modele/classes/" . $classe . ".class.php";
});

session_start();

$action = 'accueil';
// print_r($action);

$id = $mdp = $role = '';
$msgErreur = '';
$idSerie = "";
$libSerie = "";
$codeEmp = "";
$nomUse = "";
$prenomUse = "";
$mdpUse = "";
$emailUse = "";
$dateNaissance = "";
$adresseUse = "";
$codePostal = "";
$villeUse = "";
$erreur = "";
$message = "";
$idRole = 1;
$libAvatar = "";
$today = new DateTime();
$dateValCot = date_format($today,"Y-m-d");
$idUserCreate = 3;
$idUserUpdate = NULL;
$idUserdel = NULL;
$messageCreate = "";


$libSerieDel = "";
$codeEmpDel = "";
$idSerieDel = "";
$tSerie = [];
$tAlbum = [];
$resultat = [];
$msgCheck = "Opération effectuée";
$numAlb ="";
$titreAlb ="";
$numSaga = "";
$idUserModif = NULL;
$idUserDelete = NULL;


if (isset($_GET['recherche'])){
    $recherche = $_GET['recherche'];
    $resultat = UserMgr::searchUser($recherche);
}

if (isset($_GET['idUse'])){
    $idUse = $_GET['idUse'];
    $oldUser = UserMgr::getUserById2($idUse);
    // print_r($_GET['idUse']);
}

if (isset($_GET['nom']) || isset($_GET['prenom'])){
    $nomUse = $_GET['nom'];
    $prenomUse = $_GET['prenom'];
    $mdpUse = $_GET['mdp'];
    $emailUse = $_GET['email'];
    $dateNaissance = $_GET['dateNaissance'];
    $adresseUse = $_GET['adresse'];
    $codePostal = $_GET['codePostal'];
    $villeUse = $_GET['villeUse'];
    
}

if (isset($_GET['nom'])){
    $newNom = $_GET['nom'];
}

// print_r($_GET);
// if (isset($_SESSION['user'])){
//     print_r($_SESSION['user']);
// }

if (isset($_GET['action'])){
    $action=$_GET['action'];

}

if (isset($_GET['id'],$_GET['motdepass'])){
    $id = $_GET['id'];
    $mdp = $_GET['motdepass'];
}



// if (isset($_GET['recherche'])){
//     $recherche = $_GET['recherche'];
//     $_SESSION['recherche'] = $recherche;
// }



if (isset($_GET['idSerie'],$_GET['libSerie'],$_GET['codeEmp'])) {
    $idSerie = $_GET['idSerie'];
    $libSerie = $_GET['libSerie'];
    $codeEmp = $_GET['codeEmp'];
}   

if (isset($_GET['libSerieDel'])) {
    $libSerieDel = $_GET['libSerieDel'];
    $codeEmpDel = $_GET['codeEmpDel'];
    $idSerieDel = $_GET['idSerieDel'];

}   
if (isset($_GET['searchOneSerie'])){
    $searchOneSerie = $_GET['searchOneSerie'];
    $tResultat = SerieMgr::searchSerie($searchOneSerie);
}

if (isset($_GET['searchOneAlbum'])){
    $searchOneAlbum = $_GET['searchOneAlbum'];
    $tResultat = AlbumMgr::searchAlbum($searchOneAlbum);
}




switch ($action){
////////////////////////////////////////////////////////////////////////LOGIN ///////////////////////////////////////////////////////////////////////////////
    case 'accueil':
        unset($_SESSION['user']);

        require('../views/view.header.php');
        require('../views/view.login.php');
        require('../views/view.footer.php');

    break;
////////////////////////////////////////////////////////////////////////CONNEXION ///////////////////////////////////////////////////////////////////////////////
    case 'connexion':
        $msgErreur = '';
        require('../Modele/classes/Bdtk.class.php');
        require('../Modele/classes/UserMgr.class.php');
        $flag = UserMgr::connect($id,$mdp);
        if($flag == 1){

            // echo 'SESSION:';print_r($_SESSION);
            $user = UserMgr::getUserById($id);
            $_SESSION["user"] = $user;
            $role = $user['ID_ROLE'];
            $_SESSION["role"]= $role;
            // var_dump($role);
            switch ($role){
                case "1":
                    $action = 'adherent';
                    break;
                case "2" :
                    $action = 'bibli';
                    break;
                case "3" :
                    $action = 'serie';
                    break;
                case "4" :
                    $action = 'responsable';
                    break;
            }
            $_SESSION["action"] = $action;
            // var_dump($action);
            header('location:../controler/index.test.aure.php?action='.$_SESSION["action"]);
            // var_dump($_SESSION["user"]);
            
            break;
        } else{
            
            $action = 'erreur';
            $_SESSION["action"] = $action;
            header('location:../controler/index.test.aure.php?action='.$_SESSION["action"]);
        }
    break;
////////////////////////////////////////////////////////////////////////ERREUR LOGIN ///////////////////////////////////////////////////////////////////////////////
    case 'erreur':
        echo $msgErreur = 'E-mail ou Mot de Passe erroné ou inconnu'; 
        require('../views/view.header.php');
        require('../views/view.login.php');
        require('../views/view.footer.php');
    
        break;

////////////////////////////////////////////////////////////////////////OUBLI MDP ///////////////////////////////////////////////////////////////////////////////

    case 'oubliMdp':
        require('../views/view.header.php');
        require('../views/view.login.php');
        require('../views/view.footer.php');
        break;
////////////////////////////////////////////////////////////////////////BIBLIOTHECAIRE ///////////////////////////////////////////////////////////////////////////////
    case 'bibli':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;
        //---------------------------------------------------------------- EMPRUNTS -------------------------------------------------------------------------
    case 'emprunt':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;
        //---------------------------------------------------------------- RETOURS -------------------------------------------------------------------------
    case 'retour':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;
        //---------------------------------------------------------------- NOUVEL ADHERENT -------------------------------------------------------------------------
    case 'nouvelAd':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;
        //---------------------------------------------------------------- controle et affiche nouvel ADHERENT -------------------------------------------------------------------------
        case 'createUse':
            require('../Modele/classes/UserMgr.class.php');
            require('../Modele/classes//User.class.php');
            require('../Modele/classes/Bdtk.class.php');
            $resultEmail = UserMgr::checkDoublonEmail($emailUse);
            if (is_numeric($nomUse)){
                $messageCreate = "Le nom ne doit comporter que des lettres";
            }elseif(is_numeric($prenomUse)){
                $messageCreate = "Le prenom ne doit comporter que des lettres";

            }elseif(!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $mdpUse)){
                $messageCreate = "Mot de passe au format invalide";

            }elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$emailUse)){
                $messageCreate = "Email au format invalide";

            }elseif(!is_numeric($codePostal)){
                $messageCreate = "Le code postal doit comporter des chiffres";
            
            }elseif($resultEmail>0){
                $messageCreate = "L'email existe déjà dans la base de données";
            }else{
            $newUser = new User($nomUse,$prenomUse,$mdpUse,$emailUse,$idRole,$libAvatar,$dateNaissance,$adresseUse,$codePostal,$villeUse,$idUserCreate,$idUserUpdate,$dateValCot,$idUserdel);
            // var_dump($newUser);
            try{
                UserMgr ::addUser($newUser);
            $messageCreate = "l'adhérent ". $newUser->getNomUser().",".$newUser->getPrenomUser(). " a bien été créé";
            }catch (Exception $e) {
                echo $e->getMessage();
            }
        }
            if ($_SESSION['user']['ID_ROLE']=='2'){
                $tResultats = (UserMgr::getListUser());
                require('../views/view.header.php');
                require('../views/view.formulaire.php');
            }else{
                $action = 'accueil';
                header('location:../controler/index.test.aure.php');
                unset($_SESSION['user']);
            }
            break;
        //---------------------------------------------------------------- update ADHERENT -------------------------------------------------------------------------
    case'updateAd':
            // echo $idUse;
            if ($_SESSION['user']['ID_ROLE']=='2'){
                // $tResultats = (UserMgr::getListUser());
                require('../views/view.header.php');
                require('../views/view.formulaire.php');
            }else{
                $action = 'accueil';
                header('location:../controler/index.test.aure.php');
                unset($_SESSION['user']);
            }
            break;
        //---------------------------------------------------------------- controle et affiche update ADHERENT -------------------------------------------------------------------------
    case'updateUse':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            $oldUser = UserMgr::getUserById($_GET['oldemail']);
            // echo $_GET['email'];
            $resultEmail = UserMgr::checkDoublonEmail($_GET['email']);
            // var_dump($resultEmail) ;
            if (is_numeric($_GET['nom'])){
                $messageCreate = "Le nom ne doit comporter que des lettres";
                require('../views/view.header.php');
                require('../views/view.formulaire.php');
            }elseif(is_numeric($_GET['prenom'])){
                $messageCreate = "Le prenom ne doit comporter que des lettres";
                require('../views/view.header.php');
                require('../views/view.formulaire.php');
                
            }elseif(!preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $mdpUse)){
                $messageCreate = "Mot de passe au format invalide";
                require('../views/view.header.php');
                require('../views/view.formulaire.php');

            }elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$emailUse)){
                $messageCreate = "Email au format invalide";
                require('../views/view.header.php');
                require('../views/view.formulaire.php');

            }elseif(!is_numeric($codePostal)){
                $messageCreate = "Le code postal doit comporter des chiffres";
                require('../views/view.header.php');
                require('../views/view.formulaire.php');
            
            }elseif($resultEmail>0 && ($oldUser['EMAIL_USE'] != $_GET['email'] )){
                $messageCreate = "L'email existe déjà dans la base de données";
                require('../views/view.header.php');
                require('../views/view.formulaire.php');
            
            }else{
                UserMgr::updateUser($_GET['nom'],$_GET['prenom'],$_GET['mdp'],$_GET['email'],$_GET['dateNaissance'],$_GET['adresse'],$_GET['codePostal'],$_GET['villeUse'],$_GET['datevalcot'],$_GET['oldemail']);
                require('../views/view.header.php');
                require('../views/view.formulaire.php');
                echo "L'adhérent a bien été modifié";
                }

        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;

        //---------------------------------------------------------------- GESTION ADHERENTS -------------------------------------------------------------------------
    case 'gestionAd':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;
        //----------------------------------------------------------------Affiche RECHERCHE ADHERENTS -------------------------------------------------------------------------
    case 'resRechercheAd':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;

        //---------------------------------------------------------------- affiche liste ADHERENTS -------------------------------------------------------------------------
    case 'afficheListUser':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            require('../Modele/classes/UserMgr.class.php');
            require('../Modele/classes//User.class.php');
            require('../Modele/classes/Bdtk.class.php');
            $tResultats = (UserMgr::getListUser());
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            // require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;

        //---------------------------------------------------------------- delete ADHERENTS -------------------------------------------------------------------------        
    case 'deleteAd':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            // require('../Modele/classes/UserMgr.class.php');
            // require('../Modele/classes//User.class.php');
            // require('../Modele/classes/Bdtk.class.php');
            // echo $_GET['idUse'];
            $emprunt = UserMgr::checkEmprunt($idUse);
            // echo $emprunt;
            if ($emprunt >0){
                $message = "l'adhérent à encore des emprunts en cours et ne peux pas être supprimé";
                require('../views/view.header.php');
                require('../views/view.formulaire.php');

            }else{
                UserMgr::delUseryId($idUse);
                $message = "l'Adhérent N° ". $idUse. " a bien été supprimé";
                require('../views/view.header.php');
                require('../views/view.formulaire.php');
            }
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;


//////////////////////////////////////////////////////////////////////// GESTIONNAIRE : CRUD SERIE /////////////////////////////////////////////////////////////////////////  


    case "serie" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;

//---------------------------------------------------------------- Affiche la liste des series -------------------------------------------------------------------------
    case "listSerie" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
            $tSerie = SerieMgr::getListSerie();
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;

//------------------------------------------------------- Affiche la liste des series correspondant à la recherche ------------------------------------------------
    case "searchSerie" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
            $tSerie = SerieMgr::getListSerie();
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;

//----------------------------------------------------------------------- Ajoute une serie -------------------------------------------------------------------------
    case "addSerie" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){	
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;    

//---------------------------------------------------------------- Valide ou invalide l'ajout de la serie -------------------------------------------------------------------------
    case "addSerieMaj" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
        if(!is_numeric($idSerie)){
            $msgCheck = "Veuillez entrer un identifiant correct (en chiffres!!)";
        }elseif(SerieMgr::searchSerieID($idSerie !=0)){
            $msgCheck = "L'identifiant de cette serie existe déja !";
        }elseif(SerieMgr::searchCodeEmp($codeEmp == 0)){
            $msgCheck = "Cet emplacement n'existe pas";    
        }elseif(SerieMgr::searchSerie($libSerie)){
            $msgCheck = "Le libellé de cette serie existe déja !";
        } else{
            $newSerie = new Serie($idSerie, $libSerie, $codeEmp);      
            $ajoutSerie = SerieMgr::addSerie($newSerie);
            if($ajoutSerie == null){
                $msgCheck = "Cet emplacement n'existe pas";    
            }else
            $tSerie[] = $libSerie;
        }
            require('../views/view.header.php');
            require('../views/view.formulaire.php'); 
            require('../views/view.footer.php');
        } else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break; 

  //---------------------------------------------------------------- Supprime une serie -------------------------------------------------------------------------      
    case "Supprimer Serie" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
            $clearedIdSerie = explode("echo",$idSerieDel);
            $trimmedIdDel = trim($clearedIdSerie[1],'?>');
            $checkAlbums = SerieMgr::checkAlbum($trimmedIdDel);


        if($checkAlbums == 0) {
            $clearedLibSerie = explode("echo",$libSerieDel);
            $trimmedDel = trim($clearedLibSerie[1],'?>');
            SerieMgr::delSerieByName($trimmedDel);
        } elseif($checkAlbums > 0) $msgCheck = "Erreur : veuillez d'abord supprimer les albums de cette serie";

            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;

        //---------------------------------------------------------------- Modifie une serie -----------------------------------------------------------------------

        case "Modifier Serie" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
        $oldLibSerie = explode("echo",$libSerieDel);
        $ancienLibSerie = $oldLibSerie[1];
        $trimmed = trim($ancienLibSerie, " ?>");
        $oldCodeEmp = explode(" ",$codeEmpDel);
        $ancientCodeEmp = $oldCodeEmp[2];
        $idSerieFollow = explode(" ",$idSerieDel);
        $nextIdSerie = $idSerieFollow[2];
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
        }else{
        $action = 'accueil';
        header('location:../controler/index.test.aure.php');
        unset($_SESSION['user']);
        }
        break;

        //---------------------------------------------------------------- Valide ou invalide la modification d'une serie ----------------------------------------------

        case "modifMaj" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
        $idSerieFollow = $_GET["idSerieFollow"];
        $modifCodeEmp = $_GET['modifCodeEmp'];
        $modifLibSerie = $_GET['modifLibSerie'];
        $ancienCodeEmp = $_GET['ancienCodeEmp'];
        $ancienLibSerie = $_GET['ancienLibSerie'];

        if(($modifLibSerie == $ancienLibSerie) && ($modifCodeEmp == $ancienCodeEmp)){
        $msgCheck = "Aucune modification effectuée !";
        }elseif(!SerieMgr::searchCodeEmp($modifCodeEmp) && SerieMgr::searchSerie($modifLibSerie) != null){
        $msgCheck = "Cet emplacement n'existe pas";
        }elseif(SerieMgr::searchSerie($modifLibSerie) != null && SerieMgr::searchSerie($modifLibSerie) != $ancienLibSerie){
        $msgCheck = "Le libellé de cette serie existe déja !";
        }elseif (SerieMgr::searchSerie($modifLibSerie) == null) {
        SerieMgr::updateSerie($modifLibSerie, $modifCodeEmp, $idSerieFollow);
        }
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
        }else{
        $action = 'accueil';
        header('location:../controler/index.test.aure.php');
        unset($_SESSION['user']);
        }
        break;

        //////////////////////////////////////////////////////////////////////// GESTIONNAIRE : CRUD ALBUM /////////////////////////////////////////////////////////////////////////

        case "album" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
            $tAlbum = AlbumMgr::getListAlbum();
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
        }else{
        $action = 'accueil';
        header('location:../controler/index.test.aure.php');
        unset($_SESSION['user']);
        }
        break;

        //---------------------------------------------------------------- Affiche la liste des albums ----------------------------------------------------------------

        case "listAlbum" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
        $tAlbum = AlbumMgr::getListAlbum();
        // $resLibSerie = AlbumMgr::getLibSerie($tAlbum["IDENTIFIANT_SERIE"]);
        // var_dump($resLibSerie);
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
        }else{
        $action = 'accueil';
        header('location:../controler/index.test.aure.php');
        unset($_SESSION['user']);
        }
        break;

         //---------------------------------------------------------------- Affiche la liste des albums correspondant à la rechercher ----------------------------

        case "searchAlbum" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
        $tAlbum = AlbumMgr::getListAlbum();
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
        }else{
        $action = 'accueil';
        header('location:../controler/index.test.aure.php');
        unset($_SESSION['user']);
        }
        break;

         //----------------------------------------------------------------------- Ajoute un album

        case "addAlbum" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
        }else{
        $action = 'accueil';
        header('location:../controler/index.test.aure.php');
        unset($_SESSION['user']);
        }
        break;

        // //---------------------------------------------------------------- Valide ou invalide l'ajout d'un album

        // case "addSerieMaj" :
        // if ($_SESSION['user']['ID_ROLE'] =='3'){
        // if(is_numeric($idSerie)) {
        // $newSerie = new Serie($idSerie, $libSerie, $codeEmp);
        // $ajoutSerie = SerieMgr::addSerie($newSerie);
        // $tSerie[] = $libSerie;
        // }else $msgCheck = "Veuillez respecter les champs !";

        // require('../views/view.header.php');
        // require('../views/view.formulaire.php');
        // require('../views/view.footer.php');
        // } else{
        // $action = 'accueil';
        // header('location:../controler/index.test.aure.php');
        // unset($_SESSION['user']);
        // }
        // break;

        // //---------------------------------------------------------------- Supprime un album

        // case "Supprimer Serie" :
        // if ($_SESSION['user']['ID_ROLE'] =='3'){
        // $clearedIdSerie = explode("echo",$idSerieDel);
        // $trimmedIdDel = trim($clearedIdSerie[1],"
        // $checkAlbums = SerieMgr::checkAlbum($trimmedIdDel);

        // if($checkAlbums == 0) {
        // $clearedLibSerie = explode("echo",$libSerieDel);
        // $trimmedDel = trim($clearedLibSerie[1],"
        // SerieMgr::delSerieByName($trimmedDel);
        // } elseif($checkAlbums > 0) $msgCheck = "Erreur : veuillez d'abord supprimer les albums de cette serie";

        // require('../views/view.header.php');
        // require('../views/view.formulaire.php');
        // require('../views/view.footer.php');
        // } else{
        // $action = 'accueil';
        // header('location:../controler/index.test.aure.php');
        // unset($_SESSION['user']);
        // }
        // break;

        // //---------------------------------------------------------------- Modifie un album

        // case "Modifier Serie" :
        // if ($_SESSION['user']['ID_ROLE'] =='3'){
        // $oldLibSerie = explode("echo",$libSerieDel);
        // $ancienLibSerie = $oldLibSerie[1];
        // $trimmed = trim($ancienLibSerie, " ");
        // $oldCodeEmp = explode(" ",$codeEmpDel);
        // $ancientCodeEmp = $oldCodeEmp[2];
        // $idSerieFollow = explode(" ",$idSerieDel);
        // $nextIdSerie = $idSerieFollow[2];
        // require('../views/view.header.php');
        // require('../views/view.formulaire.php');
        // require('../views/view.footer.php');
        // }else{
        // $action = 'accueil';
        // header('location:../controler/index.test.aure.php');
        // unset($_SESSION['user']);
        // }
        // break;

        // //---------------------------------------------------------------- Valide ou invalide la modification d'un album

        // case "modifMaj" :
        // if ($_SESSION['user']['ID_ROLE'] =='3'){
        // $idSerieFollow = $_GET["idSerieFollow"];
        // $modifCodeEmp = $_GET['modifCodeEmp'];
        // $modifLibSerie = $_GET['modifLibSerie'];
        // SerieMgr::updateSerie($modifLibSerie, $modifCodeEmp, $idSerieFollow);
        // require('../views/view.header.php');
        // require('../views/view.formulaire.php');
        // require('../views/view.footer.php');
        // }else{
        // $action = 'accueil';
        // header('location:../controler/index.test.aure.php');
        // unset($_SESSION['user']);
        // }
        // break; -->

case 'adherent';
require('../views/view.header.php');
require('../views/view.search.php');
require('../views/view.footer.php');
break;

////////////////////////////////////////////////////////////////////////RESPONSABLE
///////////////////////////////////////////////////////////////////////////////
case 'responsable';
require('../views/view.header.php');
require('../views/view.formulaire.php');
require('../views/view.footer.php');
break;


}

?>