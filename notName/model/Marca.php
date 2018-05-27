<?php 

class Marca{

	private $idMarca;
	private $descMarca;
	private $statusMarca;
	



    public function getIdMarca()
    {
        return $this->idMarca;
    }


    public function setIdMarca($idMarca)
    {
        $this->idMarca = $idMarca;

    }


    public function getDescMarca()
    {
        return $this->descMarca;
    }


    public function setDescMarca($descMarca)
    {
        $this->descMarca = $descMarca;

    }


    public function getStatusMarca()
    {
        return $this->statusMarca;
    }


    public function setStatusMarca($statusMarca)
    {
        $this->statusMarca = $statusMarca;

    }
}