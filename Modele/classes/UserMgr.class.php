<?php
class UserMgr {

        /**
         * Permet d'obtenir une liste complète des utilisateur
         * @param le mode de récupération des données (Tableau associatif par défaut)
         * @return array la liste des utilisateurs
         */
        public static function getListUser() {
            // Requête : la liste des utilisateurs
            $sql = 'SELECT * FROM utilisateur ORDER BY ID_USE ASC';
            // echo $sql; // pour mise au point

            // Etape 1 - Crée une connexion BDD
            $connexionPDO = Bdtk::getConnexion();
            //var_dump($connexion);

            // Etape 2 - Lance la requête
            $resPDOstt = $connexionPDO->query($sql);
            //var_dump($resPDOstt);

            // Etape 3 - Lit tout le curseur PDOStatement
            $records = $resPDOstt->fetchAll();
            //var_dump($records);-

            // Etape 4 - Ferme le curseur et la connexion
            $resPDOstt->closeCursor(); // ferme le curseur
            Bdtk::disconnect();     // ferme la connexion

            // Etape 5 - Retourne le tableau
            return $records;
        }

        public static function getUserById($id){
            $connexion = Bdtk::getConnexion();
            $sql = 'SELECT * FROM utilisateur WHERE ID_USE = ?';

            $resultats = $connexion->prepare($sql);
            $resultats->execute(array($id));
            $records = $resultats->fetchAll();
            Bdtk ::disconnect();
            $count = $resultats->rowCount();
            if ($count ==0){
                return "Parametres erronnés ou inconnus";
    
            }else{
                return $records;
            }

            
        }


        /**
     * Fonction Add 
     * 
     * @param object utilisateur 
     * 
     * @return void 
     */
    public static function addUser($user) {

        $connexion=Bdtk::getConnexion();

        $sql = 'INSERT INTO utilisateur ( NOM_USE, PRENOM_USE,MDP_USE ,EMAIL_USE,ID_ROLE,LIB_AVATAR,DATENAISS_USE ,ADR_USE, CP_USE,VILLE_USE,ID_USE_CREATE,ID_USE_UPD,DATE_VAL_COTIS,ID_USE_DEL) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)';

        $resultats = $connexion->prepare($sql);
        $resultats->execute(array($user->nomUser,$user->prenomUser,$user->mdpUser,$user->emailUser,$user->idRole,$user->libAvatar,$user->dateNaisseUser,$user->adrUser,$user->cpUser,$user->villeUser,$user->idUserCreate,$user->iduserUpdate,$user->dateValCot,$user->idUserdel));
        Bdtk ::disconnect();
        $count = $resultats->rowCount();
        if ($count ==0){
            return "Parametres erronnés ou inconnus";

        }else{
            return "Ajout de ".$count." lignes";
        }
    
    }



                /**
         * Permet de supprimer l'utilisateur passé en paramètre
         * @param un objet utilisateur
         * @return nombre d'utilisateurs supprimés
         */
        public static function delUseryId($user) {
            $sql = "DELETE FROM utilisateur WHERE ID_USE =?";
            try {
                $resultats = Bdtk::getConnexion()->prepare($sql);

                // exécution requête

                $resultats->execute(array($user));
                
                $nombre = $resultats->rowCount();
                echo $nombre;
                
                // pour faire propre
                $resultats->closeCursor();
                Bdtk::disconnect();
                $count = $resultats->rowCount();
        if ($count ==0){
            return "Parametres erronnés ou inconnus";

        }else{
            return "Suppression de ".$count." lignes";
        }
            }
            catch(PDOException $e)
            {
            }
            
        }

                        /**
         * Permet de modifier l'utilisateur passé en paramètre
         * @param un objet user
         * @return nombre d'utilisateur mis à jour
         */
        public static function updateUser($user) {
            // Prépare la requête SQL
            $sql = "UPDATE utilisateur SET NOM_USE=?, PRENOM_USE=? WHERE ID_USE=?";
            try {        
            $resultats = Bdtk::getConnexion()->prepare($sql);

            // exécution requête
            $resultats->execute(array("Michel","Michel",$user)); // ATTENTION à l'ordre des attributs
            
            // pour faire propre
            $resultats->closeCursor();
            Bdtk::disconnect();
            $count = $resultats->rowCount();
            if ($count ==0){
                return "Parametres erronnés ou inconnus";

            }else{
                return "Modification de ".$count." lignes";
            }
        }
            catch(PDOException $e)
        {
        
        }
        }

        public static function connect($id,$mdp){
            // Prépare la requête SQL
            $sql = "SELECT * FROM utilisateur WHERE EMAIL_USE = ? AND MDP_USE = ?";
            try {        
                $resultats = Bdtk::getConnexion()->prepare($sql);
                // exécution requête
            
                $resultats->execute(array($id,$mdp)); 
                
                // pour faire propre
                $resultats->closeCursor();
                Bdtk::disconnect();
                $count = $resultats->rowCount();
                if ($count == 0){
                    return "Parametres erronnés ou inconnus";

                }else{
                    
                    return $count;
                }
        }
            catch(PDOException $e)
        {
        
        }


        }

}

?>