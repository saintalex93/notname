<?php
require_once __DIR__ . "/../dal/ClienteDAL.php";
require_once __DIR__ . "/../dal/EnderecoDAL.php";

if($_REQUEST['action'] == 'alteraDadoscli'){

    $id = $_POST['txtIdCli'];
    $nome = $_POST['txtNomeCli'];
    $rg = $_POST['txtRgCli'];
    $cpf = $_POST['cpf'];
    $genero = $_POST['cmbGen'];
    $nasc = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $comercial = $_POST['comercial'];
    $email = $_POST['email'];

    $cliente = new Cliente();

    $cliente->setIdCli($id);
    $cliente->setNomeCli($nome);
    $cliente->setRgCli($rg);
    $cliente->setCpfCli($cpf);
    $cliente->setGeneroCli($genero);
    $cliente->setNascCli($nasc);
    $cliente->setTelResiCli($telefone);
    $cliente->setTelCelCli($celular);
    $cliente->setTelComCli($comercial);
    $cliente->setEmailCli($email);
    

    if(ClienteDAL::atualizaCliente($cliente)){
        echo "Alterado";
    }
    else {
        echo "Não foi alterado";
    }
}
elseif ($_REQUEST['action'] == 'alteraEndcli') {


}
elseif ($_REQUEST['action'] == 'alteraSenhacli') {

    $senha = $_POST['senhaNova'];

    $id = $_POST['txtIdCliSenha'];

    $cliente = new Cliente();

    $cliente->setIdCli($id);
    $cliente->setSenhaCli($senha);

    if (ClienteDAL::atualizaSenha($cliente)) {
        echo "Alterado";
    } else {
        echo "Não foi alterado";
    }


}

?>