<?php

class Venda
{

    private $idVenda;

    private $vlrTotalVenda;

    private $dtCompraVenda;

    private $CodRastVenda;

    private $dtAtualizacaoVenda;

    private $idCli;

    private $idStatusVenda;

    private $idStatus;

    private $dtSeparacaoVendaProd;

    private $qtdeVendaProd;

    public function getIdVenda()
    {
        return $this->idVenda;
    }

    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;
    }

    public function getVlrTotalVenda()
    {
        return $this->vlrTotalVenda;
    }

    public function setVlrTotalVenda($vlrTotalVenda)
    {
        $this->vlrTotalVenda = $vlrTotalVenda;
    }

    public function getDtCompraVenda()
    {
        return $this->dtCompraVenda;
    }

    public function setDtCompraVenda($dtCompraVenda)
    {
        $this->dtCompraVenda = $dtCompraVenda;
    }

    public function getCodRastVenda()
    {
        return $this->CodRastVenda;
    }

    public function setCodRastVenda($CodRastVenda)
    {
        $this->CodRastVenda = $CodRastVenda;
    }

    public function getDtAtualizacaoVenda()
    {
        return $this->dtAtualizacaoVenda;
    }

    public function setDtAtualizacaoVenda($dtAtualizacaoVenda)
    {
        $this->dtAtualizacaoVenda = $dtAtualizacaoVenda;
    }

    public function getIdCli()
    {
        return $this->idCli;
    }

    public function setIdCli($idCli)
    {
        $this->idCli = $idCli;
    }

    public function getIdStatus()
    {
        return $this->idStatus;
    }

    public function setIdStatus($idStatus)
    {
        $this->idStatus = $idStatus;
    }

    public function getIdVendaStatus()
    {
        return $this->idStatusVenda;
    }

    public function setIdVendaStatus($idVendaStatus)
    {
        $this->idStatusVenda = $idVendaStatus;
    }

    public function getDTSeparacaoVendaProduto()
    {
        return $this->dtSeparacaoVendaProd;
    }

    public function setDTSeparacaoVendaProduto($DTSeparacaoVendaProduto)
    {
        $this->dtSeparacaoVendaProd = $DTSeparacaoVendaProduto;
    }

    public function getQtdeVendaProduto()
    {
        return $this->qtdeVendaProd;
    }

    public function setQtdeVendaProduto($qtdeVendaProduto)
    {
        $this->qtdeVendaProd = $qtdeVendaProduto;
    }
}