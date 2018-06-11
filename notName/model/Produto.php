<?php

class Produto
{

    private $idProd;

    private $descProd;

    private $descCompletaProd;

    private $statusProd;

    private $idCateg;

    private $descCateg;
    
    private $modelo = array();
    
    private $material;

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo[] = $modelo;
    }

    public function getIdProd()
    {
        return $this->idProd;
    }

    public function setIdProd($idProd)
    {
        $this->idProd = $idProd;
    }

    public function getDescProd()
    {
        return $this->descProd;
    }

    public function setDescProd($descProd)
    {
        $this->descProd = $descProd;
    }

    public function getDescCompletaProd()
    {
        return $this->descCompletaProd;
    }

    public function setDescCompletaProd($descCompletaProd)
    {
        $this->descCompletaProd = $descCompletaProd;
    }

    public function getStatusProd()
    {
        return $this->statusProd;
    }

    public function setStatusProd($statusProd)
    {
        $this->statusProd = $statusProd;
    }

    public function getIdModelo()
    {
        return $this->idModelo;
    }

    public function setIdModelo($idModelo)
    {
        $this->idModelo = $idModelo;
    }

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
    public function getMaterial()
    {
        return $this->material;
    }
    
    public function setMaterial($material)
    {
        $this->material = $material;
    }
}