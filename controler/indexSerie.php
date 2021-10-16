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
    $ser1 = new Serie(20,"Pokemon", "E2R6");

    // try {

    //     var_dump(SerieMgr::addSerie($ser1));

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    ////////////////////////////////////////////////////////////////// Supprime une serie avec son ID ////////////////////////////////////////////////////////////////////////

    // try {
    //     var_dump(SerieMgr::delSerieByID(20));

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }

    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    //////////////////////////////////////////////////////////////// Supprime une serie avec son NOM ////////////////////////////////////////////////////////////////////////

    // try {
    //     var_dump(SerieMgr::delSerieByName("Pokemon"));
    
    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    ////////////////////////////////////////////////////////////////// Met à jour le nom d'une serie  //////////////////////////////////////////////////////////////////////////////////

    // try {
    //     var_dump(SerieMgr::updateNameSerie("Kaamelot",47));
    
    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;
    
    ////////////////////////////////////////////////////////////////// Met à jour l'emplacement d'une serie  //////////////////////////////////////////////////////////////////////////////////

    try {
        var_dump(SerieMgr::updateEmpSerie("E2R6",47));
        
    } catch (PDOException $e) {
        echo $e->getMessage() . RC;
        echo "ECHEC de CONNEXION à la BDD" . RC;
    } catch (Exception $e) {
         echo $e->getMessage() . RC;
    }
        
    echo RC . "LE PROGRAMME CONTINUE ..." . RC;
        

    ?>