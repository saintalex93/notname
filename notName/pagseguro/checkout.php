<?php
header("access-control-allow-origin: https://pagseguro.uol.com.br");
header("Content-Type: text/html; charset=UTF-8",true);
date_default_timezone_set('America/Sao_Paulo');

require_once("PagSeguro.class.php");
$PagSeguro = new PagSeguro();
	
//EFETUAR PAGAMENTO	
$venda = array("codigo"=>"1",
			   "valor"=>100.00,
			   "descricao"=>"Teste Notname",
			   "nome"=>"Alex Santos",
			   "email"=> "alex@sandbox.pagseguro.com.br",
			   "telefone"=>"(11) 96695-3835",
			   "rua"=>"Condessa Amália Matarazzo",
			   "numero"=>"1232",
			   "bairro"=>"Jd Peri",
			   "cidade"=>"São Paulo",
			   "estado"=>"SP", //2 LETRAS MAIÚSCULAS
			   "cep"=>"02.652-000",
			   "codigo_pagseguro"=>"");
			   
// $PagSeguro->executeCheckout($venda,"http://SEUSITE/pedido/".$_GET['codigo']);
$PagSeguro->executeCheckout($venda,"localhost/notname/notName/index.php");


//----------------------------------------------------------------------------


//RECEBER RETORNO
if( isset($_GET['transaction_id']) ){
	$pagamento = $PagSeguro->getStatusByReference($_GET['codigo']);
	
	$pagamento->codigo_pagseguro = $_GET['transaction_id'];
	if($pagamento->status==3 || $pagamento->status==4){
		//ATUALIZAR DADOS DA VENDA, COMO DATA DO PAGAMENTO E STATUS DO PAGAMENTO
		
	}else{
		//ATUALIZAR NA BASE DE DADOS
	}
}

?>