<?php

class Serie {

    public $idSerie;
    public $libSerie;
    public $codeEmp;

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
}

?>