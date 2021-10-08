<?php

    class Bdtk {
        // variables statiques
        private static $connexion;
    
        // Pas de constructeur explicite
    
        // fonction de connexion à la BDD
        private static function connect() {
            $file = '../param/parametres.ini';
            if (file_exists($file)) {
                $tParam = parse_ini_file($file,true);
                //var_dump($tParam);            
    
                extract($tParam['connection bdd']); // génère les variables dynamiquement
    
                $dsn = "mysql:host=".$host."; port=".$port."; dbname=".$bdd."; charset=utf8";
                
                $mysqlPDO = new PDO($dsn, $user, $password,
                                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                Bdtk::$connexion = $mysqlPDO;
                
                return Bdtk::$connexion;
            } else {
                throw new Exception("ERR:Fichier de paramètre inconnu");
            }
        }
    
        // fonction de 'déconnexion' de la BDD
        public static function disconnect(){
            Bdtk::$connexion = null;
        }
    
        // Pattern singleton
        public static function getConnexion() {
            if (Bdtk::$connexion != null) {
                return Bdtk::$connexion;
            } else {
                return Bdtk::connect();
            }
        }

        
    }
    








?>