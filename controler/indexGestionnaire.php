<?php
spl_autoload_register(function($classe){
    include "../Modele/classes/" . $classe . ".class.php";
});

$action2 = "ajout";
print_r($_GET);

if (isset($_GET['action2'])){
    $action=$_GET['action2'];
}

switch ($action2){
    case 'ajout':
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer');
    break;

    case 'newEx':
        require('../views/view.header.php');
        require('../views/view.formulaire.php');
        require('../views/view.footer');
    break;

    case 'delEx';
    require('../views/view.header.php');
    require('../views/view.formulaire.php');
    require('../views/view.footer');
    break;
}

?>