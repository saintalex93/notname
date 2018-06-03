<?php

class Categoria {

    private $idCateg;
    private $descCateg;
    private $statusCateg;
    private $codPai;

    public function getIdCateg() {
        return $this->idCateg;
    }

    public function setIdCateg($idCateg) {
        $this->idCateg = $idCateg;
    }

    public function getDescCateg() {
        return $this->descCateg;
    }

    public function setDescCateg($descCateg) {
        $this->descCateg = $descCateg;
    }

    public function getStatusCateg() {
        return $this->statusCateg;
    }

    public function setStatusCateg($statusCateg) {
        $this->statusCateg = $statusCateg;
    }
    
    public function getCodPai(){
        
        return $this->codPai;
    }
    
    public function setCodPai($codpai){
        $this->codPai = $codpai;
    }

}
