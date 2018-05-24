<?php
require_once __DIR__ . '/../dal/ClienteDAL.php';

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
    
    echo $login[0]->getIdCli(); 
    
    var_dump($login);
    
    session_start();
    
    $_SESSION['USERCOM']['ID'] = $login[0]->getIdCli();
    $_SESSION['USERCOM']['NOME'] = $login[0]->getNomeCli();
   
    
} else {
    
    echo json_encode("Erro", JSON_UNESCAPED_UNICODE);
}

