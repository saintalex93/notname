<?php 
session_start();
include_once "../dal/VendaDAL.php";
include_once "../model/Venda.php";

$venda = new Venda();

$idCli = $_POST['idCli'];

$venda->setIdCli($idCli);


$carrinho = VendaDAL::buscaVenda($venda);

$idVenda = $carrinho[0]->getIdVenda();
$referencia = $idVenda;
$venda->setIdVenda($idVenda);

if (!$carrinho) {
	echo "
	<script>
	window.location.href = 'index.php';
	</script>
	";
}

$tokenCard = $_POST['tokenCard'];
$hashCard = $_POST['hashCard'];
$quantidadeParcelas= $_POST['quantidadeParcelas'];
$valorParcelas= $_POST['valorParcelas'];
$frete= $_POST['frete'];

$nome=$_POST['nomePagSeguro'];
$cpf=$_POST['cpfPagSeguro'];
$email=$_POST['emailPagSeguro'];
$telefone=$_POST['celularPagSeguro'];
$nascimento=$_POST['nascimentoPagSeguro'];
$cep=$_POST['cepPagSeguro'];
$rua=$_POST['ruaPagSeguro'];
$numero=$_POST['numeroPagSeguro'];
$complemento=$_POST['complementoPagSeguro'];
$bairro=$_POST['bairroPagSeguro'];
$cidade=$_POST['cidadePagSeguro'];
$uf=$_POST['ufPagSeguro'];

$replace = array("(",")","-",".");
$cpf = str_replace($replace, "", $cpf);
$cep = str_replace($replace, "", $cep);
$cod_area = str_replace($replace, "", $telefone);
$cod_area=substr($cod_area, 0,2);
$telefone = str_replace($replace, "", $telefone);
$telefone=substr($telefone, 2,20);
$telefone = trim($telefone);

$nascimento = substr($nascimento, 8,2)."/".substr($nascimento,5,2)."/".substr($nascimento,0,4);



$emailPagseguro = "alexsantosinformatica@gmail.com";

$data['email'] = "alexsantosinformatica@gmail.com";
$data['token'] = '983AE2621B4D4E779029A7A38090AF0F'; //token sandbox ou produção


$data['paymentMode']='default';
$data['paymentMethod']='creditCard';
$data['receiverEmail']=$emailPagseguro;
$data['currency']='BRL';
$data['extraAmount']='0.00';

$cMod = 1;
foreach ($carrinho as $Minicar) {

	$idModelo = $Minicar->getModelo()[0]->getIdModelo();
	$nomeModelo = $Minicar->getModelo()[0]->getNomeModelo();
	$quantidade = $Minicar->getModelo()[0]->getQuantidadeVendaModelo();
	$valorModelo = $Minicar->getModelo()[0]->getVlrVendaModelo();
	$descontoModelo = $Minicar->getModelo()[0]->getDescontoModelo();
	$idModeloPGS = "V".$idVenda."MID".$idModelo;
	$valorTmodelo = $valorModelo-$descontoModelo;
	$valorTmodelo = number_format($valorTmodelo, 2, '.', '');

	$data["itemId{$cMod}"]="$idModeloPGS";
	$data["itemDescription{$cMod}"]="$nomeModelo";
	$data["itemAmount{$cMod}"]= $valorModelo;
	$data["itemQuantity{$cMod}"]="$quantidade";

	$cMod++;

}

$data['notificationURL']='https://sualoja.com.br/notifica.html';

$data['reference']=$referencia;
$data['senderName']=$nome;
$data['senderCPF']=$cpf;
$data['senderAreaCode']=$cod_area;
$data['senderPhone']=$telefone;
$data['senderEmail']='alex@sandbox.pagseguro.com.br';

$data['senderHash']=$hashCard;

$data['shippingAddressStreet']=$rua;
$data['shippingAddressNumber']=$numero;
$data['shippingAddressComplement']=$complemento;
$data['shippingAddressDistrict']=$bairro;
$data['shippingAddressPostalCode']=$cep;
$data['shippingAddressCity']=$cidade;
$data['shippingAddressState']=$uf;
$data['shippingAddressCountry']='BRA';
// FORMA DE ENVIO: 1 PAC - 2 SEDEX - 3 FORMA DESCONHECIDA
$data['shippingType']='1';
// CUSTO FRETE
$data['shippingCost']=$frete;

$data['creditCardToken']=$tokenCard;

$data['installmentQuantity']=$quantidadeParcelas;
$data['installmentValue']=$valorParcelas;
// Quantidade de parcelas sem Juros
$data['noInterestInstallmentQuantity']='2';

$data['creditCardHolderName']=$nome;
$data['creditCardHolderCPF']=$cpf;
$data['creditCardHolderBirthDate']=$nascimento;
$data['creditCardHolderAreaCode']=$cod_area;
$data['creditCardHolderPhone']=$telefone;
$data['billingAddressStreet']=$rua;
$data['billingAddressNumber']=$numero;
$data['billingAddressComplement']=$complemento;
$data['billingAddressDistrict']=$bairro;
$data['billingAddressPostalCode']=$cep;
$data['billingAddressCity']=$cidade;
$data['billingAddressState']=$uf;
$data['billingAddressCountry']='BRA';


$buildQuery = http_build_query($data);
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions'; //URL de teste

$curl = curl_init($url);
curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'));
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$buildQuery);

$retorno = curl_exec($curl);

curl_close($curl);

$xml= simplexml_load_string($retorno);


if($xml->code){
	echo $xml->code;
	$venda->setCodRastVenda($xml->code);
	$vendaDal = VendaDAL::atualizaVenda($venda, "Encerramento");
	
	unset($_SESSION['ID_VENDA']);
	unset($_SESSION['FRETE']);
	unset($_SESSION['TOTAL_VENDA']);
	
	return $xml->code;
}
else{
	return false;
}


// return $xml;

?>

<!-- A1FA223E-762F-4D84-A992-53565A150A27 -->