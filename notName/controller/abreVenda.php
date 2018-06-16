<?php 
session_start();
require_once './../library/Conexao.class.php';
require_once __DIR__ . '/../dal/VendaDAL.php';

$ID_USR = $_SESSION['USERCOM']['ID'];

$sql = "SELECT VENDA_nID FROM VENDA WHERE VANDA_cSTATUS LIKE 'PENDENTE' AND CLI_nCOD = $ID_USR";

$db = new Database();

$idVenda = $db->sqlNoTransact($sql);

print_r($idVenda);

$id = $db->returnID();

if($id != 0 || empty($id)){
$venda = new Venda();

$venda->setIdCli($ID_USR);
$venda->setVlrTotalVenda(0.00);
$venda->setCodRastVenda('xxx');
$venda->setStatusVenda('PENDENTE');

$idVenda = VendaDAL::abreVenda($venda);

var_dump($idVenda);
}
else{
// Utilizar a venda do id;

	echo "Venda já aberta";


}

echo "ID: ".$id;

?>