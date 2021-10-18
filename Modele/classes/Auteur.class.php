<?php

class Auteur {

    private $idAuteur;
    private $libAuteur;

    /**
	 * @param idAuteur 		Identifiant auteur
	 * @param libAuteur        Nom du ou des auteurs
	 */
	public function __construct(int $idAuteur, string $libAuteur) {
        
		$this->idAuteur = $idAuteur;
		$this->libAuteur = $libAuteur;
	}

	// Getters and Setters
	public function getIDAut() {
		return $this->idAuteur;
	}
	private function setIDAut($idAuteur) {
		$this->idAuteur = $idAuteur;
	}
	public function getLibAut() {
		return $this->libAuteur;
	}
	public function setLibAut($libAuteur) {
		$this->libAuteur = $libAuteur;
	}
}

?>