<?php

class Tamanho {
    
    private $idTamanho;
    private $siglaTamanho;
    private $descTamanho;
    
    
    public function getIdTamanho()
    {
        return $this->idTamanho;
    }

    public function getSiglaTamanho()
    {
        return $this->siglaTamanho;
    }

    public function getDescTamanho()
    {
        return $this->descTamanho;
    }

    public function setIdTamanho($idTamanho)
    {
        $this->idTamanho = $idTamanho;
    }

    public function setSiglaTamanho($siglaTamanho)
    {
        $this->siglaTamanho = $siglaTamanho;
    }

    public function setDescTamanho($descTamanho)
    {
        $this->descTamanho = $descTamanho;
    }

    
    
}