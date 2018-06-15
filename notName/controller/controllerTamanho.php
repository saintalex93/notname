<?php
require_once __DIR__ . '/../dal/TamanhoDAL.php';

$descTamanho = $_POST['txtTamanho'];

$dimensoesTamanho = $_POST['txtMedida'];

if ($_GET['action'] == 'insere') {
    
    $tamanho = new Tamanho();
    
    $tamanho->setDescTamanho("Medidas: " . $dimensoesTamanho);
    $tamanho->setSiglaTamanho($descTamanho);
    
    $insere = TamanhoDAL::insereTamanho($tamanho);
    
    if ($insere == true) {
        
        echo 'Inserido com sucesso';
    } else {
        echo 'Não foi possivel inserir';
    }
}
else if ($_GET['action'] == 'altera') {
   
    $tamanho = new Tamanho();
    
    $tamanho->setDescTamanho($dimensoesTamanho);
    $tamanho->setSiglaTamanho($descTamanho);
    $tamanho->setIdTamanho($_POST['idTamanho']);
    
    $altera = TamanhoDAL::alteraTamanho($tamanho);
    
    if ($altera == true)
    {
        echo 'Alterado com sucesso';
    }else 
    {
        echo 'Não foi possivel alterar';
    }
    
}
else{
    echo "Algo deu muito errado mesmo";
}