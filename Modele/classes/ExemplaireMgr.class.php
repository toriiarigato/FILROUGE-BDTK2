<?php
class ExemplaireMgr {

//////////////////////////////////////////////////////////////// Récupère la liste de toutes les Exemplaire ///////////////////////////////////////////////////////////////////
        /**
         * Permet d'obtenir une liste complète des Exemplaire
         * @param le mode de récupération des données 
         * @return array la liste des exemplaires
         */
        public static function getListExemplaire() : array {
            $sql = 'SELECT * FROM exemplaire 
                    ORDER BY CODE_EXEMPLAIRE ASC';
            
            $connexionPDO = Bdtk::getConnexion();
            $resPDOstt = $connexionPDO->query($sql);
            $records = $resPDOstt->fetchAll();

            $resPDOstt->closeCursor(); // ferme le curseur
            Bdtk::disconnect();     // ferme la connexion

            return $records;
        }

//////////////////////////////////////////////////////////////////////// Ajoute une Exemplaire ///////////////////////////////////////////////////////////////////////////////
        /**
         * Permet d'ajouter la exemplaire passée en paramètre
         * @param un objet exemplaire
         * @return nombre de exemplaire ajoutées
         */
        public static function addExemplaire(Exemplaire $exemplaire)  {
            
            $sql = "INSERT INTO exemplaire 
                    VALUES (:codeEx, :dispoEx, :numAlb, :codeEtat, :idCreateur, :idDelete, :idModifie, :codeBDTK)";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":codeEx"=>$exemplaire->getCodeEx(),":dispoEx"=>$exemplaire->getDispoEx(),":numAlb"=>$exemplaire->getNumAlbum(),":codeEtat"=>$exemplaire->getCodeEtat(),":idCreateur"=>$exemplaire->getIdCreateur(),":idDelete"=>$exemplaire->getIdDelete(),":idModifie"=>$exemplaire->getIdModificateur(),":codeBDTK"=>$exemplaire->getCodeBDTK()));
                
                $nombre = $rs->rowCount();

                $rs->closeCursor();
                Bdtk::disconnect();
                return $nombre; 
            }
            catch(PDOException $e)
            {
            
            }
        }

////////////////////////////////////////////////////////////////// Supprime un exemplaire avec son ID ////////////////////////////////////////////////////////////////////////
        /**
         * Permet de supprimer l'id de l'exemplaire passé en paramètre
         * @param un objet exemplaire
         * @return nombre d'exemplaire supprimés
         */
        public static function delExemplaireByID($codeEx) : int {
            
            $sql = "DELETE FROM exemplaire
                    WHERE CODE_EXEMPLAIRE = :codeEx";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":codeEx"=>$codeEx));
                
                $nombre = $rs->rowCount();
                
                $rs->closeCursor();
                Bdtk::disconnect();
                return $nombre; 
            }
            catch(PDOException $e)
            {
            
            }

        }

////////////////////////////////////////////////////////////////// Met à jour la disponibilité d'un exemplaire  ///////////////////////////////////////////////////////////////

        /**
         * Permet de modifier la disponibilité d'un l'exemplaire passé en paramètre en paramètre
         * @param un objet exemplaire
         * @return nombre d'exemplaire mis à jour
         */
        public static function updateDispoEx($bDisp, $codeEx) : int {
            
            $sql = "UPDATE exemplaire SET DISPONIBILITE_EXEMPLAIRE = :bDisp
                    WHERE CODE_EXEMPLAIRE = :codeEx";
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":bDisp"=>$bDisp, ":codeEx"=>$codeEx)); 

                $nombre = $rs->rowCount();

                $rs->closeCursor();
                Bdtk::disconnect();
                return $nombre; 
            }
            catch(PDOException $e)
            {
            }
        }

////////////////////////////////////////////////////////////////// Met à jour l'état d'un exemplaire  ///////////////////////////////////////////////////////////////////////

        /**
         * Permet de modifier l'état d'un exemplaire en paramètre
         * @param un objet exemplaire
         * @return nombre d'exemplaire mise à jour
         */
        public static function updateEtatEx($etat, $codeEx) : int {

                $sql = "UPDATE exemplaire SET CODE_ETAT = :newCodeEtat
                        WHERE CODE_EXEMPLAIRE = :codeEx";
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":newCodeEtat"=>$etat, ":codeEx"=>$codeEx)); 
    
                $nombre = $rs->rowCount();
    
                $rs->closeCursor();
                Bdtk::disconnect();
                return $nombre; 
            }
            catch(PDOException $e)
            {
            }
        }
}
?>