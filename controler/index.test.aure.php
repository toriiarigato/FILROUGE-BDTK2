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

if (isset($_GET['idSerie'],$_GET['libSerie'],$_GET['codeEmp'])) {
    $idSerie = $_GET['idSerie'];
    $libSerie = $_GET['libSerie'];
    $codeEmp = $_GET['codeEmp'];
}   

switch ($action){
    case 'accueil':
        unset($_SESSION['user']);
        require('../views/view.header.php');
        require('../views/view.login.php');
        require('../views/view.footer.php');

    break;

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

    case 'erreur':
        echo 'prout';
        echo $msgErreur = 'E-mail ou Mot de Passe erroné ou inconnu'; 
        require('../views/view.header.php');
        require('../views/view.login.php');
        require('../views/view.footer.php');
    
        break;

    case 'oubliMdp':
        require('../views/view.header.php');
        require('../views/view.login.php');
        require('../views/view.footer.php');
        break;

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
            $tSerie = SerieMgr::getListSerie();
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
            $clearedLibSerie = explode("<%3Fphp+echo+",$libSerie);
            var_dump($clearedLibSerie);
            SerieMgr::delSerieByName($libSerie);
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

    case 'responsable';
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
    break;


}

?>