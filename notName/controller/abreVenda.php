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

	$obVenda = VendaDAL::recuperaVendaAberta($venda);

	if ($obVenda) {
		$idVenda = $obVenda[0]->getIdVenda();;
	} else {

		$idVenda = 0;
	}

	if (isset($_SESSION['USERCOM']['ID'])) {

		if ($idVenda == 0) {

			$idVenda = VendaDAL::abreVenda($venda);

			//  $idVenda;
			 vendaModelo($idVenda, $idModelo);


		} else {

			// $idVenda;
			 vendaModelo($idVenda, $idModelo);
		}

	}
} else {
	echo "Login";
}

function vendaModelo($idVenda, $idModelo)
{
	$_SESSION['ID_VENDA'] = $idVenda;
	$modelo = new Modelo();
	$venda = new Venda();

	$modelo->setIdModelo($idModelo);
	$venda->setIdVenda($idVenda);
	$venda->setIdCli($_SESSION['USERCOM']['ID']);

	$vendaModelo = VendaDAL::recuperaVendaAberta($venda);

	$modeloVenda = ModeloDAL::buscaModelo($idModelo);

	$modeloVenda[0]->setQuantidadeVendaModelo(1);

	$vendaModelo = VendaDAL::insereModeloVenda($vendaModelo[0], $modeloVenda[0]);

	echo $vendaModelo[0]['COUNT_MODELOS'];
	// var_dump(VendaDAL::recuperaVendaAberta($venda));

	// var_dump($vendaModelo);

	// var_dump($modeloVenda);

}




?>