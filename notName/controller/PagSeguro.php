<?php

class PagSeguro{

public function iniciaPagamentoAction() { //gera o código de sessão obrigatório para gerar identificador (hash)

		//$id = (string) $this->params ()->fromRoute( 'confirma', null );

		$data['token'] = '983AE2621B4D4E779029A7A38090AF0F'; //token teste SANDBOX

				//$_SERVER['REMOTE_ADDR']
		$emailPagseguro = "alexsantosinformatica@gmail.com";

		$data = http_build_query($data);
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions';

		$curl = curl_init();

		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'
			);

		curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);
		$idSessao = $xml -> id;
		echo $idSessao;
		return $idSessao;
		exit;
		//return $codigoRedirecionamento;

	}

public function efetuaPagamentoCartao($dados) {


		$data['token'] = '983AE2621B4D4E779029A7A38090AF0F'; //token sandbox ou produção
		$data['paymentMode'] = 'default';
		$data['senderHash'] = $dados['hash']; //gerado via javascript
		$data['creditCardToken'] = $dados['creditCardToken']; //gerado via javascript
		$data['paymentMethod'] = 'creditCard';
		$data['receiverEmail'] = 'alexsantosinformatica@gmail.com';
		$data['senderName'] = $dados['Alex Santos']; //nome do usuário deve conter nome e sobrenome
		$data['senderAreaCode'] = $dados['senderAreaCode'];
		$data['senderPhone'] = $dados['senderPhone'];
		$data['senderEmail'] = $dados['senderEmail'];
		$data['senderCPF'] = $dados['senderCPF'];
		$data['installmentQuantity'] = '1';
		//$data['noInterestInstallmentQuantity'] = '1';
		$data['installmentValue'] = $dados['installmentValue']; //valor da parcela
		$data['creditCardHolderName'] = $dados['creditCardHolderName']; //nome do titular
		$data['creditCardHolderCPF'] = $dados['creditCardHolderCPF'];
		$data['creditCardHolderBirthDate'] = $dados['creditCardHolderBirthDate'];
		$data['creditCardHolderAreaCode'] = $dados['creditCardHolderAreaCode'];
		$data['creditCardHolderPhone'] = $dados['creditCardHolderPhone'];
		$data['billingAddressStreet'] = $dados['billingAddressStreet'];
		$data['billingAddressNumber'] = $dados['billingAddressNumber'];
		$data['billingAddressDistrict'] = $dados['billingAddressDistrict'];
		$data['billingAddressPostalCode'] = $dados['billingAddressPostalCode'];
		$data['billingAddressCity'] = $dados['billingAddressCity'];
		$data['billingAddressState'] = $dados['billingAddressState'];
		$data['billingAddressCountry'] = 'Brasil';
		$data['currency'] = 'BRL';
		$data['itemId1'] = '01';
		$data['itemDescription1'] = 'Descrição do item';
		$data['itemAmount1'] = $dados['itemAmount1'];
		$data['itemQuantity1'] = '1';
		$data['reference'] = $dados['reference']; //referencia qualquer do produto
		$data['shippingAddressRequired'] = 'true';

				//$_SERVER['REMOTE_ADDR']
		$emailPagseguro = "alexsantosinformatica@gmail.com";

		$data = http_build_query($data);
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions'; //URL de teste


		$curl = curl_init();

		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'
			);

		curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);


		//echo $xml -> paymentLink;
		$code =  $xml -> code;
		$date =  $xml -> date;
		
		//aqui eu ja trato o xml e pego o dado que eu quero, vc pode dar um var_dump no $xml e ver qual dado quer

		$retornoCartao = array(
				'code' => $code,
				'date' => $date
		);

		return $retornoCartao;

	}

	public function efetuaPagamentoBoleto($hash) {

		$dados = array();
		$dados['vlrFrete'] = '20.00';
		$dados['itemId1'] = '001';
		$dados['itemQuantity1'] = '1';
		$dados['itemDescription1'] = "Camiseta";
		$dados['reference'] = 'Teste';
		$dados['itemAmount1'] = '35.00';
		

		$data['hash'] = $hash;
		$data['token'] = '983AE2621B4D4E779029A7A38090AF0F'; //token sandbox test
		$data['receiverEmail'] = 'alexsantosinformatica@gmail.com';
		$data['paymentMode'] = 'default';
		$data['paymentMethod'] = 'boleto';
		$data['shippingAddressRequired'] = 'false';
		$data['currency'] = 'BRL';
		$data['extraAmount'] = '0.00';
		$data['senderName'] = 'Alex';
		$data['senderAreaCode'] = '11';
		$data['senderPhone'] = '966953835';
		$data['senderEmail'] = 'alexsantosinformatica@gmail.com';
		$data['senderCPF'] = '39930586822';
		$data['shippingCost'] = $dados['vlrFrete'];
		$data['itemId1'] = $dados['itemId1'];
		$data['itemQuantity1'] =$dados['itemQuantity1'];
		$data['itemDescription1'] = $dados['itemDescription1'];
		$data['reference'] = $dados['reference'];
		$data['itemAmount1'] = $dados['itemAmount1'];
		// if($dados['senderCNPJ'] != null){$data['senderCNPJ'] = $dados['senderCNPJ'];}


				//$_SERVER['REMOTE_ADDR']
		$emailPagseguro = "alexsantosinformatica@gmail.com";

		$data = http_build_query($data);
		$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions'; //URL de teste


		$curl = curl_init();

		$headers = array('Content-Type: application/x-www-form-urlencoded; charset=ISO-8859-1'
			);

		curl_setopt($curl, CURLOPT_URL, $url . "?email=" . $emailPagseguro);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt( $curl,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $curl,CURLOPT_RETURNTRANSFER, true );
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_HEADER, false);
		$xml = curl_exec($curl);

		curl_close($curl);

		$xml= simplexml_load_string($xml);


		//echo $xml -> paymentLink;
		$boletoLink =  $xml -> paymentLink;
		$code =  $xml -> code;
		$date =  $xml -> date;
		
		//aqui eu ja trato o xml e pego o dado que eu quero, vc pode dar um var_dump no $xml e ver qual dado quer

		$retornoBoleto = array(
				'paymentLink' => $boletoLink,
				'date' => $date,
				'code' => $code
		);
		echo "chegando";
		print_r($retornoBoleto);
		return $retornoBoleto;

	}
}


$pagSeguro = new PagSeguro();
$hash = $pagSeguro->iniciaPagamentoAction();
$boleto = $pagSeguro->efetuaPagamentoBoleto($hash);
echo "<pre>";
print_r($boleto);
echo "</pre>";
