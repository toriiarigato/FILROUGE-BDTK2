
<?php
spl_autoload_register(function($classe){
    include "../Modele/classes/" . $classe . ".class.php";
});

session_start();
$action = 'accueil';
print_r($action);
$id = $mdp = $role = '';
$msgErreur = '';
$idSerie = "";
$libSerie = "";
$codeEmp = "";
$nomUse = "";
$prenomUse = "";
$adresseUse = "";

$libSerieDel = "";
$codeEmpDel = "";
$idSerieDel = "";
$tSerie = [];

$resultat = [];

if (isset($_GET['recherche'])){
    $recherche = $_GET['recherche'];
    $resultat = UserMgr::searchUser($recherche);
    // var_dump($resultat);
}

if (isset($_GET['idUse'])){
    $idUse = $_GET['idUse'];
    print_r($_GET['idUse']);
}

if (isset($_GET['nom']) || isset($_GET['prenom'])){
    $nomUse = $_GET['nom'];
    $prenomUse = $_GET['prenom'];
    $adresseUse = $_GET['adresse'];
}



print_r($_GET);
if (isset($_SESSION['user'])){
    print_r($_SESSION['user']);
}

if (isset($_GET['action'])){
    $action=$_GET['action'];

}

if (isset($_GET['id'],$_GET['motdepass'])){
    $id = $_GET['id'];
    $mdp = $_GET['motdepass'];
}


if (isset($_GET['recherche'])){
    $recherche = $_GET['recherche'];
    $_SESSION['recherche'] = $recherche;
}

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
    $resultat = SerieMgr::searchSerie($searchOneSerie);
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
            var_dump($role);
            switch ($role){
                case "1":
                    $action = 'adherent';
                    break;
                case "2" :
                    $action = 'bibli';
                    break;
                case "3" :
                    $action = 'gestionnaire';
                    break;
                case "4" :
                    $action = 'responsable';
                    break;
            }
            $_SESSION["action"] = $action;
            var_dump($action);
            header('location:../controler/index.test.aure.php?action='.$_SESSION["action"]);
            var_dump($_SESSION["user"]);
            
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
    case 'bibli';
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
    case 'emprunt';
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
    case 'retour';
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
    case 'nouvelAd';
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
        //---------------------------------------------------------------- GESTION ADHERENTS -------------------------------------------------------------------------
    case 'gestionAd';
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
        //---------------------------------------------------------------- RECHERCHE ADHERENTS -------------------------------------------------------------------------
    // case 'rechercheAd':
    //     if ($_SESSION['user']['ID_ROLE']=='2'){

    //         require('../views/view.header.php');
    //         require('../views/view.formulaire.php');
    //         require('../views/view.footer.php');
    //     }else{
    //         $action = 'accueil';
    //         header('location:../controler/index.test.aure.php');
    //         unset($_SESSION['user']);
    //     }
    //     break;
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
    case 'deleteAd':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            require('../Modele/classes/UserMgr.class.php');
            require('../Modele/classes//User.class.php');
            require('../Modele/classes/Bdtk.class.php');
            echo $_GET['idUse'];
            UserMgr::delUseryId($idUse);
            echo "sup ok";
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;




       case 'gestionnaire':
        if ($_SESSION['user']['ID_ROLE']=='3'){
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;

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

    case "searchSerie" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
            $tResultat = SerieMgr::getListSerie();
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;

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

    case "addSerieMaj" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
            $newSerie = new Serie($idSerie, $libSerie, $codeEmp);
            SerieMgr::addSerie($newSerie);	
            $tSerie[] = $libSerie;
            require('../views/view.header.php');
            require('../views/view.formulaire.php'); 
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break; 

    case "Supprimer Serie" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
            $clearedLibSerie = explode("echo",$libSerieDel);
            $trimmedDel = trim($clearedLibSerie[1]," ?>");
            SerieMgr::delSerieByName($trimmedDel);
            var_dump($trimmedDel);
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break; 

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

    case "modifMaj" :
        if ($_SESSION['user']['ID_ROLE'] =='3'){
            $idSerieFollow = $_GET["idSerieFollow"];
            $modifCodeEmp = $_GET['modifCodeEmp'];
            $modifLibSerie = $_GET['modifLibSerie'];
            SerieMgr::updateSerie($modifLibSerie, $modifCodeEmp, $idSerieFollow);
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
            }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
            }
            break;
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