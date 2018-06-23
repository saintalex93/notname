<?php 
session_start();

require_once './../library/Conexao.class.php';
require_once __DIR__ . '/../dal/VendaDAL.php';
require_once __DIR__ . '/../dal/ModeloDAL.php';

require_once __DIR__ . '/../model/Venda.php';
require_once __DIR__ . '/../model/Modelo.php';



$idModelo = $_REQUEST['md'];

if (isset($_SESSION['USERCOM']['ID'])) {
	$ID_USR = $_SESSION['USERCOM']['ID'];

	$venda = new Venda();

	$venda->setIdCli($ID_USR);

	$idVenda = VendaDAL::recuperaVendaAberta($venda);

	if($idVenda){
		$idVenda = $idVenda[0]['VENDA_nID'];

	}
	else{
		$idVenda = 0;
	}

	echo $idVenda;
	if (isset($_SESSION['USERCOM']['ID'])) {


		if ($idVenda == 0) {

			$idVenda = VendaDAL::abreVenda($venda);

			//  $idVenda;
			echo "Abriu Venda";
			

		} else {

			// $idVenda;
			echo "Venda ABERTA";
			echo vendaModelo($idVenda, $idModelo);
		}

	}
} else {
	echo "Login";
}



function vendaModelo($idVenda, $idModelo){

	$modelo = new Modelo();
	$venda = new Venda();

	$modelo->setIdModelo($idModelo);
	$venda->setIdVenda($idVenda);

	$modelo = ModeloDAL::buscaModelo($modelo->getIdModelo());

	// $venda = VendaDAL::insereModeloVenda();

	var_dump($modelo);
}



?>