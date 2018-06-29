<?php 
include_once '../dal/PainelDAL.php';

$email = $_GET['email'];


if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

	if(PainelDAL::insereEmail($email)){
		echo "Cadastrado";
	}

	else{
		echo "Email já existente";
	}
} else {
	echo "Email Incorreto";
}

?>