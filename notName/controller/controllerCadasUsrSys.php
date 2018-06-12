<?php
require_once __DIR__ . '/../dal/UsuarioSysDAL.php';

$statusUsr = $_POST['statusUsuario'];

$nomeUsr = $_POST['txtNomeUsr'];

$emailUsr = $_POST['txtEmail'];

$loginUsr = $_POST['txtLogin'];

$senhaUsr = $_POST['txtSenhaUsr'];

$permissaoUsr = $_POST['permissao'];


if ($_GET['action'] == 'insere') {
    
    $usr = new UsuarioSys();
    
    $usr->setNomeUsr($nomeUsr);
    $usr->setEmail($emailUsr);
    $usr->setLoginUsr($loginUsr);
    $usr->setSenhaUsr($senhaUsr);
    $usr->setPermissionUsr($permissaoUsr);
    $usr->setStatusUsr($statusUsr);
    
    $insere = UsuarioSysDAL::insereUsuario($usr);
    
    if ($insere) {
        
        echo 'Inserido com sucesso';
    } else {
        echo 'Erro ao cadastrar';
    }
} else if ($_GET['action'] == 'altera') {
    $usr = new UsuarioSys();
    
    $usr->setNomeUsr($nomeUsr);
    $usr->setEmail($emailUsr);
    $usr->setLoginUsr($loginUsr);
    $usr->setSenhaUsr($senhaUsr);
    $usr->setPermissionUsr($permissaoUsr);
       
    $usr->setIdUsr($_POST['idUsr']);
    
    $altera = UsuarioSysDAL::alteraUsuarioSys($usr);
    
    
    if($altera == true){
    echo 'Alterado com sucesso';
    }
    else{
    echo 'Nao foi possivel alterar';
    }
} else {
    echo 'Erro na execu��o';
}