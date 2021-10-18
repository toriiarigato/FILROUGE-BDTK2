<?php
    spl_autoload_register(function($classe){
        include "../Modele/classes/" . $classe . ".class.php";
    });

    const RC = "<br />\n";

    //////////////////////////////////////////////////////////////// Récupère la liste de toutes les Series ///////////////////////////////////////////////////////////////////

    // try {
    
    // $tSerie = SerieMgr::getListSerie();
        
    // var_dump($tSerie);

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }

    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    //////////////////////////////////////////////////////////////////////// Ajoute une Serie ///////////////////////////////////////////////////////////////////////////////
        // Doit utiliser un emplacement existant
    // $ser1 = new Serie(20,"Pokemon", "E2R6");

    // try {

    //     echo SerieMgr::addSerie($ser1). " ligne(s) mise à jour";

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

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

    try {
        echo SerieMgr::updateEmpSerie("E3R5",47). " ligne(s) mise à jour";
        
    } catch (PDOException $e) {
        echo $e->getMessage() . RC;
        echo "ECHEC de CONNEXION à la BDD" . RC;
    } catch (Exception $e) {
         echo $e->getMessage() . RC;
    }
        
    echo RC . "LE PROGRAMME CONTINUE ..." . RC;
    ?>