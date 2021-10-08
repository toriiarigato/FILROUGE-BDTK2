<?php
class AlbumMgr {

        /**
         * Permet d'obtenir une liste complète des Albums
         * @param le mode de récupération des données (Tableau associatif par défaut)
         * @return array la liste des albums
         */
        public static function getListAlbum() {
            // Requête : la liste des albums
            $sql = 'SELECT * FROM album ORDER BY NUMERO_ALBUM ASC';
            // echo $sql; // pour mise au point

            // Etape 1 - Crée une connexion BDD
            $connexionPDO = Bdtk::getConnexion();
            //var_dump($connexion);

            // Etape 2 - Lance la requête
            $resPDOstt = $connexionPDO->query($sql);
            //var_dump($resPDOstt);

            // Définir le FETCH MODE
            // if ($choix === PDO::FETCH_CLASS) {
            //     $resPDOstt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,
            // 'album',array('pil','pilNom','adr'));
            // } else {
            //     $resPDOstt->setFetchMode($choix);
            // }

            // Etape 3 - Lit un résultat
            // $record = $resPDOstt->fetch();

            // echo $record['pilNom'];
            // echo $record[1];

            // Etape 3 - Lit tout le curseur PDOStatement
            $records = $resPDOstt->fetchAll();
            //var_dump($records);

            // Etape 4 - Ferme le curseur et la connexion
            $resPDOstt->closeCursor(); // ferme le curseur
            Bdtk::disconnect();     // ferme la connexion

            // Etape 5 - Retourne le tableau
            return $records;
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
            // $iduserupdate = NULL;
            // $îduserDelete1 = NULL;
            $rs->execute(array(NULL,NULL,$idalbum)); // ATTENTION à l'ordre des attributs
            
            $nombre = $rs->rowCount();
            
            // pour faire propre
            $rs->closeCursor();
            Bdtk::disconnect();
            return $nombre; 
        }

}

?>