<?php

class Modelo{

	private $idModelo;
	private $nomeModelo;
	private $tamanhoModelo;
	private $cormodelo;
	private $vlrVendaModelo;
	private $statusModelo;
	private $vlrCompraModelo;
	private $dtCompraModelo;
	private $descontoModelo;
	private $qtdEstoqueModelo;
	private $idCompraEstoqueModelo;
	


    /**
     * @return mixed
     */
    public function getIdModelo()
    {
        return $this->idModelo;
    }

    /**
     * @param mixed $idModelo
     *
     * @return self
     */
    public function setIdModelo($idModelo)
    {
        $this->idModelo = $idModelo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNomeModelo()
    {
        return $this->nomeModelo;
    }

    /**
     * @param mixed $nomeModelo
     *
     * @return self
     */
    public function setNomeModelo($nomeModelo)
    {
        $this->nomeModelo = $nomeModelo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTamanhoModelo()
    {
        return $this->tamanhoModelo;
    }

    /**
     * @param mixed $tamanhoModelo
     *
     * @return self
     */
    public function setTamanhoModelo($tamanhoModelo)
    {
        $this->tamanhoModelo = $tamanhoModelo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCormodelo()
    {
        return $this->cormodelo;
    }

    /**
     * @param mixed $cormodelo
     *
     * @return self
     */
    public function setCormodelo($cormodelo)
    {
        $this->cormodelo = $cormodelo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVlrVendaModelo()
    {
        return $this->vlrVendaModelo;
    }

    /**
     * @param mixed $vlrVendaModelo
     *
     * @return self
     */
    public function setVlrVendaModelo($vlrVendaModelo)
    {
        $this->vlrVendaModelo = $vlrVendaModelo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusModelo()
    {
        return $this->statusModelo;
    }

    /**
     * @param mixed $statusModelo
     *
     * @return self
     */
    public function setStatusModelo($statusModelo)
    {
        $this->statusModelo = $statusModelo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVlrCompraModelo()
    {
        return $this->vlrCompraModelo;
    }

    /**
     * @param mixed $vlrCompraModelo
     *
     * @return self
     */
    public function setVlrCompraModelo($vlrCompraModelo)
    {
        $this->vlrCompraModelo = $vlrCompraModelo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtCompraModelo()
    {
        return $this->dtCompraModelo;
    }

    /**
     * @param mixed $dtCompraModelo
     *
     * @return self
     */
    public function setDtCompraModelo($dtCompraModelo)
    {
        $this->dtCompraModelo = $dtCompraModelo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescontoModelo()
    {
        return $this->descontoModelo;
    }

    /**
     * @param mixed $descontoModelo
     *
     * @return self
     */
    public function setDescontoModelo($descontoModelo)
    {
        $this->descontoModelo = $descontoModelo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQtdEstoqueModelo()
    {
        return $this->qtdEstoqueModelo;
    }

    /**
     * @param mixed $qtdEstoqueModelo
     *
     * @return self
     */
    public function setQtdEstoqueModelo($qtdEstoqueModelo)
    {
        $this->qtdEstoqueModelo = $qtdEstoqueModelo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCompraEstoqueModelo()
    {
        return $this->idCompraEstoqueModelo;
    }

    /**
     * @param mixed $idCompraEstoqueModelo
     *
     * @return self
     */
    public function setIdCompraEstoqueModelo($idCompraEstoqueModelo)
    {
        $this->idCompraEstoqueModelo = $idCompraEstoqueModelo;

        return $this;
    }
}