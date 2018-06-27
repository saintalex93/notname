<?php

class Venda
{

    private $idVenda;

    private $idVendaModelo;

    private $vlrTotalVenda;

    private $dtCompraVenda;

    private $CodRastVenda;

    private $idCli;

    private $statusVenda;

    private $formaPagamento;

    private $frete;

    private $vlrFrete;

    private $modelo = array();

    public function getModelo()
    {
        return $this->modelo;
    }


    public function setModelo($modelo)
    {
        $this->modelo[] = $modelo;

        return $this;
    }


    public function getIdVendaModelo()
    {
        return $this->idVendaModelo;
    }


    public function setIdVendaModelo($idVendaModelo)
    {
        $this->idVendaModelo = $idVendaModelo;

        return $this;
    }

    public function getIdVenda()
    {
        return $this->idVenda;
    }


    public function setIdVenda($idVenda)
    {
        $this->idVenda = $idVenda;

        return $this;
    }

 
    public function getVlrTotalVenda()
    {
        return $this->vlrTotalVenda;
    }


    public function setVlrTotalVenda($vlrTotalVenda)
    {
        $this->vlrTotalVenda = $vlrTotalVenda;

        return $this;
    }


    public function getDtCompraVenda()
    {
        return $this->dtCompraVenda;
    }

    public function setDtCompraVenda($dtCompraVenda)
    {
        $this->dtCompraVenda = $dtCompraVenda;

        return $this;
    }


    public function getCodRastVenda()
    {
        return $this->CodRastVenda;
    }


    public function setCodRastVenda($CodRastVenda)
    {
        $this->CodRastVenda = $CodRastVenda;

        return $this;
    }


    public function getIdCli()
    {
        return $this->idCli;
    }


    public function setIdCli($idCli)
    {
        $this->idCli = $idCli;

        return $this;
    }

 
    public function getStatusVenda()
    {
        return $this->statusVenda;
    }


    public function setStatusVenda($statusVenda)
    {
        $this->statusVenda = $statusVenda;

        return $this;
    }


    public function getVlrFrete()
    {
        return $this->vlrFrete;
    }

    public function setVlrFrete($vlrFrete)
    {
        $this->vlrFrete = $vlrFrete;

        return $this;
    }

    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }


    public function setFormaPagamento($formaPagamento)
    {
        $this->formaPagamento = $formaPagamento;

        return $this;
    }

    public function getFrete()
    {
        return $this->frete;
    }

 
    public function setFrete($frete)
    {
        $this->frete = $frete;

        return $this;
    }
}