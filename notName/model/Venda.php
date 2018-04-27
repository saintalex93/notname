<?php

class Venda{

	private $idVenda;
	private $vlrTotalVenda;
	private $dtCompraVenda;
	private $CodRastVenda;
    private $dtAtualizacaoVenda;
    private $idCli;
    private $idStatusVenda;



  

    /**
     * @return mixed
     */
    public function getIdVenda()
    {
        return $this->idVenda;
    }

    /**
     * @param mixed $idVenda
     *
     * @return self
     */
    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVlrTotalVenda()
    {
        return $this->vlrTotalVenda;
    }

    /**
     * @param mixed $vlrTotalVenda
     *
     * @return self
     */
    public function setVlrTotalVenda($vlrTotalVenda)
    {
        $this->vlrTotalVenda = $vlrTotalVenda;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtCompraVenda()
    {
        return $this->dtCompraVenda;
    }

    /**
     * @param mixed $dtCompraVenda
     *
     * @return self
     */
    public function setDtCompraVenda($dtCompraVenda)
    {
        $this->dtCompraVenda = $dtCompraVenda;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCodRastVenda()
    {
        return $this->CodRastVenda;
    }

    /**
     * @param mixed $CodRastVenda
     *
     * @return self
     */
    public function setCodRastVenda($CodRastVenda)
    {
        $this->CodRastVenda = $CodRastVenda;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtAtualizacaoVenda()
    {
        return $this->dtAtualizacaoVenda;
    }

    /**
     * @param mixed $dtAtualizacaoVenda
     *
     * @return self
     */
    public function setDtAtualizacaoVenda($dtAtualizacaoVenda)
    {
        $this->dtAtualizacaoVenda = $dtAtualizacaoVenda;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCli()
    {
        return $this->idCli;
    }

    /**
     * @param mixed $idCli
     *
     * @return self
     */
    public function setIdCli($idCli)
    {
        $this->idCli = $idCli;

        return $this;
    }
}