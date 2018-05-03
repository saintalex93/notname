<?php

class PreferenciaSistema{

	private $idPref;
	private $numClickPref;
	private $padraoSysPref;
	


    public function getIdPref()
    {
        return $this->idPref;
    }


    public function setIdPref($idPref)
    {
        $this->idPref = $idPref;

    }


    public function getNumClickPref()
    {
        return $this->numClickPref;
    }


    public function setNumClickPref($numClickPref)
    {
        $this->numClickPref = $numClickPref;

    }


    public function getPadraoSysPref()
    {
        return $this->padraoSysPref;
    }


    public function setPadraoSysPref($padraoSysPref)
    {
        $this->padraoSysPref = $padraoSysPref;

    }
}