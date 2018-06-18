<?php

require_once ('../library/PHPMailer/class.phpmailer.php');

// include("../library/PHPMailer/class.phpmailer.php");

$mail = new PHPMailer(true);

$mail->IsSMTP(); // Define que a mensagem será SMTP

$mail->CharSet = 'UTF-8';

try {
     $mail->Host = 'br122.hostgator.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
	 $mail->SMTPSecure = "ssl"; // Usar conexão criptografia
     $mail->Port       = 465; //  Usar 587 porta SMTP
     $mail->Username = 'site@notname.com.br'; // Usuário do servidor SMTP (endereço de email)
     $mail->Password = 'g4bri3labr4nsf0rd'; // Senha do servidor SMTP (senha do email usado)

     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('site@notname.com.br', 'Not Name'); //Seu e-mail
     $mail->AddReplyTo('site@notname.com.br', 'Not Name'); //Seu e-mail
     $mail->Subject = 'Formulario de Contato';//Assunto do e-mail


     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('alexsantosinformatica@gmail.com', 'Formulario de Contato');

     // $mail->AddBCC("alexsantosinformatica@gmail.com","Formulario de Contato"); // Envia Cópia Oculta


     //Define o corpo do email
     $mail->MsgHTML('
     	<h2>Contato enviado pelo site.<h2> <br>

     	Nome: '.$_POST["primeiroNome"].'<br />
     	Celular: '.$_POST["celular"].'<br />
     	E-mail: '.$_POST["email"].'<br />
     	Assunto: '.$_POST["assunto"].'<br />
     	Mensagem: '.$_POST["mensagem"].'<br />

     	'); 

     $mail->Send();
     $result = array('status'=>2, 'mensagem' => 'Formulário enviado com sucesso.');
     echo json_encode($result);

    //caso apresente algum erro é apresentado abaixo com essa exceção.
 }catch (phpmailerException $e) {
 	$result = array('status'=>1, 'mensagem' => 'Não foi possível enviar o formulário. '.$e);
 	echo json_encode($result);
 }