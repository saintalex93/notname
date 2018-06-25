<?php
require_once __DIR__ . '/../dal/ClienteDAL.php';
require_once __DIR__ . '/../dal/VendaDAL.php';
require_once __DIR__ . '/../model/Venda.php';



if (isset($_POST['insereCli'])) {
    $cliente = new Cliente();
    
    $cliente->setNomeCli($_POST['nome']);
    $cliente->setEmailCli($_POST['email']);
    $cliente->setSenhaCli($_POST['password']);
    $cliente->setStatusCli("Ativo");
    
    $cadastroCli = ClienteDAL::insereCliente($cliente);
    
    if ($cadastroCli) {
        echo "Cadastrado";
    } else {
        echo "Erro";
    }
} else if (isset($_REQUEST['logaCli'])) {
    $cliente = new Cliente();
    
    $cliente->setEmailCli($_REQUEST['emailLog']);
    $cliente->setSenhaCli($_REQUEST['senha']);    
    
    $login = ClienteDAL::loginCliente($cliente);    
    
    echo "Logado";
   
    
    session_start();
    
    $_SESSION['USERCOM']['ID'] = $login[0]->getIdCli();
    $_SESSION['USERCOM']['NOME'] = $login[0]->getNomeCli();

    $venda = new Venda();

    $venda->setIdCli($_SESSION['USERCOM']['ID']);

    $idVenda = VendaDAL::recuperaVendaAberta($venda);

    if($idVenda){
        $_SESSION['ID_VENDA']  = $idVenda[0]->getIdVenda();
    }
    
} else {
    
    echo json_encode("Erro", JSON_UNESCAPED_UNICODE);
}

