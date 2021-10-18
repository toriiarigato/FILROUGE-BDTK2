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


switch ($action){
    case 'accueil':
        require('../views/view.header.php');
        require('../views/view.login.php');
        require('../views/view.footer');
    break;

    case 'oubliMdp':
        require('../views/view.header.php');
        require('../views/view.login.php');
        require('../views/view.footer');
    break;

    case 'bibli';
        require('../Modele/classes/UserMgr.class');
        require('../Modele/classes/Bdtk.class');
        require('../Modele/classes/AlbumMgr.class');
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.detail');
        require('../views/view.footer');
    break;


}

?>