<?php
$action = 'accueil';
// $role = '';
print_r($_GET);

if (isset($_GET['action'])){
    $action=$_GET['action'];

}

// if (!isset($_GET['role'])){
//     $role=$_GET['role'];
// }
$id = $mdp = $role = '';

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
            $user = UserMgr::getUserById($id);
            var_dump($user);
            $role = $user->idRole;  
            switch ($role){
                case 1:
                    $action = 'adherent';
                    break;
                case 2 :
                    $action = 'bibli';
                    break;
                case 3 :
                    $action = 'gestionnaire';
                    break;
                case 4 :
                    $action = 'responsable';
                    break;
            }
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
        require('../Modele/classes/UserMgr.class.php');
        require('../Modele/classes/Bdtk.class.php');
        require('../Modele/classes/AlbumMgr.class.php');
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
    break;


}

?>