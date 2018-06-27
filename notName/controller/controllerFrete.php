<?php
session_start();
require_once './../library/Conexao.class.php';
require_once '../dal/ClienteDAL.php';
require_once '../dal/VendaDAL.php';

require_once '../model/Venda.php';
require_once '../model/Cliente.php';

$venda = new Venda();
$venda->setIdVenda($_REQUEST['vendaId']);
$venda->setFrete($_REQUEST['frete']);
$venda->setVlrFrete($_REQUEST['valor']);

if(VendaDAL::atualizaVenda($venda, "Entrega")){
    echo "Done";
    $_SESSION['FRETE'] = $_REQUEST['valor'];
}
else{
    echo "Fock";
}

?>