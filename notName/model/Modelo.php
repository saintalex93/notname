<?php

class Modelo{

	private $idModelo;
	private $nomeModelo;
	private $vlrVendaModelo;
	private $statusModelo;
	private $descontoModelo;
	private $qtdEstoqueModelo;
	private $cormodelo;
	private $tamanhoModelo;
    private $produtoIdModelo;
    private $descProduto;
    private $descCor;
    private $descTamanho;
    private $hexCor;
    
    public function getHexCor()
    {
        return $this->hexCor;
    }

    public function setHexCor($hexCor)
    {
        $this->hexCor = $hexCor;
    }


    public function getIdModelo()
    {
        return $this->idModelo;
    }

    public function getNomeModelo()
    {
        return $this->nomeModelo;
    }

    public function getVlrVendaModelo()
    {
        return $this->vlrVendaModelo;
    }

    public function getStatusModelo()
    {
        return $this->statusModelo;
    }

    public function getDescontoModelo()
    {
        return $this->descontoModelo;
    }

    public function getQtdEstoqueModelo()
    {
        return $this->qtdEstoqueModelo;
    }

    public function getCormodelo()
    {
        return $this->cormodelo;
    }

    public function getTamanhoModelo()
    {
        return $this->tamanhoModelo;
    }

    public function getProdutoIdModelo()
    {
        return $this->produtoIdModelo;
    }

    public function getDescProduto()
    {
        return $this->descProduto;
    }

    public function getDescCor()
    {
        return $this->descCor;
    }

    public function getDescTamanho()
    {
        return $this->descTamanho;
    }

    public function setIdModelo($idModelo)
    {
        $this->idModelo = $idModelo;
    }

    public function setNomeModelo($nomeModelo)
    {
        $this->nomeModelo = $nomeModelo;
    }

    public function setVlrVendaModelo($vlrVendaModelo)
    {
        $this->vlrVendaModelo = $vlrVendaModelo;
    }

    public function setStatusModelo($statusModelo)
    {
        $this->statusModelo = $statusModelo;
    }

    public function setDescontoModelo($descontoModelo)
    {
        $this->descontoModelo = $descontoModelo;
    }

    public function setQtdEstoqueModelo($qtdEstoqueModelo)
    {
        $this->qtdEstoqueModelo = $qtdEstoqueModelo;
    }

    public function setCormodelo($cormodelo)
    {
        $this->cormodelo = $cormodelo;
    }

    public function setTamanhoModelo($tamanhoModelo)
    {
        $this->tamanhoModelo = $tamanhoModelo;
    }

    public function setProdutoIdModelo($produtoIdModelo)
    {
        $this->produtoIdModelo = $produtoIdModelo;
    }

    public function setDescProduto($descProduto)
    {
        $this->descProduto = $descProduto;
    }

    public function setDescCor($descCor)
    {
        $this->descCor = $descCor;
    }

    public function setDescTamanho($descTamanho)
    {
        $this->descTamanho = $descTamanho;
    }


}