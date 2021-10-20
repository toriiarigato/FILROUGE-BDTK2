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
                echo $e->getMessage();
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

}
?>