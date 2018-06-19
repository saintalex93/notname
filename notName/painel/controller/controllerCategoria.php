<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/notname/notName/url.php';
require_once $raiz . 'dal/CategoriaDAL.php';

$categoria = new Categoria();

if ($_REQUEST['action'] == 'insereCategoria') {
    
    $categoria->setDescCateg($_REQUEST['txtCategoria']);
    $categoria->setStatusCateg($_REQUEST['statusCategoria']);
    
    if ($categoriaDal = CategoriaDAL::insereCategoriaPai($categoria)) {
        echo "Inserido";
    } else {
        echo "NÃ£o foi possÃ­vel inserir";
    }
} else if ($_REQUEST['action'] == 'insereCategoriaFilha') {
    
    $categoria->setDescCateg($_REQUEST['txtCategoriaFilho']);
    $categoria->setStatusCateg($_REQUEST['statusCategoriaFilha']);
    $categoria->setCodPai($_REQUEST['optCategoriaPai']);
    
    if (CategoriaDAL::insereCategoriaFilho($categoria)) {
        echo "Inserido";
    } else {
        echo "NÃ£o foi possivel inserir";
    }
}
else if($_REQUEST['action'] == 'alteraCategoria'){
    
    $categoria->setIdCateg($_REQUEST['idCategPai']);
    $categoria->setDescCateg($_REQUEST['txtCategoria']);
    $categoria->setStatusCateg($_REQUEST['statusCategoria']);
    
    if($categoria = CategoriaDAL::alteraCategoria($categoria)){
        echo "Alterado";
    }else {
        echo "Não foi possivel alterar";
    }
    
    
}else if($_REQUEST['action'] == 'alteraCategoriaFilha'){
    
    $categoria->setIdCateg($_REQUEST['idCategFilha']);
    $categoria->setDescCateg($_REQUEST['txtCategoriaFilho']);
    $categoria->setStatusCateg($_REQUEST['statusCategoriaFilha']);
    $categoria->setCodPai($_REQUEST['optCategoriaPai']);
    
    
    if($categoria = CategoriaDAL::alteraCategoriaFilho($categoria)){
        echo "Alterado";
    }else {
        echo "Não foi possivel alterar";
    }
}
else{
    
    echo "Algo deu muito errado";
}