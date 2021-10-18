<?php
class AuteurMgr {

//////////////////////////////////////////////////////////////// Récupère la liste de tous les Auteurs ///////////////////////////////////////////////////////////////////
        /**
         * Permet d'obtenir une liste complète des Auteurs
         * @param le mode de récupération des données 
         * @return array la liste des auteurs
         */
        public static function getListAuteur() : array {
            $sql = 'SELECT * FROM auteur 
                    ORDER BY IDENTIFIANT_AUTEUR ASC';
            
            $connexionPDO = Bdtk::getConnexion();
            $resPDOstt = $connexionPDO->query($sql);
            $records = $resPDOstt->fetchAll();

            $resPDOstt->closeCursor(); // ferme le curseur
            Bdtk::disconnect();     // ferme la connexion

            return $records;
        }

//////////////////////////////////////////////////////////////////////// Ajoute un Auteur ///////////////////////////////////////////////////////////////////////////////
        /**
         * Permet d'ajouter l' auteur passé en paramètre
         * @param un objet auteur
         * @return nombre de auteurs ajoutés
         */
        public static function addAuteur(Auteur $auteur) {
            
            $sql = "INSERT INTO auteur 
                    VALUES (:idAuteur, :libAuteur)";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":idAuteur"=>$auteur->getIDAut(),":libAuteur"=>$auteur->getLibAut()));
                
                $nombre = $rs->rowCount();
                
                $rs->closeCursor();
                Bdtk::disconnect();  
                return $nombre;
            }
            catch(PDOException $e)
            {
            }
        }

////////////////////////////////////////////////////////////////// Supprime un auteur avec son ID ////////////////////////////////////////////////////////////////////////
        /**
         * Permet de supprimer l'id de l'auteur passé en paramètre
         * @param un objet auteur
         * @return nombre de auteurs supprimés
         */
        public static function delAuteurByID($idAuteur) : int  {
            
            $sql = "DELETE FROM auteur
                    WHERE IDENTIFIANT_AUTEUR = :idAuteur";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":idAuteur"=>$idAuteur));
                
                $nombre = $rs->rowCount();
                
                // pour faire propre
                $rs->closeCursor();
                Bdtk::disconnect();
                return $nombre; 
            }
            catch(PDOException $e)
            {
            }
        }

//////////////////////////////////////////////////////////////// Supprime un auteur avec son NOM ////////////////////////////////////////////////////////////////////////
                /**
         * Permet de supprimer le nom de l'auteur passé en paramètre
         * @param un objet auteur
         * @return nombre de auteurs supprimés
         */
        public static function delAuteurByName($libAuteur) : int  {
            
            $sql = "DELETE FROM auteur
                    WHERE LIBELLE_AUTEUR = :libAuteur";
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":libAuteur"=>$libAuteur));
                
                $nombre = $rs->rowCount();
                
                // pour faire propre
                $rs->closeCursor();
                Bdtk::disconnect();
                return $nombre;
            }
            catch(PDOException $e)
            {
            }
        }

////////////////////////////////////////////////////////////////// Met à jour un auteur  //////////////////////////////////////////////////////////////////////////////////

        /**
         * Permet de modifier l'auteur passé en paramètre
         * @param un objet auteur
         * @return nombre d'auteur mis à jour
         */
        public static function updateAuteur($value1, $idAuteur) : int  {

            $sql = "UPDATE auteur SET  LIBELLE_AUTEUR = :newLibAuteur
                    WHERE IDENTIFIANT_AUTEUR = :idAuteur";
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);
                $rs->execute(array(":newLibAuteur"=>$value1,":idAuteur"=>$idAuteur)); 

                $nombre = $rs->rowCount();

                // pour faire propre
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