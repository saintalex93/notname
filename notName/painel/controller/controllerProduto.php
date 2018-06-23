<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/notname/notName/url.php';
// require_once $raiz . 'dal/MarcaDAL.php';

require_once $raiz . 'dal/ProdutoDAL.php';
require_once $raiz . 'library/Conexao.class.php';

if ($_REQUEST['action'] == 'insereProduto') {
    // print_r($_REQUEST);

    $arrCategoria = $_REQUEST['categoriaIdProduto'];
    $produto = new Produto();

    $produto->setIdCateg($arrCategoria);

    $produto->setDescProd($_REQUEST['txtNomeProduto']);
    $produto->setDescCompletaProd($_REQUEST['txtDescricaoProduto']);
    $produto->setMaterial($_REQUEST['material']);
    // $produto->setIdMarca($_REQUEST['marcaProduto']);
    $produto->setStatusProd($_REQUEST['statusProduto']);

    if ($id = ProdutoDAL::insereProduto($produto)) {

        $cod = "Produto" . $id;
        $imagem = $_FILES['fotoProduto']['name'];

        if (move_uploaded_file($_FILES['fotoProduto']['tmp_name'], "{$raiz}img/Produtos/" . $cod . ".jpg")) {
            echo "Produto inserido com sucesso!";
        } else {
            echo 'nao gravou';
        }
    }
} else if ($_REQUEST['action'] == 'alteraProduto') {

    $id = $_REQUEST['idProduct'];

    $arrCategoria = $_REQUEST['categoriaIdProduto'];
    $produto = new Produto();

    $produto->setIdProd($id);
    $produto->setIdCateg($arrCategoria);

    $produto->setDescProd($_REQUEST['txtNomeProduto']);
    $produto->setDescCompletaProd($_REQUEST['txtDescricaoProduto']);
    $produto->setMaterial($_REQUEST['material']);
    $produto->setStatusProd($_REQUEST['statusProduto']);

    // echo ProdutoDAL::atualizaProduto($produto);

    if (ProdutoDAL::atualizaProduto($produto)) {

        $cod = "Produto" . $id;

        if (isset($_FILES["fotoProduto"])) {
            $imagem = $_FILES['fotoProduto']['name'];

            if (move_uploaded_file($_FILES['fotoProduto']['tmp_name'], "{$raiz}img/Produtos/" . $cod . ".jpg")) {
            } 

        }
        echo "Produto alterado com sucesso!";

    }
     else {
        echo 'Erro ao atualizar';
    }


} else if ($_REQUEST['action'] == 'seleciona') {

    $idProduto = $_REQUEST['idProdSelected'];

    $produto = new Produto();

    $produto->setIdProd($idProduto);
    print_r(json_encode(ProdutoDAL::buscaProdutoCategoria($idProduto), JSON_UNESCAPED_UNICODE));
    
    // $produto->setIdCateg($arrCategoria);


}

?>