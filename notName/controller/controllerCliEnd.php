<?php
require_once './../library/Conexao.class.php';
require_once '../dal/ClienteDAL.php';
require_once '../dal/EnderecoDAL.php';

require_once '../model/Endereco.php';
require_once '../model/Cliente.php';

$cliente = new Cliente();

$cliente->setIdCli($_REQUEST['idCli']);
$cliente->setNomeCli($_REQUEST['nomeCli']);
$cliente->setCpfCli($_REQUEST['cpfCli']);
$cliente->setRgCli($_REQUEST['rgCli']);
$cliente->setNascCli($_REQUEST['nasCli']);
$cliente->setGeneroCli($_REQUEST['generoCli']);
$cliente->setTelResiCli($_REQUEST['telCli']);
$cliente->setTelCelCli($_REQUEST['celCli']);
$cliente->setEmailCli($_REQUEST['emailCli']);

ClienteDAL::atualizaCliente($cliente);

$endereco = new Endereco();
$endereco->setIdCli($_REQUEST['idCli']);
$endereco->setId($_REQUEST['idEnd']);
$endereco->setCep($_REQUEST['cepEnd']);
$endereco->setLogradouro($_REQUEST['endEnd']);
$endereco->setCidade($_REQUEST['cidadeEnd']);
$endereco->setBairro($_REQUEST['bairroEnd']);
$endereco->setNumero($_REQUEST['nEnd']);
$endereco->setComplemento($_REQUEST['compEnd']);
$endereco->setTipo($_REQUEST['tipoEnd']);
$endereco->setUF($_REQUEST['ufEnd']);

if ($_REQUEST['idEnd'] == 0) {
    EnderecoDAL::insereEndereco($endereco);
} else {
    EnderecoDAL::atualizaEndereco($endereco);
}

// print_r($endereco);
