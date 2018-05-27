<?php
class CompraEstoque{

    private $idCompraeEstoque;
	private $vlrTotalCompraEstoque;
	private $dtDataCompraEstoque;
	




    public function getIdCompraeEstoque()
    {
        return $this->idCompraeEstoque;
    }


    public function setIdCompraeEstoque($idCompraeEstoque)
    {
        $this->idCompraeEstoque = $idCompraeEstoque;

    }


    public function getVlrTotalCompraEstoque()
    {
        return $this->vlrTotalCompraEstoque;
    }


    public function setVlrTotalCompraEstoque($vlrTotalCompraEstoque)
    {
        $this->vlrTotalCompraEstoque = $vlrTotalCompraEstoque;

    }


    public function getDtDataCompraEstoque()
    {
        return $this->dtDataCompraEstoque;
    }

    public function setDtDataCompraEstoque($dtDataCompraEstoque)
    {
        $this->dtDataCompraEstoque = $dtDataCompraEstoque;

    }
}