<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/notname/notName/url.php';
require_once $raiz.'dal/MarcaDAL.php';
require_once $raiz.'dal/CategoriaDAL.php';



if($_REQUEST['action'] == 'insereCategoria'){

	$categoria = new Categoria();
	
	$categoria->setDescCateg($_REQUEST['txtCategoria']);
	$categoria->setStatusCateg($_REQUEST['statusCategoria']);
	
	if($categoriaDal = CategoriaDAL::insereCategoria($categoria)){
		echo "Inserido";
	}

	else{
		echo "Não foi possível inserir";
	}
	

}


else if($_REQUEST['action'] == 'insereMarca'){

	$marca = new Marca();
	
	$marca->setDescMarca($_REQUEST['txtMarca']);
	$marca->setStatusMarca($_REQUEST['statusMarca']);
	
	if($marcaDal = MarcaDAL::insereMarca($marca)){
		echo "Inserido";
	}

	else{
		echo "Não foi possível inserir";
	}
	

}


?>