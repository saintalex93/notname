<?php 
session_start();

require_once './../library/Conexao.class.php';
require_once __DIR__ . '/../dal/VendaDAL.php';
require_once __DIR__ . '/../dal/ModeloDAL.php';



$ID_USR = $_SESSION['USERCOM']['ID'];

$venda = new Venda();

$venda->setIdCli($ID_USR);

$idVenda = VendaDAL::recuperaVendaAberta($venda);

$idVenda = $idVenda[0]['VENDA_nID'];

if(!isset($_SESSION['USERCOM']['ID'])){


	if($idVenda == 0 || empty($id)){

		$idVenda = VendaDAL::abreVenda($venda);

		$_SESSION['USERCOM']['ID'] = $idVenda;

	}
	else{

		echo "Venda já aberta";

		echo $_SESSION['USERCOM']['ID'] = $idVenda;

	}

}

else{
	echo "Venda Setada";
}



?>