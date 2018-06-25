<?php
require_once './../library/Conexao.class.php';
require_once __DIR__ . '/../dal/VendaDAL.php';
require_once __DIR__ . '/../model/Venda.php';
require_once __DIR__ . '/../model/Modelo.php';


if($_REQUEST['ACTION'] == "EXCLUDE"){

$valores = explode(",", $_REQUEST['m_v_vm']);
$idModelo = $valores[0];
$idVenda = $valores[1];
$idVendaModelo = $valores[2];

$venda = new Venda();
$modelo = new Modelo();
$modelo->setIdModelo($idModelo);
$venda->setIdVenda($idVenda);
$venda->setIdVendaModelo($idVendaModelo);
$venda->setModelo($modelo);

echo VendaDAL::apagaModeloVenda($venda);

}
else{


    $valores = explode(",", $_REQUEST['m_v_vl']);
    $idModelo = $valores[0];
    $idVenda = $valores[1];
    $valorModelo = $valores[2];



    $venda = new Venda();
    $modelo = new Modelo();
    $modelo->setIdModelo($idModelo);
    $modelo->setQuantidadeVendaModelo(1);
    $modelo->setVlrVendaModelo($valorModelo);
    $venda->setIdVenda($idVenda);
    // $venda->setModelo($modelo);

    $resultado =  VendaDAL::insereModeloVenda($venda, $modelo);

    echo $resultado[0][0];
}

?>