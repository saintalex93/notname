<?php

class Endereco
{

    private $id;

    private $cep;

    private $logradouro;

    private $cidade;

    private $numero;

    private $complemento;

    private $bairro;

    private $tipo;

    private $ufId;

    private $uf;

    public function getId()
    {
        return $this->id;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getUF()
    {
        return $this->uf;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function setUFid($ufid)
    {
        $this->ufId = $ufid;
    }
    public function setUF($uf)
    {
        $this->uf = $uf;
    }
    
}
