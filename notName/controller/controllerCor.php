<?php
require_once __DIR__ . '/../dal/CorDAL.php';

$hexa = $_POST['txtCor'];

$nomeCor = $_POST['txtDescCor'];

if ($_GET['action'] == 'insere') {
    $cor = new Cor();
    
    $cor->setHexCor($hexa);
    $cor->setDescCor($nomeCor);
    
    $insere = CorDAL::insereCor($cor);
    
    if ($insere == true) {
        
        echo "Inserido com sucesso";
    } else {
        echo "Não foi possivel inserir";
    }
} else if ($_GET['action'] == 'altera') {
    
    $cor = new Cor();
    
    $cor->setHexCor($hexa);
    $cor->setDescCor($nomeCor);
    $cor->setIdCor($_POST['idCor']);
    
    $altera = CorDAL::alteraCor($cor);
    
    if ($altera == true) {
        
        echo 'Alterado com sucesso';
    } else {
        echo 'Não foi possivel alterar';
    }
} else {
    
    echo 'algo deu muito errado';
}