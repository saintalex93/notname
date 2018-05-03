<?php
class Produto{
	private $idProd;
	private $descProd;
	private $descCompletaProd;
	private $statusProd;
	private $idMarca;
	private $idModelo;
    private $idCateg;


    /**
     * @return mixed
     */
    public function getIdProd()
    {
        return $this->idProd;
    }

    /**
     * @param mixed $idProd
     *
     * @return self
     */
    public function setIdProd($idProd)
    {
        $this->idProd = $idProd;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescProd()
    {
        return $this->descProd;
    }

    /**
     * @param mixed $descProd
     *
     * @return self
     */
    public function setDescProd($descProd)
    {
        $this->descProd = $descProd;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescCompletaProd()
    {
        return $this->descCompletaProd;
    }

    /**
     * @param mixed $descCompletaProd
     *
     * @return self
     */
    public function setDescCompletaProd($descCompletaProd)
    {
        $this->descCompletaProd = $descCompletaProd;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusProd()
    {
        return $this->statusProd;
    }

    /**
     * @param mixed $statusProd
     *
     * @return self
     */
    public function setStatusProd($statusProd)
    {
        $this->statusProd = $statusProd;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdMarca()
    {
        return $this->idMarca;
    }

    /**
     * @param mixed $idMarca
     *
     * @return self
     */
    public function setIdMarca($idMarca)
    {
        $this->idMarca = $idMarca;

        return $this;
    }

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
    public function getIdCateg()
    {
        return $this->idCateg;
    }

    /**
     * @param mixed $idCateg
     *
     * @return self
     */
    public function setIdCateg($idCateg)
    {
        $this->idCateg = $idCateg;

        return $this;
    }
}