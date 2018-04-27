<?php 

class Categoria{

	private $idCateg;
	private $descCateg;

	

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

    /**
     * @return mixed
     */
    public function getDescCateg()
    {
        return $this->descCateg;
    }

    /**
     * @param mixed $descCateg
     *
     * @return self
     */
    public function setDescCateg($descCateg)
    {
        $this->descCateg = $descCateg;

        return $this;
    }
}