<?php
// require_once '../library/config.php';

$data['token'] = '983AE2621B4D4E779029A7A38090AF0F'; //token teste SANDBOX

$emailPagseguro = "alexsantosinformatica@gmail.com";

$data = http_build_query($data);
$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions';

$curl = curl_init();

$headers = array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'
);

curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_HEADER, false);
$xml = curl_exec($curl);
curl_close($curl);

$xml= simplexml_load_string($xml);
$idSessao = $xml -> id;
echo $idSessao;
return $idSessao;
