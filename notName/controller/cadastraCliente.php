<?php
require_once __DIR__ . '/../dal/ClienteDAL.php';

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


