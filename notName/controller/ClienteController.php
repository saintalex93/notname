<?php
session_start();
require_once '../dal/ClienteDAL.php';

$nomeCli = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['email'];
$senha = $_POST['senha'];
$statusCli = 0;

$cliente = new Cliente();

$cliente->setNomeCli($nomeCli);
$cliente->setEmailCli($email);
$cliente->setLoginCli($login);
$cliente->setSenhaCli($senha);
$cliente->setStatusCli($statusCli);

$cadastroCli = ClienteDAL::insereCliente($cliente);

if($cadastroCli)
{
    echo "funfou";
}else
{
    echo "não funfou";
}
