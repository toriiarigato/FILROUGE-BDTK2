<?php

class Album {

    public $numAlbum;
    public $titreAlbum;
    public $numSaga;
    public $prixAlbum;
    public $idAuteur;
    public $idSerie;
    public $idPochAlb;
    public $idCreateur;
    public $idModificateur;
    public $idDelete;
    public $libPochAlb;

    /**
	 * 
	 * @param numbAlbum 		numéro album
	 * @param titreAlbum        titre de l'album
     * @param numSaga           le numéro de la sage
	 * @param prixAlbum         prix de l'album
     * @param idAuteur          identifiant de l'auteur
     * @param idSerie           identifiant de la série
     * @param idCreateur        identifiant du créateur 
     * @param idModificateur    identifiant du modificateur
     * @param idDelete          identifiant du supprimeur
     * @param libPochAlb        libéllé pochette album
	 */
	public function __construct(int $numAlbum, string $titreAlbum,string $numSaga, float $prixAlbum, int $idAuteur, int $idSerie, int $idCreateur,$idModificateur, $idDelete, string $libPochAlb) {
        
		$this->numAlbum = $numAlbum;
		$this->titreAlbum = $titreAlbum;
        $this->numSaga = $numSaga;
		$this->prixAlbum = $prixAlbum;
        $this->idAuteur = $idAuteur;
		$this->idSerie = $idSerie;
        $this->idCreateur = $idCreateur;
		$this->idModificateur = $idModificateur;
		$this->idDelete = $idDelete;
        $this->libPochAlb = $libPochAlb;

	}
}

?>