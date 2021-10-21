<?php
class AlbumMgr {
    
//////////////////////////////////////////////////////////////// Récupère la liste de tous les albums ///////////////////////////////////////////////////////////////////
        /**
         * Permet d'obtenir une liste complète des Albums
         * @param le mode de récupération des données (Tableau associatif par défaut)
         * @return array la liste des albums
         */
        public static function getListAlbum() : array {
            $sql = 'SELECT * FROM album 
                    ORDER BY NUMERO_ALBUM ASC';

            $connexionPDO = Bdtk::getConnexion();
            $resPDOstt = $connexionPDO->query($sql);
            $records = $resPDOstt->fetchAll(PDO::FETCH_ASSOC);

            $resPDOstt->closeCursor(); // ferme le curseur
            Bdtk::disconnect();     // ferme la connexion

            return $records;
        }

//////////////////////////////////////////////////////////////// Cherche un album dans la liste avec un NOM ///////////////////////////////////////////////////////////////////
        /**
         * Permet de chercher des series
         * @param le mot clé de la recherche
         * @return array les series proche de la recherche
         */
        public static function searchAlbum($search) : array {

            $sql = "SELECT * FROM `album` 
                    WHERE (TITRE_ALBUM LIKE ?)";
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


                /**
         * Permet d'ajouter l' album passé en paramètre
         * @param un objet album
         * @return nombre de albums ajoutés
         */
        public static function addAlbum(Album $album) {
            
            $sql = 'INSERT INTO album (NUMERO_ALBUM , TITRE_ALBUM, PRIX_ALBUM,IDENTIFIANT_AUTEUR ,IDENTIFIANT_SERIE,IDENTIFIANT_UTILISATEUR,IDENTIFIANT_UTILISATEUR_MODIFIER,IDENTIFIANT_UTILISATEUR_RETIRE ,LIB_POCH_ALB) VALUES (?,?,?,?,?,?,?,?,?)';
            
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);

                // exécution requête

                $rs->execute(array($album->numAlbum,$album->titreAlbum,$album->prixAlbum,$album->idAuteur,$album->idSerie,$album->idCreateur,$album->idModificateur,$album->idDelete,$album->libPochAlb));
                
                $nombre = $rs->rowCount();
                echo $nombre;
                
                // pour faire propre
                $rs->closeCursor();
                Bdtk::disconnect();
            }
            catch(PDOException $e)
            {
            return $nombre; 
        }
    }

        /**
         * Permet de supprimer l'album passé en paramètre
         * @param un objet album
         * @return nombre d'album supprimés
         */
        public static function delAlbumbyId($idalbum) {
            $sql = "DELETE FROM album WHERE NUMERO_ALBUM =?";
            try {
                $rs = Bdtk::getConnexion()->prepare($sql);

                // exécution requête

                $rs->execute(array($idalbum));
                
                $nombre = $rs->rowCount();
                echo $nombre;
                
                // pour faire propre
                $rs->closeCursor();
                Bdtk::disconnect();
            }
            catch(PDOException $e)
            {
            return $nombre; 
            }
        }

                /**
         * Permet de modifier l'album passé en paramètre
         * @param un objet album
         * @return nombre d'album mis à jour
         */
        public static function updateAlbum($idalbum) {
            // Prépare la requête SQL
            $sql = "UPDATE album SET IDENTIFIANT_UTILISATEUR_MODIFIER=?, IDENTIFIANT_UTILISATEUR_RETIRE=? WHERE NUMERO_ALBUM=?";
                    
            $rs = Bdtk::getConnexion()->prepare($sql);

            // exécution requête
            $rs->execute(array(NULL,NULL,$idalbum)); // ATTENTION à l'ordre des attributs
            
            $nombre = $rs->rowCount();
            
            // pour faire propre
            $rs->closeCursor();
            Bdtk::disconnect();
            return $nombre; 
        }

                     /**
         * Permet de modifier l'album passé en paramètre
         * @param un objet album
         * @return nombre d'album mis à jour
         */
        public static function getPic($libSerie, $numSaga, $libPoch) {
            // Prépare la requête SQL
            $sql = "SELECT CONCAT(s.:libSerie,\"-\", a.:numSaga,\"-\", a.:libPoch)  FROM serie s
                    JOIN album a ON a.IDENTIFIANT_SERIE = s.IDENTIFIANT_SERIE";
                    
            $rs = Bdtk::getConnexion()->prepare($sql);

            // exécution requête
            $rs->execute(array(":libSerie"=>$libSerie,":libSerie"=>$numSaga,":codeEmp"=>$libPoch));
            
            $nombre = $rs->rowCount();
            
            // pour faire propre
            $rs->closeCursor();
            Bdtk::disconnect();
            return $nombre; 
        }


                     /**
         * Permet de modifier l'album passé en paramètre
         * @param un objet album
         * @return nombre d'album mis à jour
         */
        public static function getLibSerie($idSerie) {
            // Prépare la requête SQL
            $sql = "SELECT LIBELLE_SERIE from serie
                    WHERE IDENTIFIANT_SERIE = :idSerie";
                    
            $rs = Bdtk::getConnexion()->prepare($sql);

            // exécution requête
            $rs->execute(array(":idSerie"=>$idSerie));
            
            $nombre = $rs->rowCount();
            
            // pour faire propre
            $rs->closeCursor();
            Bdtk::disconnect();
            return $nombre; 
        }
 
}

?>