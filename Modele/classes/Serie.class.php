<?php

class Serie {

    private $idSerie;
    private $libSerie;
    private $codeEmp;

    /**
	 * 
	 * @param $idSerie      Identifiant serie
	 * @param $libSerie     Nom de la serie
     * @param $codeEmp      Le code emplacement       
	 */
	public function __construct(int $idSerie, string $libSerie, string $codeEmp) {
        
		$this->idSerie = $idSerie;
		$this->libSerie = $libSerie;
        $this->codeEmp = $codeEmp;
	}

	public function getIdSerie() {
		return $this->idSerie;
	}
	private function setIdSerie($idSerie) {
		$this->idSerie = $idSerie;
	}
	public function getLibSerie() {
		return $this->libSerie;
	}
	public function setLibSerie($libSerie) {
		$this->libSerie = $libSerie;
	}
	public function getCodeEmp() {
		return $this->codeEmp;
	}
	public function setCodeEmp($codeEmp) {
		$this->codeEmp = $codeEmp;
	}
}

?>