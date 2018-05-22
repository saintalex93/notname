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
}
else if(isset($_POST['logaCli']))
{
    echo "<script>alert('caiu certo');</script>";
    
}else{

    echo "Erro";
}

