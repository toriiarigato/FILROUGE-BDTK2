<?php

class User {

    public $idUser;
    public $nomUser;
    public $prenomUser;
    public $mdpUser;
    public $emailUser;
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
	public function __construct(string $nomUser, string $prenomUser, string $mdpUser, string $emailUser, int $idRole, string $libAvatar, $dateNaisseUser, string $adrUser, int $cpUser, string $villeUser , int $idUserCreate, $iduserUpdate, $dateValCot, $idUserdel) {
        
		
		$this->nomUser = $nomUser;
		$this->prenomUser = $prenomUser;
        $this->mdpUser = $mdpUser;
		$this->emailUser = $emailUser;
        $this->idRole = $idRole;
		$this->libAvatar = $libAvatar;
		$this->dateNaisseUser = $dateNaisseUser;
        $this->adrUser = $adrUser;
        $this->cpUser = $cpUser;
        $this->villeUser = $villeUser;
        $this->idUserCreate = $idUserCreate;
        $this->idUserUpdate = $iduserUpdate;
        $this->dateValCot = $dateValCot;
        $this->idUserDel = $idUserdel;


	}
}

?>