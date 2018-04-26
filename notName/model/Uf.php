<?
class Uf{

	private int $id;
	private string $sigla;
	private string $descricao;


	public function set_id($uf_id){
		$this->id = $id;
	}

	public function set_sigla($uf_sigla){
		$this->sigla = $sigla;
	}

	public function set_descricao($uf_descrica){
		$this->descricao = $descricao;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_sigla(){
		return $this->sigla;
	}

	public function get_descricao(){
		return $this->descricao;
	}


	// function __construct($id, $sigla, $descricao){
	// 	$this->uf_id = $id;
	// 	$this->uf_sigla = $sigla;
	// 	$this->uf_descricao = $descricao;

	// }

}


