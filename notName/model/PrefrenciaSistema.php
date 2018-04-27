<?php

class PreferenciaSistema{

	private $idPref;
	private $numClickPref;
	private $padraoSysPref;
	

    /**
     * @return mixed
     */
    public function getIdPref()
    {
        return $this->idPref;
    }

    /**
     * @param mixed $idPref
     *
     * @return self
     */
    public function setIdPref($idPref)
    {
        $this->idPref = $idPref;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumClickPref()
    {
        return $this->numClickPref;
    }

    /**
     * @param mixed $numClickPref
     *
     * @return self
     */
    public function setNumClickPref($numClickPref)
    {
        $this->numClickPref = $numClickPref;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPadraoSysPref()
    {
        return $this->padraoSysPref;
    }

    /**
     * @param mixed $padraoSysPref
     *
     * @return self
     */
    public function setPadraoSysPref($padraoSysPref)
    {
        $this->padraoSysPref = $padraoSysPref;

        return $this;
    }
}