<?php

class Auteur {

    public $idAuteur;
    public $libAuteur;

    /**
	 * 
	 * @param idAuteur 		Identifiant auteur
	 * @param libAuteur        Nom du ou des auteurs
	 */
	public function __construct(int $idAuteur, string $libAuteur) {
        
		$this->idAuteur = $idAuteur;
		$this->libAuteur = $libAuteur;
	}
}

?>