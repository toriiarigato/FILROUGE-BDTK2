<?php
$action = 'accueil';
$id = $mdp = $role = '';
// $role = '';
print_r($_GET);

if (isset($_GET['action'])){
    $action=$_GET['action'];

}

if (isset($_GET['id'],$_GET['motdepass'])){
    $id = $_GET['id'];
    $mdp = $_GET['motdepass'];
}

switch ($action){
    case 'accueil':
        require('../views/view.header.php');
            require('../views/view.login.php');
            require('../views/view.footer.php');
    break;

    case 'connexion':
        require('../Modele/classes/Bdtk.class.php');
        require('../Modele/classes/UserMgr.class.php');
        $flag = UserMgr::connect($id,$mdp);
        var_dump($flag);
        if($flag == 1){
            $role = UserMgr::getUserById($id);
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
            var_dump($action);
            break;
        } else 
            $action = 'accueil';
            echo "Erreur";
    break;

    case 'oubliMdp':
        require('../views/view.header.php');
        require('../views/view.login.php');
        require('../views/view.footer.php');
    break;

    case 'bibli';
        // require('../Modele/classes/UserMgr.class.php');
        // require('../Modele/classes/Bdtk.class.php');
        // require('../Modele/classes/AlbumMgr.class.php');
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
    break;

    case 'gestionnaire';
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
    break;

    case 'adherent';
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
    break;

    case 'responsable';
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
    break;


}

?>