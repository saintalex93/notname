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

	public function getId(){
		return $this->id;
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
