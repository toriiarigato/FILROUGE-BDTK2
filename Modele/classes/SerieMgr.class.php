<?php
class SerieMgr {

//////////////////////////////////////////////////////////////// Récupère la liste de toutes les Series ///////////////////////////////////////////////////////////////////
        /**
         * Permet d'obtenir une liste complète des Series
         * @param le mode de récupération des données 
         * @return array la liste des series
         */
        public static function getListSerie() {
            $sql = 'SELECT * FROM serie 
                    ORDER BY IDENTIFIANT_SERIE ASC';
            
            $connexionPDO = Bdtk::getConnexion();
            $resPDOstt = $connexionPDO->query($sql);
            $records = $resPDOstt->fetchAll();

            $resPDOstt->closeCursor(); // ferme le curseur
            Bdtk::disconnect();     // ferme la connexion

            return $records;
        }

//////////////////////////////////////////////////////////////////////// Ajoute une Serie ///////////////////////////////////////////////////////////////////////////////
        /**
         * Permet d'ajouter la serie passée en paramètre
         * @param un objet serie
         * @return nombre de serie ajoutées
         */
        // Doit utiliser un emplacement existant
        public static function addSerie(Serie $serie) {
            
            $sql = "INSERT INTO serie 
                    VALUES (:idSerie, :libSerie, :codeEmp)";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":idSerie"=>$serie->idSerie,":libSerie"=>$serie->libSerie,":codeEmp"=>$serie->codeEmp));
                
                $nombre = $rs->rowCount();

                $rs->closeCursor();
                Bdtk::disconnect();
            }
            catch(PDOException $e)
            {
            return $nombre; 
            }
        }

////////////////////////////////////////////////////////////////// Supprime une serie avec son ID ////////////////////////////////////////////////////////////////////////
        /**
         * Permet de supprimer l'id de la serie passée en paramètre
         * @param un objet serie
         * @return nombre de series supprimées
         */
        public static function delSerieByID($idSerie) {
            
            $sql = "DELETE FROM serie
                    WHERE IDENTIFIANT_SERIE = :idSerie";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":idSerie"=>$idSerie));
                
                $nombre = $rs->rowCount();
                
                // pour faire propre
                $rs->closeCursor();
                Bdtk::disconnect();
            
            }
            catch(PDOException $e)
            {
            return $nombre; 
            }

        }

//////////////////////////////////////////////////////////////// Supprime une serie avec son NOM ////////////////////////////////////////////////////////////////////////
                /**
         * Permet de supprimer le nom de la serie passé en paramètre
         * @param un objet serie
         * @return nombre de serie supprimées
         */
        public static function delSerieByName($libSerie) {
            
            $sql = "DELETE FROM serie
                    WHERE LIBELLE_SERIE = :libSerie";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":libSerie"=>$libSerie));
                
                $nombre = $rs->rowCount();
                
                // pour faire propre
                $rs->closeCursor();
                Bdtk::disconnect();
            
            }
            catch(PDOException $e)
            {
            return $nombre; 
            }

        }

////////////////////////////////////////////////////////////////// Met à jour le nom d'une serie  //////////////////////////////////////////////////////////////////////////////////

        /**
         * Permet de modifier le nom de la serie en paramètre
         * @param un objet serie
         * @return nombre de serie mise à jour
         */
        public static function updateNameSerie($value1, $idSerie) {

            $sql = "UPDATE serie SET LIBELLE_SERIE = :newLibSerie
                    WHERE IDENTIFIANT_SERIE = :idSerie";

            $rs = Bdtk::getConnexion()->prepare($sql);
            $rs->execute(array(":newLibSerie"=>$value1, ":idSerie"=>$idSerie)); 

            $nombre = $rs->rowCount();

            // pour faire propre
            $rs->closeCursor();
            Bdtk::disconnect();
            return $nombre; 
        }

////////////////////////////////////////////////////////////////// Met à jour l'emplacement d'une serie  //////////////////////////////////////////////////////////////////////////////////

        /**
         * Permet de modifier l'emplacement de la serie en paramètre
         * @param un objet serie
         * @return nombre de serie mise à jour
         */
        public static function updateEmpSerie($value1, $idSerie) {

                $sql = "UPDATE serie SET CODE_EMPLACEMENT = :newEmpSerie
                        WHERE IDENTIFIANT_SERIE = :idSerie";
    
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":newEmpSerie"=>$value1, ":idSerie"=>$idSerie)); 
    
                $nombre = $rs->rowCount();
    
                // pour faire propre
                $rs->closeCursor();
                Bdtk::disconnect();
                return $nombre; 
            }
}
?>