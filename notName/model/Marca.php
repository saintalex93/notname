<?php 

class Marca{

	private $idMarca;
	private $descMarca;
	private $statusMarca;
	


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
    public function getDescMarca()
    {
        return $this->descMarca;
    }

    /**
     * @param mixed $descMarca
     *
     * @return self
     */
    public function setDescMarca($descMarca)
    {
        $this->descMarca = $descMarca;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatusMarca()
    {
        return $this->statusMarca;
    }

    /**
     * @param mixed $statusMarca
     *
     * @return self
     */
    public function setStatusMarca($statusMarca)
    {
        $this->statusMarca = $statusMarca;

        return $this;
    }
}