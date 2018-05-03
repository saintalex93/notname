<?php 

class Categoria{

	private $idCateg;
	private $descCateg;


    public function getIdCateg()
    {
        return $this->idCateg;
    }


    public function setIdCateg($idCateg)
    {
        $this->idCateg = $idCateg;

    }


    public function getDescCateg()
    {
        return $this->descCateg;
    }


    public function setDescCateg($descCateg)
    {
        $this->descCateg = $descCateg;

    }
}