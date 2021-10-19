<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test serie</title>
</head>
<body>
    
</body>
</html>

<?php
    spl_autoload_register(function($classe){
        include "../Modele/classes/" . $classe . ".class.php";
    });

    const RC = "<br />\n";

    //////////////////////////////////////////////////////////////// Récupère la liste de toutes les Series ///////////////////////////////////////////////////////////////////

    try {
    
    $tSerie = SerieMgr::getListSerie();
?>
    <form method="get" action="indexFormulaire.php">
<?php 
    echo "LISTE DES SERIES</br></br><button name=\"addSerie\">Ajouter une serie</button></br>"
?>
    </form>
<?php
    foreach($tSerie as $ligne) {
?>        
        <form method="get" action=>
<?php        echo  "<hr><li>" . strToUpper($ligne) . "</li>\n" . "<button>Details</button>" . "<button>Modifier</button>" . "<button>Supprimer</button></br></br>"; 
?>
        </form>
<?php        
    }

    } catch (PDOException $e) {
        echo $e->getMessage() . RC;
        echo "ECHEC de CONNEXION à la BDD" . RC;
    } catch (Exception $e) {
        echo $e->getMessage() . RC;
    }
?>
<?php
    //////////////////////////////////////////////////////////////////////// Ajoute une Serie ///////////////////////////////////////////////////////////////////////////////
        // Doit utiliser un emplacement existant
    // if(isset($_GET["addSerie"])){   
    //     $ser1 = new Serie(26,"Gégé", "E1R1");

    //     try {
    //         echo SerieMgr::addSerie($ser1). " ligne(s) mise à jour";
    //     } catch (PDOException $e) {
    //         echo $e->getMessage() . RC;
    //         echo "ECHEC de CONNEXION à la BDD" . RC;
    //     } catch (Exception $e) {
    //         echo $e->getMessage() . RC;
    //     }
    // }

    ////////////////////////////////////////////////////////////////// Supprime une serie avec son ID ////////////////////////////////////////////////////////////////////////

    // try {
    //     echo SerieMgr::delSerieByID(20). " ligne(s) mise à jour";

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }

    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    //////////////////////////////////////////////////////////////// Supprime une serie avec son NOM ////////////////////////////////////////////////////////////////////////

    // try {
    //     echo SerieMgr::delSerieByName("Pokemon"). " ligne(s) mise à jour";
    
    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    ////////////////////////////////////////////////////////////////// Met à jour le nom d'une serie  //////////////////////////////////////////////////////////////////////////////////

    // try {
    //     echo SerieMgr::updateNameSerie("Kaamelot",47). " ligne(s) mise à jour";
    
    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;
    
    ////////////////////////////////////////////////////////////////// Met à jour l'emplacement d'une serie  //////////////////////////////////////////////////////////////////////////////////

    // try {
    //     echo SerieMgr::updateEmpSerie("E3R5",47). " ligne(s) mise à jour";
        
    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //      echo $e->getMessage() . RC;
    // }
        
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;
    ?>