<?php

session_start();
$action = 'accueil';
print_r($action);
$id = $mdp = $role = '';
$msgErreur = '';



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

            echo 'SESSION:';print_r($_SESSION);
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
    case 'rechercheAd':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            $recherche = $_SESSION['recherche'];
            echo $recherche;
            require('../Modele/classes/UserMgr.class.php');
            require('../Modele/classes//User.class.php');
            require('../Modele/classes/Bdtk.class.php');
            $resultat = UserMgr::searchUser($recherche);
            var_dump($resultat);
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;

    case 'afficheListUser':
        if ($_SESSION['user']['ID_ROLE']=='2'){
            require('../Modele/classes/UserMgr.class.php');
            require('../Modele/classes//User.class.php');
            require('../Modele/classes/Bdtk.class.php');
            $tResultats = (UserMgr::getListUser());
            require('../views/view.header.php');
            require('../views/view.formulaire.php');
            require('../views/view.footer.php');
        }else{
            $action = 'accueil';
            header('location:../controler/index.test.aure.php');
            unset($_SESSION['user']);
        }
        break;


////////////////////////////////////////////////////////////////////////GESTIONNAIRE///////////////////////////////////////////////////////////////////////////////
    case 'gestionnaire';
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
    break;
////////////////////////////////////////////////////////////////////////ADHERENT///////////////////////////////////////////////////////////////////////////////
    case 'adherent';
        require('../views/view.header.php');
        require('../views/view.search.php');
        require('../views/view.footer.php');
    break;
////////////////////////////////////////////////////////////////////////RESPONSABLE ///////////////////////////////////////////////////////////////////////////////
    case 'responsable';
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
    break;


}

?>