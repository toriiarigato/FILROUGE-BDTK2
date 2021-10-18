<?php
    spl_autoload_register(function($classe){
        include "../Modele/classes/" . $classe . ".class.php";
    });

    const RC = "<br />\n";

    //////////////////////////////////////////////////////////////// Récupère la liste de tous les Pilotes ///////////////////////////////////////////////////////////////////

    // try {
    
    // $tExemplaire = ExemplaireMgr::getListExemplaire();
        
    // var_dump($tExemplaire);

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }

    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    //////////////////////////////////////////////////////////////////////// Ajoute un Exemplaire ///////////////////////////////////////////////////////////////////////////////

    // $exe1 = new Exemplaire(203,"OUI", 2, "AE", 4, NULL, NULL, 1);

    // try {

    //     echo ExemplaireMgr::addExemplaire($exe1). " ligne(s) mise à jour";

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    ////////////////////////////////////////////////////////////////// Supprime un exemplaire avec son code ////////////////////////////////////////////////////////////////////////

        // try {
        //     echo ExemplaireMgr::delExemplaireByID(203) . " ligne(s) mise à jour";

        // } catch (PDOException $e) {
        //     echo $e->getMessage() . RC;
        //     echo "ECHEC de CONNEXION à la BDD" . RC;
        // } catch (Exception $e) {
        //     echo $e->getMessage() . RC;
        // }

        // echo RC . "LE PROGRAMME CONTINUE ..." . RC;


    ///////////////////////////////////////////////////////////////// Met à jour la disponibilité d'un exemplaire   //////////////////////////////////////////////////////////////////////////////////

    // try {
    //     echo ExemplaireMgr::updateDispoEx("NON",203) . " ligne(s) mise à jour";
    
    // } catch (PDOException $e) { 
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC; 


    ///////////////////////////////////////////////////////////////// Met à jour l'état d'un exemplaire   //////////////////////////////////////////////////////////////////////////////////

    try {
        echo ExemplaireMgr::updateEtatEx("BE",203) . " ligne(s) mise à jour" ;
    
    } catch (PDOException $e) {
        echo $e->getMessage() . RC;
        echo "ECHEC de CONNEXION à la BDD" . RC;
    } catch (Exception $e) {
        echo $e->getMessage() . RC;
    }
    
    echo RC . "LE PROGRAMME CONTINUE ..." . RC; 

    ?>