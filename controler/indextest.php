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
//         // Récupère la liste de tous les albums
//         $tAlbums = ALbumMgr::getListAlbum();
        
//         var_dump($tAlbums);

// /**/
//     } catch (PDOException $e) {
//         echo $e->getMessage() . RC;
//         echo "ECHEC de CONNEXION à la BDD" . RC;
//     } catch (Exception $e) {
//         echo $e->getMessage() . RC;
//     }

//     echo RC . "LE PROGRAMME CONTINUE ..." . RC;

//     try {
//         // Récupère la liste de tous les utilisateurs
//         $tUsers = UserMgr::getListUser();
        
//         var_dump($tUsers);

// /**/
//     } catch (PDOException $e) {
//         echo $e->getMessage() . RC;
//         echo "ECHEC de CONNEXION à la BDD" . RC;
//     } catch (Exception $e) {
//         echo $e->getMessage() . RC;
//     }

//     echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    $a1 = new Album(264,"blabla",14.50,79,53,4,NULL,NULL,"fjdklfjld");
    $u1 = new User('test','test','gfdsgs','hgfdhfd',1,'gfdsg','1658/02/03','hgfdhgfd',25424,'gfdsgf',2,null,'2021/09/05',null);
    $u2 = new User('test','test','gfdsgs','hgfdhfd',1,'gfdsg','1658/02/03','hgfdhgfd',25424,'gfdsgf',2,null,'2021/09/05',null);
    $u3 = new User('test3','test3','gfdsgs','hgfdhfd',1,'gfdsg','1658/02/03','hgfdhgfd',25424,'gfdsgf',2,null,'2021/09/05',null);

    // try {
    //     // Ajoute un album passé en paramêtre 
    //     var_dump(AlbumMgr::addAlbum($a1));

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }

    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    //     try {
    //     // Ajoute un utilisateur passé en paramêtre 
    //     var_dump(UserMgr::addUser($u3));

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }

    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    // try {
    //     var_dump(AlbumMgr::delAlbumbyId(262));

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }

    // try {
    //     var_dump(UserMgr::delUseryId(28));

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    // try {
    //     // Récupère la liste de tous les Pilotes
    //     var_dump(AlbumMgr::updateAlbum(260));

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }

    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    try {
        // Récupère la liste de tous les Pilotes
        var_dump(UserMgr::updateUser(29));

    } catch (PDOException $e) {
        echo $e->getMessage() . RC;
        echo "ECHEC de CONNEXION à la BDD" . RC;
    } catch (Exception $e) {
        echo $e->getMessage() . RC;
    }

    echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    
?>