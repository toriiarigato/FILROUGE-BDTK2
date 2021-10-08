<?php
    spl_autoload_register(function($classe){
        include "../Modele/classes/" . $classe . ".class.php";
    });

    const RC = "<br />\n";

    //////////////////////////////////////////////////////////////// Récupère la liste de tous les Pilotes ///////////////////////////////////////////////////////////////////

    // try {
    
    // $tAuteur = AuteurMgr::getListAuteur();
        
    // var_dump($tAuteur);

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }

    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    //////////////////////////////////////////////////////////////////////// Ajoute un Auteur ///////////////////////////////////////////////////////////////////////////////

    // $aut1 = new Auteur(51,"Conan");

    // try {

    //     var_dump(AuteurMgr::addAuteur($aut1));

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    ////////////////////////////////////////////////////////////////// Supprime un auteur avec son ID ////////////////////////////////////////////////////////////////////////

    // try {
    //     var_dump(AuteurMgr::delAuteurByID(51));

    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }

    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    //////////////////////////////////////////////////////////////// Supprime un auteur avec son NOM ////////////////////////////////////////////////////////////////////////

    // try {
    //     var_dump(AuteurMgr::delAuteurByName("Thierry"));
    
    // } catch (PDOException $e) {
    //     echo $e->getMessage() . RC;
    //     echo "ECHEC de CONNEXION à la BDD" . RC;
    // } catch (Exception $e) {
    //     echo $e->getMessage() . RC;
    // }
    
    // echo RC . "LE PROGRAMME CONTINUE ..." . RC;

    ////////////////////////////////////////////////////////////////// Met à jour un auteur  //////////////////////////////////////////////////////////////////////////////////

    try {
        var_dump(AuteurMgr::updateAuteur("Enculé",52));
    
    } catch (PDOException $e) {
        echo $e->getMessage() . RC;
        echo "ECHEC de CONNEXION à la BDD" . RC;
    } catch (Exception $e) {
        echo $e->getMessage() . RC;
    }
    
    echo RC . "LE PROGRAMME CONTINUE ..." . RC;
    

    ?>