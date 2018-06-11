<?php
require_once __DIR__ . '/../dal/UsuarioSysDAL.php';

$statusUsr = $_POST['statusUsuario'];

$nomeUsr = $_POST['txtNomeUsr'];

$emailUsr = $_POST['txtEmail'];

$loginUsr = $_POST['txtLogin'];

$senhaUsr = $_POST['txtSenhaUsr'];

$permissaoUsr = $_POST['permissao'];

$usr = new UsuarioSys();

$usr->setNomeUsr($nomeUsr);
$usr->setEmail($emailUsr);
$usr->setLoginUsr($loginUsr);
$usr->setSenhaUsr($senhaUsr);
$usr->setPermissionUsr($permissaoUsr);
$usr->setStatusUsr($statusUsr);

$insere = UsuarioSysDAL::insereUsuario($usr);

if($insere){
    
    echo json_encode('Inserido com sucesso');
}
else
{
    echo json_encode('Erro ao cadastrar');
}