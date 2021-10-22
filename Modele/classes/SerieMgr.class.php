<?php
class SerieMgr {

//////////////////////////////////////////////////////////////// Récupère la liste de toutes les Series ///////////////////////////////////////////////////////////////////
        /**
         * Permet d'obtenir une liste complète des Series
         * @param le mode de récupération des données 
         * @return array la liste des series
         */
        public static function getListSerie() : array {
            $sql = 'SELECT LIBELLE_SERIE, CODE_EMPLACEMENT, IDENTIFIANT_SERIE  FROM serie 
                    ORDER BY LIBELLE_SERIE ASC';
            
            $connexionPDO = Bdtk::getConnexion();
            $resPDOstt = $connexionPDO->query($sql);
            $records = $resPDOstt->fetchAll();

                        
            $resPDOstt->closeCursor(); // ferme le curseur
            Bdtk::disconnect();     // ferme la connexion

            return $records;
            
        }

//////////////////////////////////////////////////////////////// Cherche une serie dans la liste avec un NOM ///////////////////////////////////////////////////////////////////
        /**
         * Permet de chercher des series
         * @param le mot clé de la recherche
         * @return array les series proche de la recherche
         */
        public static function searchSerie($search) : array {

            $sql = "SELECT * FROM `serie` 
                    WHERE (LIBELLE_SERIE LIKE ?)";
            try {        
                $connexion = Bdtk::getConnexion();
                $resultats = $connexion->prepare($sql);
                $resultats->execute(array('%'.$search.'%'));
                $records = $resultats->fetchAll();
                Bdtk ::disconnect();
                return $records;
            }    
            catch(PDOException $e)
            {
            echo $e->getMessage();
            }
        }

        
//////////////////////////////////////////////////////////////// Cherche une serie dans la liste avec un ID ///////////////////////////////////////////////////////////////////
        /**
         * Permet de chercher des series
         * @param le mot clé de la recherche
         * @return array les series proche de la recherche
         */
        public static function searchSerieID($search) : array {

            $sql = "SELECT * FROM `serie` 
                    WHERE IDENTIFIANT_SERIE = ?";
            try {        
                $connexion = Bdtk::getConnexion();
                $resultats = $connexion->prepare($sql);
                $resultats->execute(array($search));
                $records = $resultats->fetchAll();
                Bdtk ::disconnect();
                return $records;
            }    
            catch(PDOException $e)
            {
            echo $e->getMessage();
            }
        }

        //////////////////////////////////////////////////////////////// Cherche si un emplacement existe ///////////////////////////////////////////////////////////////////
        /**
         * Permet de chercher des emplacements
         * @param un code emplacement
         * @return array le nombre d'emplacement trouvé
         */
        public static function searchCodeEmp($search)  {

            $sql = "SELECT * FROM `emplacement` 
                    WHERE CODE_EMPLACEMENT = ?";
            try {        
                $connexion = Bdtk::getConnexion();
                $resultats = $connexion->prepare($sql);
                $resultats->execute(array($search));
                Bdtk ::disconnect();
                $nombre = $resultats->rowCount();

                return $nombre;
            }    
            catch(PDOException $e)
            {
            echo $e->getMessage();
            }
        }

//////////////////////////////////////////////////////////////////////// Ajoute une Serie ///////////////////////////////////////////////////////////////////////////////
        /**
         * Permet d'ajouter la serie passée en paramètre
         * @param un objet serie
         * @return nombre de serie ajoutées
         */
        // Doit utiliser un emplacement existant
        public static function addSerie(Serie $serie)   {
            
            $sql = "INSERT INTO serie 
                    VALUES (:idSerie, :libSerie, :codeEmp)";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":idSerie"=>$serie->getIdSerie(),":libSerie"=>$serie->getLibSerie(),":codeEmp"=>$serie->getCodeEmp()));
                
                $nombre = $rs->rowCount();
                

                $rs->closeCursor();
                Bdtk::disconnect();
                

                return $nombre; 
            }
            catch(PDOException $e)
            {
                  
            }
        }

////////////////////////////////////////////////////////////////// Supprime une serie avec son ID ////////////////////////////////////////////////////////////////////////
        /**
         * Permet de supprimer l'id de la serie passée en paramètre
         * @param un objet serie
         * @return nombre de series supprimées
         */
        public static function delSerieByID($idSerie) : int {
            
            $sql = "DELETE FROM serie
                    WHERE IDENTIFIANT_SERIE = :idSerie";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":idSerie"=>$idSerie));
                
                $nombre = $rs->rowCount();
                
                // pour faire propre
                $rs->closeCursor();
                Bdtk::disconnect();
                return $nombre; 
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

//////////////////////////////////////////////////////////////// Supprime une serie avec son NOM ////////////////////////////////////////////////////////////////////////
                /**
         * Permet de supprimer le nom de la serie passé en paramètre
         * @param un objet serie
         * @return nombre de serie supprimées
         */
        public static function delSerieByName($libSerie) : int {
            
            $sql = "DELETE FROM serie
                    WHERE LIBELLE_SERIE = :libSerie";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":libSerie"=>$libSerie));
                
                $nombre = $rs->rowCount();
                
                // pour faire propre
                $rs->closeCursor();
                Bdtk::disconnect();
                return $nombre;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

////////////////////////////////////////////////////////////////// Met à jour une serie  //////////////////////////////////////////////////////////////////////////////////

        /**
         * Permet de modifier le nom de la serie en paramètre
         * @param un objet serie
         * @return nombre de serie mise à jour
         */
        public static function updateSerie($value1, $value2, $idSerie) : int  {

            $sql = "UPDATE serie SET LIBELLE_SERIE = :newLibSerie , CODE_EMPLACEMENT = :newCodeEmp
                    WHERE IDENTIFIANT_SERIE = :idSerie";
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":newLibSerie"=>$value1,":newCodeEmp"=>$value2,":idSerie"=>$idSerie)); 
                echo $value1,$value2, $idSerie;
                $nombre = $rs->rowCount();

                // pour faire propre
                $rs->closeCursor();
                Bdtk::disconnect();
                return $nombre; 
            }
            catch(PDOException $e){    
                echo $e->getMessage();
            }
       }

       ////////////////////////////////////////////////////////////////// Verifie s'il reste des albums pour une serie //////////////////////////////////////////////////////////////////////////////////
        /**
         * Vérifie si une serie possède des albums
         * @param un identifiant de serie
         * @return nombre d'album trouvé
         */
       public static function checkAlbum($idSerie)  {
        $sql = "SELECT * FROM album WHERE IDENTIFIANT_SERIE =?";
        try {
            $resultats = Bdtk::getConnexion()->prepare($sql);

            // exécution requête

            $resultats->execute(array($idSerie));

            $nombre = $resultats->rowCount();
            // pour faire propre
            $resultats->closeCursor();
            Bdtk::disconnect();
            $count = $resultats->rowCount();
    
        return $count;
        }
        
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}
?>