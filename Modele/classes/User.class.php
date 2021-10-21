<?php

class User {

    // public $idUser;
    private $nomUser;
    private $prenomUser;
    private $mdpUser;
    private $emailUser;
    public $idRole;
    public $libAvatar;
    public $dateNaisseUser;
    public $adrUser;
    public $cpUser;
    public $villeUser;
    public $idUserCreate;
    public $iduserUpdate;
    public $dateValCot;
    public $idUserdel;
    

    /**
	 * 
	 * @param idUser 		    identifiant utilisateur INT
	 * @param nomUser           nom utilisateur string 
	 * @param prenomUser        prenom utilisateur sting  
     * @param mdpUser           mot de passe utilisateur string
     * @param emailUser         email utilisateur string
     * @param idRole            identifiant role utilisateur INT
     * @param libAvatar         libellé avatar string
     * @param dateNaisseUser    date de naissance utilisateur DATE  
     * @param adrUser           adresse utilisateur string
     * @param cpUser            code postal utilisateur INT
     * @param villeUser         ville utilisateur string
     * @param idUserCreate      identifiant utilisateur créant INT
     * @param iduserUpdate      identifiant utilisateur modificateur INT
     * @param dateValCot        date validité de cotisation DATE
     * @param idUserdel         identifiant utilisateur supprimant INT
     * 
     * 
	 */
	public function __construct(string $nomUser, string $prenomUser, string $mdpUser, string $emailUser, int $idRole = 1, string $libAvatar = "", $dateNaisseUser, string $adrUser, int $cpUser, string $villeUser , int $idUserCreate = 3, $iduserUpdate = NULL, $dateValCot, $idUserdel = NULL) {
        
		
		$this->setNomUser($nomUser);
		$this->setPrenomUser($prenomUser);
        $this->setPassword($mdpUser);
		$this->setEmail($emailUser);
        $this->idRole = $idRole;
		$this->libAvatar = $libAvatar;
		$this->dateNaisseUser = $dateNaisseUser;
        $this->adrUser = $adrUser;
        $this->cpUser = $cpUser;
        $this->villeUser = $villeUser;
        $this->idUserCreate = $idUserCreate;
        $this->idUserUpdate = $iduserUpdate;
        $this->dateValCot = $dateValCot;
        $this->idUserdel = $idUserdel;


	}

    public function setEmail($emailUser){
        if (filter_var($emailUser, FILTER_VALIDATE_EMAIL)) {
            $this->emailUser = $emailUser;
        } else {
            throw new Exception('Format email invalide');
        }

    }

    public function getEmail(){
        return $this->emailUser;

    }

    public function setPassword($mdpUser){
        if(preg_match("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/", $mdpUser)){

            $this->mdpUser = $mdpUser;
            
        }else{
            throw new Exception('Format mot de passe invalide');
        }
            
    }

    public function getPassword(){
        return $this->mdpUser;
        
    }

    public function setNomUser($nomUser){
        if (preg_match("/^[a-zA-Z-' ]*$/",$nomUser)) {
            $this->nomUser = $nomUser;
        }else {
            throw new Exception('Format du nom invalide');
        }
    }

    public function getNomUser(){
        return $this->nomUser;

    }

    public function setPrenomUser($prenomUser){
        if (preg_match("/^[a-zA-Z-' ]*$/",$prenomUser)) {
            $this->prenomUser = $prenomUser;
        }else {
            throw new Exception('Format du prénom invalide');
        }
    }

    public function getPrenomUser(){
        return $this->prenomUser;

    }
}

?>