<?php
    spl_autoload_register(function($classe){
        include "../Modele/classes/" . $classe . ".class.php";
    });

    const RC = "<br />\n";
    //const RC = "\n";

//     try {
//         // Etape 1 - Créer une connexion BDD
//         $connexion = Bdtk::getConnexion();
//         //var_dump($connexion);
//         echo "CONNEXION REUSSIE" . RC;
//     } catch (PDOException $e) {
//         echo $e->getMessage() . RC;
//         echo "ECHEC de CONNEXION à la BDD" . RC;
//     } catch (Exception $e) {
//         echo $e->getMessage() . RC;
//     }

//     echo RC . "LE PROGRAMME CONTINUE ..." . RC;

//     try {
//         // Récupère la liste de tous les Pilotes
//         $tAlbums = AlbumMgr::getListAlbum();
        
//         var_dump($tAlbums);

// /**/
//     } catch (PDOException $e) {
//         echo $e->getMessage() . RC;
//         echo "ECHEC de CONNEXION à la BDD" . RC;
//     } catch (Exception $e) {
//         echo $e->getMessage() . RC;
//     }

//     echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    $a1 = new Album(264,"blabla",14.50,79,53,4,NULL,NULL,"fjdklfjld");

    try {
        // Récupère la liste de tous les Pilotes
        var_dump(AlbumMgr::addAlbum($a1));

    } catch (PDOException $e) {
        echo $e->getMessage() . RC;
        echo "ECHEC de CONNEXION à la BDD" . RC;
    } catch (Exception $e) {
        echo $e->getMessage() . RC;
    }

    echo RC . "LE PROGRAMME CONTINUE ..." . RC;


    
?>