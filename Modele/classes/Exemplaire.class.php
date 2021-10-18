<?php

class Exemplaire {

    private $codeEx;
    private $dispoEx;
    private $numAlbum;
    private $codeEtat;
    private $idCreateur;
    private $idDelete;
    private $idModificateur;
    private $codeBDTK;

    /**
	 * 
	 * @param codeEx 		    Code Exemplaire
	 * @param dispoEx           Disponibilité
	 * @param numAlbum          Numero album
     * @param codeEtat          Code de l'état
     * @param idCreateur        identifiant du créateur 
     * @param idDelete          identifiant du supprimeur
     * @param idModificateur    identifiant du modificateur
     * @param codeBDTK          Code BDTK
	 */
	public function __construct(int $codeEx, string $dispoEx, int $numAlbum, string $codeEtat,  $idCreateur,  $idDelete,  $idModificateur, int $codeBDTK) {
        
		$this->codeEx = $codeEx;
		$this->dispoEx = $dispoEx;
		$this->numAlbum = $numAlbum;
        $this->codeEtat = $codeEtat;
		$this->idCreateur = $idCreateur;
        $this->idDelete = $idDelete;
		$this->idModificateur = $idModificateur;
		$this->codeBDTK = $codeBDTK;
	}

    public function getCodeEx() {
		return $this->codeEx;
	}
	private function setCodeEx($codeEx) {
		$this->codeEx = $codeEx;
	}

	public function getDispoEx() {
		return $this->dispoEx;
	}
	public function setDispoEx($dispoEx) {
		$this->dispoEx = $dispoEx;
	}

	public function getNumAlbum() {
		return $this->numAlbum;
	}
	public function setNumAlbum($numAlbum) {
		$this->numAlbum = $numAlbum;
	}

    public function getCodeEtat() {
		return $this->codeEtat;
	}
	public function setCodeEtat($codeEtat) {
		$this->codeEtat = $codeEtat;
	}

	public function getIdCreateur() {
		return $this->idCreateur;
	}
	public function setIdCreateur($idCreateur) {
		$this->idCreateur = $idCreateur;
	}

	public function getIdDelete() {
		return $this->idDelete;
	}
	public function setIdDelete($idDelete) {
		$this->idDelete = $idDelete;
	}

    public function getIdModificateur() {
		return $this->idModificateur;
	}
	public function setIdModificateur($idModificateur) {
		$this->idModificateur = $idModificateur;
	}

	public function getCodeBDTK() {
		return $this->codeBDTK;
	}
	public function setCodeBDTK($codeBDTK) {
		$this->codeBDTK = $codeBDTK;
	}

}

?>