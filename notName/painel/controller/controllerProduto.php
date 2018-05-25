<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/notname/notName/url.php';
require_once $raiz . 'dal/MarcaDAL.php';
require_once $raiz . 'dal/CategoriaDAL.php';
require_once $raiz . 'dal/ProdutoDAL.php';

if ($_REQUEST['action'] == 'insereCategoria') {
    
    $categoria = new Categoria();
    
    $categoria->setDescCateg($_REQUEST['txtCategoria']);
    $categoria->setStatusCateg($_REQUEST['statusCategoria']);
    
    if ($categoriaDal = CategoriaDAL::insereCategoria($categoria)) {
        echo "Inserido";
    } 
    else {
        echo "Não foi possível inserir";
    }
} 
else if ($_REQUEST['action'] == 'insereMarca') {
    
    $marca = new Marca();
    
    $marca->setDescMarca($_REQUEST['txtMarca']);
    $marca->setStatusMarca($_REQUEST['statusMarca']);
    
    if ($marcaDal = MarcaDAL::insereMarca($marca)) {
        echo "Inserido";
    } 
    else {
        echo "Não foi possível inserir";
    }
}

if ($_REQUEST['action'] == 'insereProduto') {
    
//     print_r($_REQUEST);
    
    $arrCategoria = $_REQUEST['categoriaIdProduto'];
    $produto = new Produto();
    
    $produto->setIdCateg($arrCategoria);
    
    
    $produto->setDescProd($_REQUEST['txtNomeProduto']);
    $produto->setDescCompletaProd($_REQUEST['txtDescricaoProduto']);
    $produto->setIdMarca($_REQUEST['marcaProduto']);
    $produto->setStatusProd($_REQUEST['statusProduto']);

    if ($produtoDal = ProdutoDAL::insereProduto($produto)) {
        echo "Inserido";
    }
    else {
        echo "Não foi possível inserir";
    }
    
//     $cod = "Produto" . $id;
//     $imagem = $_FILES['fotoProduto']['name'];
    
//     if (move_uploaded_file($_FILES['fotoProduto']['tmp_name'], "{$raiz}img/" . $cod)) {
//         echo "Gravou";
//     } else {
//         echo 'nao gravou';
//     }
}

?>