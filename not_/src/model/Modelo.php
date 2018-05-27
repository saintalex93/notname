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
	



    public function getIdModelo()
    {
        return $this->idModelo;
    }


    public function setIdModelo($idModelo)
    {
        $this->idModelo = $idModelo;

    }


    public function getNomeModelo()
    {
        return $this->nomeModelo;
    }


    public function setNomeModelo($nomeModelo)
    {
        $this->nomeModelo = $nomeModelo;
    }


    public function getTamanhoModelo()
    {
        return $this->tamanhoModelo;
    }


    public function setTamanhoModelo($tamanhoModelo)
    {
        $this->tamanhoModelo = $tamanhoModelo;

    }


    public function getCormodelo()
    {
        return $this->cormodelo;
    }


    public function setCormodelo($cormodelo)
    {
        $this->cormodelo = $cormodelo;

    }


    public function getVlrVendaModelo()
    {
        return $this->vlrVendaModelo;
    }


    public function setVlrVendaModelo($vlrVendaModelo)
    {
        $this->vlrVendaModelo = $vlrVendaModelo;

    }


    public function getStatusModelo()
    {
        return $this->statusModelo;
    }


    public function setStatusModelo($statusModelo)
    {
        $this->statusModelo = $statusModelo;

    }


    public function getVlrCompraModelo()
    {
        return $this->vlrCompraModelo;
    }


    public function setVlrCompraModelo($vlrCompraModelo)
    {
        $this->vlrCompraModelo = $vlrCompraModelo;

    }


    public function getDtCompraModelo()
    {
        return $this->dtCompraModelo;
    }


    public function setDtCompraModelo($dtCompraModelo)
    {
        $this->dtCompraModelo = $dtCompraModelo;

    }


    public function getDescontoModelo()
    {
        return $this->descontoModelo;
    }


    public function setDescontoModelo($descontoModelo)
    {
        $this->descontoModelo = $descontoModelo;

    }

    public function getQtdEstoqueModelo()
    {
        return $this->qtdEstoqueModelo;
    }


    public function setQtdEstoqueModelo($qtdEstoqueModelo)
    {
        $this->qtdEstoqueModelo = $qtdEstoqueModelo;

    }


    public function getIdCompraEstoqueModelo()
    {
        return $this->idCompraEstoqueModelo;
    }


    public function setIdCompraEstoqueModelo($idCompraEstoqueModelo)
    {
        $this->idCompraEstoqueModelo = $idCompraEstoqueModelo;

    }
}