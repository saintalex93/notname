<?php 
$tokenCard = $_POST['tokenCard'];
$hashCard = $_POST['hashCard'];
$quantidadeParcelas= $_POST['quantidadeParcelas'];
$valorParcelas= $_POST['valorParcelas'];

$emailPagseguro = "alexsantosinformatica@gmail.com";

$data['email'] = "alexsantosinformatica@gmail.com";
$data['token'] = '983AE2621B4D4E779029A7A38090AF0F'; //token sandbox ou produção


$data['paymentMode']='default';
$data['paymentMethod']='creditCard';
$data['receiverEmail']=$emailPagseguro;
$data['currency']='BRL';
$data['extraAmount']='0.00';

$data['itemId1']='0001';
$data['itemDescription1']='Notebook Prata';
$data['itemAmount1']= '500.00';
$data['itemQuantity1']='1';

$data['notificationURL']='https://sualoja.com.br/notifica.html';

$data['reference']='REF1234';
$data['senderName']='Jose Comprador';
$data['senderCPF']='22111944785';
$data['senderAreaCode']='11';
$data['senderPhone']='56273440';
$data['senderEmail']='alex@sandbox.pagseguro.com.br';

$data['senderHash']=$hashCard;

$data['shippingAddressStreet']='Av. Brig. Faria Lima';
$data['shippingAddressNumber']='1384';
$data['shippingAddressComplement']='5o andar';
$data['shippingAddressDistrict']='Jardim Paulistano';
$data['shippingAddressPostalCode']='01452002';
$data['shippingAddressCity']='Sao Paulo';
$data['shippingAddressState']='SP';
$data['shippingAddressCountry']='BRA';
// FORMA DE ENVIO: 1 PAC - 2 SEDEX - 3 FORMA DESCONHECIDA
$data['shippingType']='1';
// CUSTO FRETE
$data['shippingCost']='0.00';

$data['creditCardToken']=$tokenCard;

$data['installmentQuantity']=$quantidadeParcelas;
$data['installmentValue']=$valorParcelas;
// Quantidade de parcelas sem Juros
$data['noInterestInstallmentQuantity']='2';

$data['creditCardHolderName']='Jose Comprador';
$data['creditCardHolderCPF']='22111944785';
$data['creditCardHolderBirthDate']='27/10/1987';
$data['creditCardHolderAreaCode']='11';
$data['creditCardHolderPhone']='56273440';
$data['billingAddressStreet']='Av. Brig. Faria Lima';
$data['billingAddressNumber']='1384';
$data['billingAddressComplement']='5o andar';
$data['billingAddressDistrict']='Jardim Paulistano';
$data['billingAddressPostalCode']='01452002';
$data['billingAddressCity']='Sao Paulo';
$data['billingAddressState']='SP';
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


var_dump($xml);
return $xml;

?>