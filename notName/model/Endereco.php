<?php
class Endereco{
	private $id;
	private $cep;
	private $logradouro;
	private $cidade;
	private $numero;
	private $complemento;
	private $tipo;

	private $ufId;
	private $uf;

	public function getId(){
		return $this->id;
	}
	public function getCep(){
	    return $this->cep;
	}
	public function getLogradouro(){
	    return $this->logradouro;	    
	}
	public function getCidade(){
	    return $this->cidade;
	}
	public function getNumero(){
	    return $this->numero;
	}
	public function getComplemento(){
	    return $this->complemento;
	}
	public function getTipo(){
	    return $this->tipo;
	}
	public function getUF(){
	    return $this->uf;
	}



	function __construct($id, $cep, $logradouro, $cidade, $numero, $complemento="", $tipo,$ufId){
		$this->id = $id;
		$this->cep = $cep;
		$this->logradouro = $logradouro;
		$this->cidade = $cidade;
		$this->numero = $numero;
		$this->complemento = $complemento;
		$this->tipo = $tipo;
		$this->ufId = $ufId;


	}


}
