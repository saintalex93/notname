<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/notname/notName/url.php';
require_once $raiz . 'dal/MarcaDAL.php';
require_once $raiz . 'dal/CategoriaDAL.php';
require_once $raiz . 'dal/ProdutoDAL.php';
require_once $raiz . 'library/Conexao.class.php';

$categoria = new Categoria();

if ($_REQUEST['action'] == 'insereCategoria') {
    
    $categoria->setDescCateg($_REQUEST['txtCategoria']);
    $categoria->setStatusCateg($_REQUEST['statusCategoria']);
    
    if ($categoriaDal = CategoriaDAL::insereCategoriaPai($categoria)) {
        echo "Inserido";
    } else {
        echo "Não foi possível inserir";
    }
} else if ($_REQUEST['action'] == 'insereCategoriaFilha') {
    
    $categoria->setDescCateg($_REQUEST['txtCategoriaFilho']);
    $categoria->setStatusCateg($_REQUEST['statusCategoriaFilha']);
    $categoria->setCodPai($_REQUEST['optCategoriaPai']);
    
    if (CategoriaDAL::insereCategoriaFilho($categoria)) {
        echo "Inserido";
    } else {
        echo "N�o foi possivel inserir";
    }
} else if ($_REQUEST['action'] == 'insereMarca') {
    
    $marca = new Marca();
    
    $marca->setDescMarca($_REQUEST['txtMarca']);
    $marca->setStatusMarca($_REQUEST['statusMarca']);
    
    if ($marcaDal = MarcaDAL::insereMarca($marca)) {
        echo "Inserido";
    } else {
        echo "Não foi possível inserir";
    }
}

if ($_REQUEST['action'] == 'insereProduto') {
    
    // print_r($_REQUEST);
    
    $arrCategoria = $_REQUEST['categoriaIdProduto'];
    $produto = new Produto();
    
    $produto->setIdCateg($arrCategoria);
    
    $produto->setDescProd($_REQUEST['txtNomeProduto']);
    $produto->setDescCompletaProd($_REQUEST['txtDescricaoProduto']);
    $produto->setIdMarca($_REQUEST['marcaProduto']);
    $produto->setStatusProd($_REQUEST['statusProduto']);
    
    if ($id = ProdutoDAL::insereProduto($produto)) {
        
        $cod = "Produto" . $id;
        $imagem = $_FILES['fotoProduto']['name'];
        
        if (move_uploaded_file($_FILES['fotoProduto']['tmp_name'], "{$raiz}img/" . $cod)) {
            echo "Gravou";
        } else {
            echo 'nao gravou';
        }
    }
}

?>