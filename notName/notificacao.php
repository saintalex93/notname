<?php 
header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");


if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
    //Todo resto do código iremos inserir aqui.
	$conecta = mysqli_connect('127.0.0.1', 'notnamec_usr', 'hds24@carol', 'notnamec_db');
	mysqli_set_charset($conecta, "utf8");


	$email = 'alexsantosinformatica@gmail.com';
	$token = '983AE2621B4D4E779029A7A38090AF0F';

	$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/' . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$transaction= curl_exec($curl);
	curl_close($curl);

	if($transaction == 'Unauthorized'){
        //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção

        exit;//Mantenha essa linha
    }
    $transaction = simplexml_load_string($transaction);

    $reference = $transaction->reference;
    $status = $transaction->status;


    // https://www.notname.com.br/notificacao.php
    $cStatus = "";
    switch ($status) {
    	case 1:
    	$cStatus = "AGUARDANDO PAGAMENTO";
    	break;
    	case 2:
    	$cStatus = "EM ANÁLISE";
    	break;
    	case 3:
    	$cStatus = "PAGA";
    	break;
    	case 4:
    	$cStatus = "DISPONÍVEL";
    	break;
    	case 5:
    	$cStatus = "EM DISPUTA";
    	break;
    	case 6:
    	$cStatus = "DEVOLVIDA";
    	break;
    	case 7:
    	$cStatus = "CANCELADA";
    	break;
    	
    }

    // $statusV = $statusCode[$status];


    $sql = "UPDATE VENDA SET VENDA_cSTATUS = '$cStatus' where VENDA_nID = $reference";
    echo $sql;
    mysqli_query($conecta, $sql);
}

// http://localhost/notname/notName/notificacao.php

?>

