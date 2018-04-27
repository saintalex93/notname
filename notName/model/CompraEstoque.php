<?php
class CompraEstoque{

    private $idCompraeEstoque;
	private $vlrTotalCompraEstoque;
	private $dtDataCompraEstoque;
	



    /**
     * @return mixed
     */
    public function getIdCompraeEstoque()
    {
        return $this->idCompraeEstoque;
    }

    /**
     * @param mixed $idCompraeEstoque
     *
     * @return self
     */
    public function setIdCompraeEstoque($idCompraeEstoque)
    {
        $this->idCompraeEstoque = $idCompraeEstoque;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVlrTotalCompraEstoque()
    {
        return $this->vlrTotalCompraEstoque;
    }

    /**
     * @param mixed $vlrTotalCompraEstoque
     *
     * @return self
     */
    public function setVlrTotalCompraEstoque($vlrTotalCompraEstoque)
    {
        $this->vlrTotalCompraEstoque = $vlrTotalCompraEstoque;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtDataCompraEstoque()
    {
        return $this->dtDataCompraEstoque;
    }

    /**
     * @param mixed $dtDataCompraEstoque
     *
     * @return self
     */
    public function setDtDataCompraEstoque($dtDataCompraEstoque)
    {
        $this->dtDataCompraEstoque = $dtDataCompraEstoque;

        return $this;
    }
}