<?php
$action = '';
// $role = '';
print_r($_GET);

if (isset($_GET['action'])){
    $action=$_GET['action'];

}

// if (!isset($_GET['role'])){
//     $role=$_GET['role'];
// }

if (isset($_GET['email'],$_GET['mdp'])){
    $id = $_GET['email'];
    $mdp = $_GET['mdp'];
}


switch ($action){
    case 'accueil':
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
        require('../Modele/classes/UserMgr.class.php');
        require('../Modele/classes/Bdtk.class.php');
        require('../Modele/classes/AlbumMgr.class.php');
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer.php');
    break;


}

?>